<!-- jQuery  -->
<script src="../include/assets/js/jquery.min.js"></script>
<script src="../include/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="../include/assets/js/bootstrap.min.js"></script>
<script src="../include/assets/js/metisMenu.min.js"></script>
<script src="../include/assets/js/waves.js"></script>
<script src="../include/assets/js/jquery.slimscroll.js"></script>
<script src="../include/assets/js/jquery.scrollTo.min.js"></script>

  <!-- Jquery filer js -->
<script src="../include/plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- Bootstrap fileupload js -->
<script src="../include/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script>
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#demo1").show();
         $("#demo").hide();

    });
    $("#myBtn2").click(function(){
        $("#demo1").hide();
         $("#demo").show();
          $("#myDIV").hide();
    });
});
</script>
<script type="text/javascript">
    $('#carousel-example-captions').carousel();
</script>
 
<script>
$( "#myBtnShowResume" ).click(function() {
  $( "#fileInput" ).show( "slow" );
});
</script>
 
 <!-- Parsley js -->
<script type="text/javascript" src="../include/plugins/parsleyjs/parsley.min.js"></script>

 <!--Form Wizard-->
<script src="../include/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
        <!--wizard initialization-->
<script src="../include/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>

<script src="../include/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="../include/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>


      

 <!-- Counter js  -->
<script src="../include/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../include/plugins/counterup/jquery.counterup.min.js"></script>

 <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
<script src="../include/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
<script src="../include/plugins/morris/morris.min.js"></script>
<script src="../include/plugins/raphael/raphael-min.js"></script>

        <!-- Sparkline charts -->
<script src="../include/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- SCRIPTS -->
<script src="../include/plugins/switchery/switchery.min.js"></script>
<script src="../include/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="../include/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="../include/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="../include/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="../include/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="../include/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../include/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="../include/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="../include/plugins/autocomplete/countries.js"></script>
<script type="text/javascript" src="../include/assets/pages/jquery.autocomplete.init.js"></script>

        <!-- Init Js file -->
 
<script type="text/javascript" src="../include/assets/pages/jquery.form-advanced.init.js"></script>



<script src="../include/plugins/moment/moment.js"></script>
<script src='../include/plugins/fullcalendar/js/fullcalendar.min.js'></script>
<script src="../include/assets/pages/jquery.calendar.js"></script>


<script src="../include/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../include/plugins/datatables/dataTables.bootstrap.js"></script>




<script src="../include/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../include/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="../include/plugins/datatables/jszip.min.js"></script>
<script src="../include/plugins/datatables/pdfmake.min.js"></script>
<script src="../include/plugins/datatables/vfs_fonts.js"></script>
<script src="../include/plugins/datatables/buttons.html5.min.js"></script>
<script src="../include/plugins/datatables/buttons.print.min.js"></script>
<script src="../include/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../include/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="../include/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../include/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="../include/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="../include/plugins/datatables/dataTables.colVis.js"></script>
<script src="../include/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<!-- Jquery-Ui -->
<script src="../include/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- page specific js -->
<script src="../include/assets/pages/jquery.fileuploads.init.js"></script>

<script src="../include/assets/pages/jquery.datatables.init.js"></script>

<script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
</script>



<!-- App js -->
<script src="../include/assets/js/jquery.core.js"></script>
<script src="../include/assets/js/jquery.app.js"></script>
     <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
            $(function () {
                $('#demo-form').parsley().on('field:validated', function () {
                    var ok = $('.parsley-error').length === 0;
                    $('.alert-info').toggleClass('hidden', !ok);
                    $('.alert-warning').toggleClass('hidden', ok);
                })
                        .on('form:submit', function () {
                            return false; // Don't submit form for this demo
                        });
            });
        </script>
   <script type="text/javascript">
            jQuery(function($) {
                $('.autonumber').autoNumeric('init');
            });
        </script>
