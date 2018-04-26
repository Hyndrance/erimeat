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
</script>
<!--left to right input masking-->
<script type="text/javascript">
  function moveCaretToStart(el) {
    if (typeof el.selectionStart == "number") {
        el.selectionStart = el.selectionEnd = 0;
    } else if (typeof el.createTextRange != "undefined") {
        el.focus();
        var range = el.createTextRange();
        range.collapse(true);
        range.select();
    }
}

var textBox = document.getElementById("ltr");


textBox.onfocus = function() {
    moveCaretToStart(textBox);

    // Work around Chrome's little problem
    window.setTimeout(function() {
        moveCaretToStart(textBox);
    }, 1);
};
var textBox2 = document.getElementById("ltr2");


textBox2.onfocus = function() {
    moveCaretToStart(textBox2);

    // Work around Chrome's little problem
    window.setTimeout(function() {
        moveCaretToStart(textBox2);
    }, 1);
};
var textBox3 = document.getElementById("ltr3");


textBox3.onfocus = function() {
    moveCaretToStart(textBox3);

    // Work around Chrome's little problem
    window.setTimeout(function() {
        moveCaretToStart(textBox3);
    }, 1);
};
</script>
<!--script for triggering chatbot-->
<!-- <script type="text/javascript">
$(document).ready(function(){
    $(".chat-closed").on("click",function(e){
        $(".chat-header,.chat-content").removeClass("hide");
        $(this).addClass("hide");
    });

    $(".chat-header").on("click",function(e){
        $(".chat-header,.chat-content").addClass("hide");
        $(".chat-closed").removeClass("hide");
    });
});

</script> -->
<!--script for chatbot content-->
<!-- <script type="text/javascript">
  var questionNum = 0;                          // keep count of question, used for IF condition.
var question = '<p>what is your name?</p>';         // first question

var output = document.getElementById('output');       // store id="output" in output variable
output.innerHTML = question;                          // ouput first question

function bot() {
    var input = document.getElementById("input").value;
    console.log(input);

    if (questionNum == 0) {
    output.innerHTML = '<p>hello ' + input + '</p>';// output response
    document.getElementById("input").value = "";      // clear text box
    question = '<p>how old are you?</p>';           // load next question
    setTimeout(timedQuestion, 1000);                  // output next question after 2sec delay
    }

    else if (questionNum == 1) {
    output.innerHTML = '<p>That means you were born in ' + (2018 - input) + '</p>';
    document.getElementById("input").style.visibility="hidden";
    question = '<p>Want to search job?Click the link below</p><br><a href="../home/?view=searchJob">Search Job</a>';
    setTimeout(timedQuestion, 1000);
    }

}

function timedQuestion() {
    output.innerHTML = question;
}

//push enter key (using jquery), to run bot function.
$(document).keypress(function(e) {
  if (e.which == 13) {
    bot();                                            // run bot function when enter key pressed
    questionNum++;                                    // increase questionNum count by 1
  }
});

</script> -->

<script type="text/javascript">
    $('#carousel-example-captions').carousel();
</script>

<script>
$( "#myBtnShowResume" ).click(function() {
  $( "#fileInput" ).show( "fast" );
});
</script>

<script>
$("#more").hide();
$("#readMore").click(function(){
  $("#more").show();
  $("#readMore").hide();
});

$("#more1").hide();
$("#readMore1").click(function(){
  $("#more1").show();
  $("#readMore1").hide();
});

$("#more2").hide();
$("#readMore2").click(function(){
  $("#more2").show();
  $("#readMore2").hide();
});

$("#more3").hide();
$("#readMore3").click(function(){
  $("#more3").show();
  $("#readMore3").hide();
});

$("#more4").hide();
$("#readMore4").click(function(){
  $("#more4").show();
  $("#readMore4").hide();
});
</script>


<script>
$( "#myLinkShowResume" ).click(function() {
  $( "#fileInput" ).show( "fast" );
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

<script type="text/javascript">

$(document).ready(function() {

    /* Every time the window is scrolled ... */
    $(window).scroll( function(){

        /* Check the location of each desired element */
        $('.hideme').each( function(i){

            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){

                $(this).animate({'opacity':'1'},500);

            }

        });

    });

});
</script>
