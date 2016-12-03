<?php
// source: E:\xampp2\htdocs\znamky_nette_zrak\sandbox\app/templates/Edit/trida.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('0350724919', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbb675281926_content')) { function _lbb675281926_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?> <!-- Bootstrap Colorpicker -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.forms.js"></script>
<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>




<div class="right_col" role="main">
         
            <div class="page-title">
              <div class="title_left">
                  <h3>Editace třídy <small></small></h3>
              </div>

             
            </div>
           
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel" >
                  
                  <div class="x_content" >
                    <br>
                    
<?php $iterations = 0; foreach ($flashes as $flash) { ?>
                  <div class="alert alert-<?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?> alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                     <?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?>

                  </div>
                  
<?php $iterations++; } ?>
                       
                      
                       
                     

  
   
 <div class="form-horizontal form-label-left" style="min-height: 680px">
                           
                          
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["editTridaForm"], array()) ;echo $_form["id_tridy"]->getControl()->addAttributes(array('class'=>'form-control')) ?>

        <div class="form-group">
        <div class="col-md-3 col-sm-3 col-xs-3">
        <?php if ($_label = $_form["zkratka_tridy"]->getLabel()) echo $_label  ?>

        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
        <?php echo $_form["zkratka_tridy"]->getControl()->addAttributes(array('class'=>'form-control')) ?>

        </div>        
        </div> 
        <div class="form-group">
        <div class="col-md-3 col-sm-3 col-xs-3">
        <?php if ($_label = $_form["jmeno_tridy"]->getLabel()) echo $_label  ?>

        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
        <?php echo $_form["jmeno_tridy"]->getControl()->addAttributes(array('class'=>'form-control')) ?>

        </div>        
        </div> 
        <div class="form-group">
        <div class="col-md-3 col-sm-3 col-xs-3">
        <?php if ($_label = $_form["barva_ramu"]->getLabel()) echo $_label  ?>

        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            
            <div class="input-group demo2">
                            <?php echo $_form["barva_ramu"]->getControl()->addAttributes(array('class'=>'form-control')) ?>

                            <span class="input-group-addon"><i></i></span>
           </div>
        
        </div>        
        </div> 
                            
                            
        
       <div class="col-md-3 col-sm-3 col-xs-3">
       <input  class='btn btn-info'<?php $_input = $_form["zpet"]; echo $_input->{method_exists($_input, 'getControlPart')?'getControlPart':'getControl'}()->addAttributes(array (
  'class' => NULL,
))->attributes() ?>>
        </div>   
        <div class="col-md-6 col-sm-6 col-xs-6">
            
        <?php echo $_form["send"]->getControl()->addAttributes(array('class'=>'form-control btn btn-success')) ?>

        </div>        
                           
      
                                       
        
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>
                               
                                 
                                 

                             
                              
                         
                                  
    
                          
                                    
                                


                             
                          
                       
                         </div>
                                 

                             
                              
                                     
                                  
                                    
                          
                         
                                    
                                


                             
                          
                       
                         </div>

                        <br>
                   
                    
                    
                    
                    
                    
                    
                    
                  
              </div>
                       
                      
            </div>
                       
          </div>
                       
        </div>
                       
                       
                       
                       </div>

                       
<script>
        function zpetNaSeznam(){
            window.location = <?php echo Latte\Runtime\Filters::escapeJs($basePath) ?>+"/list/tridy";
        }
        
        
        
  <!-- Bootstrap Colorpicker -->
    
      $(document).ready(function() {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
      });
    
    <!-- /Bootstrap Colorpicker -->       
        
        </script>

    
  

<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 