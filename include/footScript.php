<!-- jQuery  -->
<script src="../include/assets/js/jquery.min.js"></script>
<script src="../include/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="../include/assets/js/bootstrap.min.js"></script>
<script src="../include/assets/js/metisMenu.min.js"></script>
<script src="../include/assets/js/waves.js"></script>
<script src="../include/assets/js/jquery.slimscroll.js"></script>
<script src="../include/assets/js/jquery.scrollTo.min.js"></script>
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


  <!-- Jquery filer js -->
<script src="../include/plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- Bootstrap fileupload js -->
<script src="../include/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script>
$(document).ready(function(){
     $("#demo1").show(function(){
        $("#myBtn1").attr('disabled','disabled').css("cursor", "pointer").fadeTo(500,100).css("background-color","#fff").css("color","#2879a2");
           $("#myBtn2").css("background-color","#727B80").css("color","#fff");


    });
    $("#myBtn1").click(function(){
        $("#demo1").show();
         $("#demo").hide();
          $("#myBtn1").css("background-color","#fff").css("color","#2879a2");
                  $("#myBtn2").css("background-color","#727B80").css("color","#fff");


    });
    $("#myBtn2").click(function(){
        $("#demo1").hide();
         $("#demo").show();
          $("#myDIV").hide();
                  $("#myBtn1").removeAttr('disabled');
                     $("#myBtn1").css("background-color","#727B80").css("color","#fff");
                  $("#myBtn2").css("background-color","#fff").css("color","#2879a2");

    });
});
$(document).ready(function(){
    $("#requestBtn").click(function(){
        $("#hire").show();
        $("#requestBtn").hide();
    });
});

$(document).ready(function() {
  $('#myModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
     $('#getId').val(id);
     return (id);

  });
});

$(document).ready(function() {
  $('#myModal1').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
     $('#getId').val(id);
     return (id);

  });
});

$(function() {
    $('#hr').hide();
    $('#level').change(function(){
        if($('#level').val() == 'hr') {
            $('#hr').show();
        } else {
            $('#hr').hide();
        }
    });
});

function getdata(id){
      var datastring = 'action=getdata&'+'id='+id;
      var url = 'fetch_service.php';
      $('#myModal').modal({
        keyboard: true,
        backdrop: 'static'
      });

      $.ajax({
        type: "POST",
        data: datastring,
        url: url,
        dataType: 'json',
        success:function (data){

          $('#getId').val(data.Id);
          $('#getOption').val(data.option);
          $('#getTitle').val(data.title);
          $('#getHeader').html(data.header);
          $('#getDescription').html(data.description);


        }
      });
      console.log(datastring+url);
    }

function getDownload(id){
      var datastring = 'action=getDownload&'+'id='+id;
      var url = 'fetch_downloads.php';
      $('#myModal1').modal({
        keyboard: true,
        backdrop: 'static'
      });

      $.ajax({
        type: "POST",
        data: datastring,
        url: url,
        dataType: 'json',
        success:function (data){

          $('#getId').val(data.Id);
          $('#getFileName').val(data.fileName);
          $('#getFileUpload').val(data.uploadedFile);


        }
      });
      console.log(datastring+url);
    }

function getAccount(id){
    var datastring = 'action=getAccount&'+'id='+id;
    var url = 'fetch_accounts.php';
    $('#myModal1').modal({
      keyboard: true,
      backdrop: 'static'
    });

    $.ajax({
      type: "POST",
      data: datastring,
      url: url,
      dataType: 'json',
      success:function (data){

        $('#getId').val(data.Id);
        $('#getUsername').val(data.username);
        $('#getFirstName').val(data.firstName);
        $('#getLastName').val(data.lastName);
        $('#getEmail').val(data.email);
        $('#getLevel').val(data.level);


      }
    });
    console.log(datastring+url);
  }

function getFaq(id){
    var datastring = 'action=getFaq&'+'id='+id;
    var url = 'fetch_faq.php';
    $('#myModal1').modal({
      keyboard: true,
      backdrop: 'static'
    });

    $.ajax({
      type: "POST",
      data: datastring,
      url: url,
      dataType: 'json',
      success:function (data){

        $('#getId').val(data.Id);
        $('#getQuestion').val(data.question);
        $('#getAnswer').html(data.answer);
        $('#getLevel').val(data.level);


      }
    });
    console.log(datastring+url);
  }

function getProjects(id){
    var datastring = 'action=getProjects&'+'id='+id;
    var url = 'fetch_projects.php';
    $('#myModal1').modal({
      keyboard: true,
      backdrop: 'static'
    });

    $.ajax({
      type: "POST",
      data: datastring,
      url: url,
      dataType: 'json',
      success:function (data){

        $('#getId').val(data.Id);
        $('#getTitle').val(data.title);
        $('#getContent').html(data.content);
        $('#getImage').html(data.uploadedImage);

      }
    });
    console.log(datastring+url);
  }
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



<!-- Modal-Effect -->
<script src="../include/plugins/custombox/js/custombox.min.js"></script>
<script src="../include/plugins/custombox/js/legacy.min.js"></script>



<script src="../include/plugins/moment/moment.js"></script>
<script src='../include/plugins/fullcalendar/js/fullcalendar.min.js'></script>
<script src="../include/assets/pages/jquery.calendar.js"></script>



    <script src="../include/assets/pages/jquery.dashboard-2.js"></script>

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
