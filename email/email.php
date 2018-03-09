

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Teamire - Insert System Name</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../include/assets/images/favicon.ico">

        <!-- App css -->
        <link href="../include/../include/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../include/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../include/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../include/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../include/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                              <div class="login-left-box">
                                <div class="login-title">Teamire</div>
                                <div class="login-description">
                                  Lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor
                                  lorem ipsum
                                </div>
                                <button type="button" class="btn btn-warning waves-effect w-md waves-light">Read More</button>
                              </div>
                                <div class="account-box">
                                    <div class="account-logo-box">
                                      <div class="login-logo">
                                        <img src="../include/assets/images/teamire-logo.png">
                                      </div>
                                       
                                       
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal"  method="POST">

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label>Send to</label><br>
                                                <input type="text" name="receiver" class="form-control"><br>
                                                <label>Subject</label><br>
                                                <input type="text" name="subject" class="form-control"><br>
                                                <label>Body</label><br>
                                                <textarea name="body" class="form-control">
                                                    
                                                </textarea><br> 
                                 
                                                    
                                                </div>
                                            </div>

                                         

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit" name="send">Send</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->
<?php
extract($_POST);

if (isset($send)) {
    require_once "swift/lib/swift_required.php";
        
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                    ->setUsername('rgmak12@gmail.com')
                    ->setPassword('movespeed1993');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($subject)
                    ->setFrom(array('rgmak12@gmail.com' => 'Makcintosh'))
                    ->setTo(array($receiver));

$message->setBody($body, 'text/html');

if(!empty($targetpath)) {
     $message->attach(Swift_Attachment::fromPath($targetpath));
}
        
if (!$mailer->send($message, $errors)) {
    echo "Error:";
    print_r($errors);
}
}

?>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../include/assets/js/jquery.min.js"></script>
        <script src="../include/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="../include/assets/js/bootstrap.min.js"></script>
        <script src="../include/assets/js/metisMenu.min.js"></script>
        <script src="../include/assets/js/waves.js"></script>
        <script src="../include/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../include/assets/js/jquery.core.js"></script>
        <script src="../include/assets/js/jquery.app.js"></script>

    </body>
</html>
