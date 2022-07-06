<?php
include '../dbcon/db.php';
session_start();


$uid = $_SESSION['userid'];
if ($uid == NULL) {
    echo "<script type='text/javascript'> window.location='../usr.php';</script>";
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Custom Login Form Styling with CSS3" />
    <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/modernizr.custom.63321.js"></script>
    <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    <style>
        body {
            background: #e1c192 url(images/wood_pattern.jpg);
        }
    </style>
</head>

<body>
    <form method="POST">
        <div class="container">



            <header>


                <h1>XYZ <strong>INTERNET</strong> BANKING</h1>

                <nav class="codrops-demos">
                    <a class="current-demo" href="qrdisplay.php">View Messages</a>
                    <a href="acc.php">Profile Info</a>
                    <a href="logout.php">Log Out</a>
                </nav>

                <div class="support-note">
                    <span class="note-ie">Sorry, only modern browsers.</span>
                </div>

            </header>

            <section class="main">
                <div class="form-2">

                    <?php


                        //  echo 'OTP MATCHed';
                        // $uid=$_SESSION['userid'];
                        $insql = "INSERT INTO `Trans_table`(`OTP`, `Flag`) VALUES ('2113131',0)";
                        $con->query($insql);


                        $sql = "SELECT `IMEI` FROM `user` WHERE id=$uid";
                        $result = $con->query($sql);

                        while ($row = mysqli_fetch_array($result)) {
                            $imei = $row['IMEI'];
                        }

                        if ($imei == '0') {

                            $sql = "UPDATE `Trans_table` SET `Flag`=1 where `OTP`='$otp'";
                            $con->query($sql);
                            header("refresh:1;url=check.php");
                        } else {

                            $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

                            //html PNG location prefix
                            $PNG_WEB_DIR = 'temp/';

                            include "qrlib.php";

                            //ofcourse we need rights to create temp dir
                            if (!file_exists($PNG_TEMP_DIR))
                                mkdir($PNG_TEMP_DIR);


                            $filename = $PNG_TEMP_DIR . 'test.png';




                            $matrixPointSize = 8;
                            if (isset($_REQUEST['size']))
                                $matrixPointSize = min(max((int)8, 1), 10);




                            $dataqr = $otp . $imei;

                            //it's very important!
                            if (trim($dataqr) == '')
                                die('data cannot be empty! <a href="?">back</a>');

                            // user data
                            $filename = $PNG_TEMP_DIR . 'test' . md5($dataqr . '|1|' . $matrixPointSize) . '.png';
                            QRcode::png($dataqr, $filename, 1, $matrixPointSize, 2);


                            //        
                            //         while (TRUE){
                            //            //do stuff
                            //
                            //        
                            //         $sql="SELECT `Flag` FROM `Trans_table` WHERE `OTP`='$otp'";
                            //     $result=$con->query($sql);
                            //            
                            //            while ($row = mysqli_fetch_array($result))
                            //            {
                            //            echo $flg=$row['Flag'];
                            //            while ($flg!=0)
                            //            {
                            //                echo 'Success';
                            //                
                            //            }
                            //            
                            //            }
                            //        
                            //            flush(); // execute the stuff you did until now
                            //            sleep(300); // wait 5 min
                            //            // now check database and retrieve new data, if any, and insert into $result 
                            //
                            //            if (isset($result)){
                            //                //do stuff with the $result
                            //                break; // get out of the loop
                            //            }
                            //        }


                            //    } 
                            //    else {    
                            //    
                            //        //default data
                            //        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
                            //        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
                            //        
                            //    }    

                            //display generated file
                            echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';
                            echo " <script>
var seconds = 15;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = '0' + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = 'Buzz Buzz';
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>";
                            echo 'Fetching the response within ';
                            echo '     <span id="countdown" class="timer"></span>';
                            echo ' seconds...';

                            //config form
                            //    echo '<form action="index.php" method="post">
                            //        Data:&nbsp;<input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'PHP QR Code :)').'" />&nbsp;
                            //        ECC:&nbsp;<select name="level">
                            //            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
                            //            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
                            //            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
                            //            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
                            //        </select>&nbsp;
                            //        Size:&nbsp;<select name="size">';
                            //        
                            //    for($i=1;$i<=10;$i++)
                            //        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
                            //        
                            //    echo '</select>&nbsp;
                            //        <input type="submit" value="GENERATE"></form><hr/>';

                            // benchmark
                            // QRtools::timeBenchmark();    


                            header("refresh:15;url=check.php");
                        }
                   

                    // put your code here
                    ?>
                </div>​​
            </section>

        </div>
        <!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $(".showpassword").each(function(index, input) {
                    var $input = $(input);
                    $("<p class='opt'/>").append(
                        $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
                            var change = $(this).is(":checked") ? "text" : "password";
                            var rep = $("<input placeholder='Password' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                            $input.remove();
                            $input = rep;
                        })
                    ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
                });

                $('#showPassword').click(function() {
                    if ($("#showPassword").is(":checked")) {
                        $('.icon-lock').addClass('icon-unlock');
                        $('.icon-unlock').removeClass('icon-lock');
                    } else {
                        $('.icon-unlock').addClass('icon-lock');
                        $('.icon-lock').removeClass('icon-unlock');
                    }
                });
            });
        </script>
    </form>
</body>

</html>