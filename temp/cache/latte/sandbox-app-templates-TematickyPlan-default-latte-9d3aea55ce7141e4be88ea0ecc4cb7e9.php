<?php
// source: E:\xampp2\htdocs\znamky_nette_zrak\sandbox\app/templates/TematickyPlan/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('8039057147', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbd658486662_content')) { function _lbd658486662_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.forms.js"></script>
<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>
 <!-- FastClick -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/fullcalendar/fullcalendar.min.js"></script>
    <script src='<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_QUOTES) ?>/vendors/fullcalendar/locale/cs.js'></script>
     <!-- Custom Theme Scripts -->
  
     <!-- FullCalendar -->
    <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/fullcalendar/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/vendors/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">
    
    
    <script>
   $(function(){
    $.nette.init();

    $('select[name=trida]').change(function () {
        $.nette.ajax({
            url: <?php echo Latte\Runtime\Filters::escapeJs($_control->link("invalidate!")) ?>,
            data: {
                'value': $('select[name=trida]').val(),
            }
        });
    });
});


Nette.toggle = function (id, visible) {
    var el = $('#' + id);
    if (visible) {
        el.slideDown();
    } else {
        el.slideUp();
    }
};







    </script>
  

    
    
    
    
<div class="right_col" role="main" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                  
<?php $iterations = 0; foreach ($flashes as $flash) { ?>
                  <div class="alert alert-<?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?> alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                     <?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?>

                  </div>
                  
<?php $iterations++; } ?>
                  
                  
                <h3 >Tématický plán</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12">               
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Kalendář</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id='calendar'></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        
        
 <style>
 .planyBorder{
  border-width:  3px !important;
  font-size: 12px;
  font-weight: bold;
}
    </style>       
<!-- calendar modal -->
   
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["novyTematickyPlan"], array()) ?>

        <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Nový tématický plán</h4>
          </div>
          <div class="modal-body">
              
              
              <table class="table table-stripped">
                  <tr>
                  <td>
                  <?php if ($_label = $_form["trida"]->getLabel()) echo $_label  ?>

                  </td>
                  <td>
                  <?php echo $_form["trida"]->getControl()->addAttributes(array('class' => 'form-control ajax', 'style' => 'width:100%')) ?>

                  </td>
                  </tr>
                  
    
                  
                  
                  
                  <tr>
                      
                  <td>
                   <div id="predmet_label">   
                  <?php if ($_label = $_form["predmet"]->getLabel()) echo $_label  ?>

                  </div>
                  </td>
                  <td style="width:400px;">
                      <div id="predmet">
                 <div id="<?php echo $_control->getSnippetId('predmet') ?>"><?php call_user_func(reset($_b->blocks['_predmet']), $_b, $template->getParameters()) ?>
</div>
                        </div>
                      </td>
                   
                  </tr>
                  
                  
                  
                  
                   <tr>
                  <td>
                  <?php if ($_label = $_form["ucivo"]->getLabel()) echo $_label  ?>

                  </td>
                  <td>
                  <?php echo $_form["ucivo"]->getControl()->addAttributes(array('class' => 'form-control', 'style' => 'width:100%')) ?>

                  </td>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                      
                  <td>
                   <div id="datum_label">   
                  <?php if ($_label = $_form["datum"]->getLabel()) echo $_label  ?>

                  </div>
                  </td>
                  <td style="width:400px;">
                      <div id="datum">
                  <?php echo $_form["datum"]->getControl()->addAttributes(array('class' => 'form-control single_cal2', 'style' => 'width:100%', 'id' =>'single_cal2')) ?>

                        </div>
                      </td>
                   
                  </tr>
                  
                  
                  <tr>
                      
                  <td>
                   <div id="datum_label">   
                  <?php if ($_label = $_form["datum_end"]->getLabel()) echo $_label  ?>

                  </div>
                  </td>
                  <td style="width:400px;">
                      <div id="datum">
                  <?php echo $_form["datum_end"]->getControl()->addAttributes(array('class' => 'form-control single_cal2', 'style' => 'width:100%')) ?>

                        </div>
                      </td>
                   
                  </tr>
                  
              </table>    
         
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Zavřít</button>
            <?php echo $_form["submit"]->getControl()->addAttributes(array('class' => 'btn btn-success')) ?>

          </div>
        </div>
      </div>
    </div>
                  
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Editovat tématický plán</h4>
          </div>
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["editTematickyPlan"], array()) ?>
          <div class="modal-body">
              
              <?php echo $_form["id_plan"]->getControl()->addAttributes(array('id' => 'id_plan')) ?>

                <table class="table table-stripped">
                  <tr>
                  <td><b>Název:</b>
                   </td>
                 <td>
                    <input type="text" class="form-control" id="title2" name="title2" disabled="disabled">
                
                  </td>
                  </tr>
                  
    
          
                  
                  
                   <tr>
                  <td>
                  <?php if ($_label = $_form["ucivo"]->getLabel()) echo $_label  ?>

                  </td>
                  <td>
                  <?php echo $_form["ucivo"]->getControl()->addAttributes(array('class' => 'form-control', 'style' => 'width:100%', 'id'=>'ucivo')) ?>

                  </td>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                      
                  <td>
                   <div id="datum_label">   
                  <?php if ($_label = $_form["datum"]->getLabel()) echo $_label  ?>

                  </div>
                  </td>
                  <td style="width:400px;">
                      <div id="datum">
                  <?php echo $_form["datum"]->getControl()->addAttributes(array('class' => 'form-control single_cal2', 'style' => 'width:100%', 'id' =>'datum_start')) ?>

                        </div>
                      </td>
                   
                  </tr>
                  
                  
                  <tr>
                      
                  <td>
                   <div id="datum_label">   
                  <?php if ($_label = $_form["datum_end"]->getLabel()) echo $_label  ?>
<br> Použít datum konce <?php echo $_form["datum_end_check"]->getControl() ?>

                  </div>
                  </td>
                  <td style="width:400px;">
                      <div id="datum">
                  <?php echo $_form["datum_end"]->getControl()->addAttributes(array('class' => 'form-control single_cal2', 'style' => 'width:100%', 'id'=> 'datum_end')) ?>

                        </div>
                      </td>
                   
                  </tr>
                  
              </table>    

            
          </div>
          <div class="modal-footer">
              <div style="float: right;">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Zavřít</button>
            <button type="submit" class="btn btn-primary antosubmit2">Editovat</button>
            </div>
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ;Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["smazatTematickyPlan"], array()) ?>
            <?php echo $_form["id_plan_smazat"]->getControl()->addAttributes(array('id'=>'id_plan_smazat')) ?>

            <?php echo $_form["submit"]->getControl()->addAttributes(array('class'=>'btn btn-danger', 'onclick'=>'return(confirm("Opravdu chcete smazat tento tématický plán?"))')) ?>

<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
        
        

     <!-- FullCalendar -->
    <script>
      $(window).load(function() {
        var date = new Date(),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear(),
            started,
            categoryClass;

        var calendar = $('#calendar').fullCalendar({
          
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,listWeek'
          },
          locale: 'cs',
          selectable: true,
          selectHelper: true,
          defaultView: 'basicWeek',
          weekends: false,
          
          select: function(start, end, allDay) {
            $('#fc_create').click();
            document.getElementById("single_cal2").value = start.format("DD-MM-YYYY");
            started = start;
            ended = end;

            $(".antosubmit").on("click", function() {
              var title = $("#title").val();
              if (end) {
                ended = end;
              }

              categoryClass = $("#event_type").val();

              if (title) {
                calendar.fullCalendar('renderEvent', {
                    title: title,
                    start: started,
                    end: end,
                    allDay: allDay
                  },
                  true // make the event "stick"
                );
              }

              $('#title').val('');

              calendar.fullCalendar('unselect');

              $('.antoclose').click();

              return false;
            });
          },
          eventClick: function(calEvent, jsEvent, view) {
              if(calEvent.id==<?php echo Latte\Runtime\Filters::escapeJs($user->id) ?>){
              $('#fc_edit').click();
                }
            
            $('#title2').val(calEvent.title);
            $('#ucivo').val(calEvent.ucivo);
            $('#id_plan').val(calEvent.idPlan);
            $('#id_plan_smazat').val(calEvent.idPlan);
            $('#datum_start').val(calEvent.datumStart);
            $('#datum_end').val(calEvent.datumEnd);
          if(calEvent.datumEnd!=""){
               $('#datum_end').slideDown();
               $('#frm-editTematickyPlan-datum_end_check').prop('checked', true);
              }
            else{
            $('#datum_end').hide();
               $('#frm-editTematickyPlan-datum_end_check').prop('checked', false);
                }
            
            
            categoryClass = $("#event_type").val();

            $(".antosubmit2").on("click", function() {
              calEvent.title = $("#title2").val();

              calendar.fullCalendar('updateEvent', calEvent);
              $('.antoclose2').click();
            });

            calendar.fullCalendar('unselect');
          },
          editable: false,
          events: [
              
<?php $iterations = 0; foreach ($plany as $plan) { ?>
                                {
                           title: <?php echo Latte\Runtime\Filters::escapeJs($plan->cely_popis) ?>,
                           start: <?php echo Latte\Runtime\Filters::escapeJs(date_format($plan->datum_start,"Y-m-d")) ?>,
<?php if ($plan->datum_end==NULL) { ?>
                             end: date,
<?php } else { ?>
                             end: <?php echo Latte\Runtime\Filters::escapeJs(date_format($plan->datum_end,"Y-m-d")) ?>,  
<?php } ?>
                           textColor: <?php echo Latte\Runtime\Filters::escapeJs($plan->predmet_barva_textu) ?>,
                           backgroundColor: <?php echo Latte\Runtime\Filters::escapeJs($plan->predmet_barva_pozadi) ?>,
                           borderColor: <?php echo Latte\Runtime\Filters::escapeJs($plan->trida_barva_ramu) ?>,
                           className: 'planyBorder',
                           id: <?php echo Latte\Runtime\Filters::escapeJs($plan->ucitel) ?>,
                           ucivo: <?php echo Latte\Runtime\Filters::escapeJs($plan->ucivo) ?>,
                           idPlan: <?php echo Latte\Runtime\Filters::escapeJs($plan->id) ?>,
                           datumStart: <?php echo Latte\Runtime\Filters::escapeJs(date_format($plan->datum_start,"Y-m-d")) ?>,
<?php if ($plan->datum_end==NULL) { ?>
                             datumEnd: '',
<?php } else { ?>
                             datumEnd: <?php echo Latte\Runtime\Filters::escapeJs(date_format($plan->datum_end,"Y-m-d")) ?>,  
<?php } ?>
                                } ,
<?php $iterations++; } ?>
               
         
                 ]
        });
      });
    </script>
    <!-- /FullCalendar -->
    
    
    <!-- bootstrap-daterangepicker -->
   

   
    <script>
      $(document).ready(function() {
          
          
          
        $('#single_cal1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_1"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('.single_cal2').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2",
           format: 'DD-MM-YYYY'
           
          
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_3"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#reservation').daterangepicker(null, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

<?php
}}

//
// block _predmet
//
if (!function_exists($_b->blocks['_predmet'][] = '_lbc51c031ce9__predmet')) { function _lbc51c031ce9__predmet($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('predmet', FALSE)
?> <?php echo $_form["predmet"]->getControl()->addAttributes(array('class' => 'form-control', 'style' => 'width:100%')) ;
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
?>


<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

	


    
  
  

