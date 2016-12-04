<?php

class TematickyPlanRepository 

{
    /** @var Nette\Database\Context */
    public $database;
    
    public function __construct(Nette\Database\Context $database)
    {

        $this->database = $database;
    }
    
    
       public function VyberTrid($ucitel){
        return   ($this->database->query('SELECT ucitele_uvazek.trida as `id_tridy`,trida.jmeno_tridy as `jmeno_tridy` FROM ucitele_uvazek  INNER JOIN trida ON ucitele_uvazek.trida=trida.id_tridy  WHERE ucitel = ? ', $ucitel)->fetchPairs());
       }
        
        public function VyberPredmetu($ucitel){
            $seznamPredmetu=array();
            $seznamPredmetu['']=(['Nic' => 'Nic', ]);
            $predmety=$this->database->query('SELECT ucitele_uvazek.predmet as `id_predmetu`,predmet.nazev as `jmeno_predmetu`, trida FROM ucitele_uvazek  INNER JOIN predmet ON ucitele_uvazek.predmet=predmet.id_predmetu  WHERE ucitel = ? ', $ucitel, ' ORDER BY jmeno_predmetu' )->fetchAll();
          foreach($predmety as $predmet){
            $seznamPredmetu[$predmet->trida][$predmet->id_predmetu]= $predmet->jmeno_predmetu;  
          }
        return $seznamPredmetu;
        } 
        
        
        public function VyberTematickyPlan($ucitel){
            $query="SELECT tematicky_plan.*, predmet.barva_textu as `predmet_barva_textu`, predmet.barva_pozadi as
`predmet_barva_pozadi`, predmet.zkratka_predmetu as `zkratka_predmetu`, trida.jmeno_tridy AS
`jmeno_tridy`, trida.barva_ramu as `trida_barva_ramu`, users.prijmeni as `prijmeni`, CONCAT(`jmeno_tridy`,'  |  ',`zkratka_predmetu`,' - ',tematicky_plan.ucivo,' (',LEFT(`prijmeni`,3),')')  AS `cely_popis`
FROM `tematicky_plan`
INNER JOIN predmet on tematicky_plan.predmet=predmet.id_predmetu
INNER JOIN trida on tematicky_plan.trida=trida.id_tridy
INNER JOIN users on tematicky_plan.ucitel=users.id_users
WHERE tematicky_plan.trida IN (
SELECT ucitele_uvazek.trida 
FROM ucitele_uvazek    
WHERE ucitele_uvazek.ucitel = ".$ucitel."
GROUP BY ucitele_uvazek.ucitel) ORDER BY predmet.nazev";
        return   ($this->database->query($query)->fetchAll());
       }
       
       
         public function VyberTematickyPlanZak($zak){
            $query="SELECT tematicky_plan.*, predmet.barva_textu as `predmet_barva_textu`, predmet.barva_pozadi as
`predmet_barva_pozadi`, predmet.zkratka_predmetu as `zkratka_predmetu`, trida.jmeno_tridy AS
`jmeno_tridy`, trida.barva_ramu as `trida_barva_ramu`, users.prijmeni as `prijmeni`, CONCAT(`jmeno_tridy`,'  |  ',`zkratka_predmetu`,' - ',tematicky_plan.ucivo,' (',LEFT(`prijmeni`,3),')')  AS `cely_popis`
FROM `tematicky_plan`
INNER JOIN predmet on tematicky_plan.predmet=predmet.id_predmetu
INNER JOIN trida on tematicky_plan.trida=trida.id_tridy
INNER JOIN users on tematicky_plan.ucitel=users.id_users
WHERE tematicky_plan.trida IN (
SELECT users.trida 
FROM users    
WHERE users.id_users = ".$zak."
GROUP BY users.id_users) ORDER BY predmet.nazev";
        return   ($this->database->query($query)->fetchAll());
       }
        
   public function existPlan($values, $ucitel){
       
        return   $this->database->query('SELECT MAX(id) as `id`, datum_end, datum_start FROM tematicky_plan WHERE ucitel = ',$ucitel,' AND trida = ',$values->trida,' AND predmet = ',$values->predmet)->fetch();
                
   }
   
   
   
   
     public function editTematickyPlan($values,$ucitel){
             
                  
                  $date=date_create($values->datum);
                  $datum=  date_format($date, 'Y-m-d');
                    
                    
                  
                  
                  if($values->datum_end_check != FALSE){
                    $date_konec=date_create($values->datum_end);
                  $datum_konec=  date_format($date_konec, 'Y-m-d');  
                  }
                  else $datum_konec=NULL;
                  
                  
                  
                  
                  
                  
                    
                  $datumEnd= strtotime($datum);
                  
                  $datumEnd=date('Y-m-d',$datumEnd);
                  
                  
                  
                  
               try {
                   
                  
                   
               if($datum_konec!=NULL){
                    $this->database->query('UPDATE tematicky_plan SET ucivo = "',$values->ucivo,'", datum_start ="',$datum,'", datum_end="'.$datum_konec.'" WHERE id ='.$values->id_plan);
              
               }
               else {
                   $this->database->query('UPDATE tematicky_plan SET ucivo = "',$values->ucivo,'", datum_start ="',$datum,'", datum_end=NULL WHERE id ='.$values->id_plan);
               }
               
                
                return TRUE;   
               } catch (Exception $ex) {
                return FALSE;    
               }
           
          }
   
   
          
          
       public function createTematickyPlan($values,$ucitel){
             
                  $existPlan= $this->existPlan($values, $ucitel);
                  $date=date_create($values->datum);
                  $datum=  date_format($date, 'Y-m-d');
                    
                    
                  
                  
                  if($values->datum_end != ''){
                    $date_konec=date_create($values->datum_end);
                  $datum_konec=  date_format($date_konec, 'Y-m-d');  
                  }
                  else $datum_konec=NULL;
                  
                  
                  
                  
                  
                  
                    
                  $datumEnd= strtotime($datum);
                  
                  $datumEnd=date('Y-m-d',$datumEnd);
                  
                  
                  
                  
               try {
                   
                   if($existPlan!=FALSE && $existPlan->id!=NULL){
                          
                       $date2=  date_create($existPlan->datum_start);
                      $datum2=  date_format($date2, 'Y-m-d');
                      $diff = date_diff($date,$date2);
                      
                       if($diff->days > 0){
                       $this->database->query('UPDATE tematicky_plan SET datum_end ="',$datumEnd,'" WHERE id = ',$existPlan->id);
                   
                       }
                      
                       else {return 'same';}
                    
                   }
                   
               if($datum_konec!=NULL){
                    $this->database->query('INSERT INTO tematicky_plan SET ucitel = ',$ucitel, ', trida = ',$values->trida,', predmet = ',$values->predmet,', ucivo = "',$values->ucivo,'", datum_start ="',$datum,'", datum_end="'.$datum_konec.'"');
              
               }
               else {
                   $this->database->query('INSERT INTO tematicky_plan SET ucitel = ',$ucitel, ', trida = ',$values->trida,', predmet = ',$values->predmet,', ucivo = "',$values->ucivo,'", datum_start ="',$datum,'"');
               }
               
                
                return TRUE;   
               } catch (Exception $ex) {
                return FALSE;    
               }
           
          }   
          
          
        
}