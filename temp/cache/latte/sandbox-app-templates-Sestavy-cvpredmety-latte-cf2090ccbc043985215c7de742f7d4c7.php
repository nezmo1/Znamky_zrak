<?php
// source: E:\xampp2\htdocs\znamky_nette_zrak\sandbox\app/templates/Sestavy/cvpredmety.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5529024444', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<style>
    table {
    border-collapse: collapse;
}
    table, th, td {
    border: 1px solid black;
}
@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
}
table { page-break-inside:avoid; }
   tr    { page-break-inside:avoid; page-break-after:auto }
    </style>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Latte\Runtime\CachingIterator($vysledky) as $key => $vysledek) { ?>
   
    <table>
        <thead><tr><th><?php echo Latte\Runtime\Filters::escapeHtml($vysledky[$key]['cele_jmeno'], ENT_NOQUOTES) ?></th>
           
<?php $iterations = 0; foreach ($vysledky[$key]['predmet'] as $keyPredmet => $predmet) { ?>
            <th><?php echo Latte\Runtime\Filters::escapeHtml($vysledky[$key]['predmet'][$keyPredmet]['nazev'], ENT_NOQUOTES) ?></th>
<?php $iterations++; } ?>
         </tr>
          </thead>
         <tr>
            <td><?php echo Latte\Runtime\Filters::escapeHtml($vysledky[$key]['trida'], ENT_NOQUOTES) ?> <small>(třída)</small></td>
                
<?php $iterations = 0; foreach ($vysledky[$key]['predmet'] as $keyPredmet => $predmet) { ?>
                  <td><?php if (strlen($vysledky[$key]['predmet'][$keyPredmet][$ctvrtleti])<5) { echo Latte\Runtime\Filters::escapeHtml($vysledky[$key]['predmet'][$keyPredmet][$ctvrtleti], ENT_NOQUOTES) ;} else { ?>
<b>SH</b><?php } ?></td>
<?php $iterations++; } ?>
           

         </tr>    
             
         
            
      
        
    </table>
    
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Latte\Runtime\CachingIterator($vysledky[$key]['predmet']) as $keyPredmet => $predmet) { ?>
        <?php if ($iterator->first) { ?><br><table><?php } ?>

         
<?php if (strlen($vysledky[$key]['predmet'][$keyPredmet][$ctvrtleti])>5) { ?>
           <tr>
               <th><?php echo Latte\Runtime\Filters::escapeHtml($vysledky[$key]['predmet'][$keyPredmet]['nazev'], ENT_NOQUOTES) ?></th>
          
                 
              
            <td><?php echo Latte\Runtime\Filters::escapeHtml($vysledky[$key]['predmet'][$keyPredmet][$ctvrtleti], ENT_NOQUOTES) ?></td>
              
            
         
         </tr> 
<?php } ?>
             
      <?php if ($iterator->last) { ?></table><?php } ?>

<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
        ---<br>
    
    
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ;