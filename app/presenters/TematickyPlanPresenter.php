<?php

namespace App\Presenters;

use Nette,
	App\Model,
        App\Components,
        Nette\Application\UI\Control,
        Nette\Application\UI\Form;
        

/**
 * Base presenter je předek všech dalších presenterů v projektu
 */
class TematickyPlanPresenter extends BasePresenter
{

    
  /** @var Nette\Database\Context */
    public $database;
    
    public $predmety;
 /**
 * Konstruktor presenteru, obsahující parametr pro připojení k databázi
 */
    public function __construct(Nette\Database\Context $database)
    {

        $this->database = $database;
    }
    
    
    public function beforeRender() {
   parent::beforeRender();
   $this->template->_form = $this['novyTematickyPlan']; // form {snippet} workaround
}
    
    
    public function renderDefault(){
          $user =  $this->getUser();
    if ((!$user->isInRole('4')) and (!$user->isInRole('3')) and (!$user->isInRole('2')) ) {
             $this->redirect('Pristup:pristup');
       }
       
       
       $this->template->plany = $this->context->TematickyPlanRepository->vyberTematickyPlan($user->id);
       

    }


    
    
    
public function handleInvalidate($value) {
    $ucitel=$this->getUser();
    $this->predmety=$this->context->TematickyPlanRepository->VyberPredmetu($ucitel->id);
    $this['novyTematickyPlan']['predmet']->setItems($this->predmety[$value]);
    $this->redrawControl('predmet');
}


    
    
    protected function createComponentNovyTematickyPlan($name)
	{
     
 		$form = new Nette\Application\UI\Form;
                $this[$name] = $form;
            //    $action_pom='Znamka:novaznamka?tridac='.$tridac;
            // $form->setAction($this->presenter->link($action_pom));

                
		$ucitel=$this->getUser();
                $this->predmety=$this->context->TematickyPlanRepository->VyberPredmetu($ucitel->id);
                $tridy=$this->context->TematickyPlanRepository->VyberTrid($ucitel->id);
                
                $form->addSelect('trida', 'Třída:',$tridy)
                        
                        ->addRule(Form::NOT_EQUAL, 'Vyberte třídu', '')
                        ->setPrompt('Vyberte třídu')
                        
                        ->addCondition($form::NOT_EQUAL, '')
                        
                          ->toggle('predmet')
                        ->toggle('predmet_label');
               
               
                   
               
               
               
                   $form->addSelect('predmet', 'Předmět:',  $this->predmety[$form['trida']->value]);
               
                
                $form->addText('ucivo', 'Učivo:')
                        ->setAttribute('placeholder', 'např. Žahavci - nezmaři')
			->setRequired('Zadejte učivo');
                 $form->addText('datum', 'Datum začátku:')
                        ->setAttribute('placeholder', 'Datum')
                         ->setAttribute('readonly', 'readonly')
			->setRequired('Zadejte datum');
                 $form->addText('datum_end', 'Datum konce:')
                        ->setAttribute('placeholder', 'Nezobrazuje se včetně v kalendáři - Nepovinné')
                        ->setAttribute('readonly', 'readonly');
                        
			
               
                 $form->addSubmit('submit', 'Vytvořit');
		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->newTematickyPlan;
                
                
 


		return $form;
	}
    
    public function newTematickyPlan($form, $values){
        $ucitel=$this->getUser();
        $result = $this->context->TematickyPlanRepository->createTematickyPlan($values, $ucitel->id);
        
        
        if ($result==="same"){
            $this->flashMessage('Tématický plán na tento den již existuje.','error');
        }
        elseif($result==TRUE){
            $this->flashMessage('Tématický plán byl úspěšně vytvořen.','success');
        }
        elseif($result==FALSE){
            $this->flashMessage('Tématický plán se nepodařilo vytvořit.','error');
        }
        
        
    }
    
    
   
    
     protected function createComponentEditTematickyPlan($name)
	{
     
 		$form = new Nette\Application\UI\Form;
            
            //    $action_pom='Znamka:novaznamka?tridac='.$tridac;
            // $form->setAction($this->presenter->link($action_pom));

                
		
               
                 $form->addHidden('id_plan');
                $form->addText('ucivo', 'Učivo:')
                        ->setAttribute('placeholder', 'např. Žahavci - nezmaři')
			->setRequired('Zadejte učivo');
                 $form->addText('datum', 'Datum začátku:')
                        ->setAttribute('placeholder', 'Datum')
                         ->setAttribute('readonly', 'readonly')
			->setRequired('Zadejte datum');
                 $form->addText('datum_end', 'Datum konce:')
                        ->setAttribute('placeholder', 'Nezobrazuje se včetně v kalendáři - Nepovinné')
                        ->setAttribute('readonly', 'readonly');
                 $form->addCheckbox('datum_end_check') 
                         ->addCondition($form::EQUAL, TRUE)
			  ->toggle('datum_end');
                        
               
                 $form->addSubmit('submit', 'Editovat');
		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->editTematickyPlan;
                
                
 


		return $form;
	}
    
    public function editTematickyPlan($form, $values){
        $ucitel=$this->getUser();
        $result = $this->context->TematickyPlanRepository->editTematickyPlan($values, $ucitel->id);
        
        
       
        if($result==TRUE){
            $this->flashMessage('Tématický plán byl úspěšně editován.','success');
        }
        elseif($result==FALSE){
            $this->flashMessage('Tématický plán se nepodařilo editovat.','error');
        }
        
        
    }
    
    
    

 
}







	
	

        
        
        