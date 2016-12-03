<?php

namespace App\Presenters;

use Nette,
	App\Model,
        App\Components,
        Nette\Application\UI\Control;
        

/**
 * Homepage presenter.
 */
class SestavyPresenter extends BasePresenter
{
    
  public $database;
    

  
 
  
  public function renderCvpredmety() {
            $user =  $this->getUser();
    if ((!$user->isInRole('4')) and (!$user->isInRole('3')) and (!$user->isInRole('2'))) {
             $this->redirect('Pristup:pristup');
       }
      $vysledek=array();
      $get=$this->request->getParameters();
      
      $data=$this->database->query("SELECT zak,`".$get['ctvrtleti']."` AS `ctvrtleti`, predmet, predmet.zkratka_predmetu,CONCAT(users.jmeno,' ',users.prijmeni) AS `cele_jmeno`, trida.id_tridy,trida.jmeno_tridy FROM `prum_znamky`
INNER JOIN predmet ON predmet=predmet.id_predmetu
INNER JOIN users ON zak=users.id_users
INNER JOIN trida ON users.trida=trida.id_tridy
ORDER BY trida.jmeno_tridy, users.prijmeni")->fetchAll();
      foreach($data as $zak){
          $vysledek[$zak->zak]['cele_jmeno']=$zak->cele_jmeno;
          $vysledek[$zak->zak]['trida']=$zak->jmeno_tridy;
          $vysledek[$zak->zak]['predmet'][$zak->predmet]['nazev']=$zak->zkratka_predmetu;
          $vysledek[$zak->zak]['predmet'][$zak->predmet][$get['ctvrtleti']]=$zak->ctvrtleti;
      }
      
      
      
$this->template->vysledky = $vysledek;
$this->template->ctvrtleti= $get['ctvrtleti']; 
}

	public function renderUcitel()
{
            $user =  $this->getUser();
    if ((!$user->isInRole('4')) and (!$user->isInRole('3')) and (!$user->isInRole('2'))) {
             $this->redirect('Pristup:pristup');
       }
     
}


  protected function createComponentSeznamZnamekUcitelGrid()
{ 
    $user =  $this->getUser();
    return new Model\SeznamZnamekUcitelSestava($this->database->table('znamky'), $this->database, $user);
}



}