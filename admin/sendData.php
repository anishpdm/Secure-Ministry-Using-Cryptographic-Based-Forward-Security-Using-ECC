<?php
session_start();

$chek = $_SESSION['admin'];

if ($chek == NULL) {

    echo "<script type='text/javascript'> window.location='../index.php';</script>";
}

include '../dbcon/db.php';
if (isset($_POST['sub'])) {

    $custname = $_POST['custname'];

    $custid = $_POST['custid'];

    $phone = $_POST['phone'];

    $email = $_POST['email'];
    $imei = $_POST['imei'];
    $pass = $_POST['pass'];


    $sql = "INSERT INTO `user`(`CustomerName`, `CustomerId`,  `Phone`, `IMEI`, `Email`, `password`)
  VALUES('$custname',$custid,'$phone','$imei','$email','$pass') ";

    if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Successfully added')</script>";
    } else {
        echo $con->error;
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN </title>
    <meta name="description" content="Custom Login Form Styling with CSS3" />
    <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/modernizr.custom.63321.js"></script>
    <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
</head>

<body>
    <form method="POST" action="">
        <div class="container">



            <header>

                <h1> <strong>App</strong> </h1>
                <h2> Administrator</h2>

                <nav class="codrops-demos">
                    <a href="index.php">Add new User</a>
                    <a href="search.php">Search</a>
                    <a class="current-demo" href="sendData.php">Send Data</a>

                    <a href="logout.php">Log Out</a>
                </nav>

                <div class="support-note">
                    <span class="note-ie">Sorry, only modern browsers.</span>
                </div>

            </header>

            <section class="main">



                <div class="form-1">

                    <!--                                <input type="text" name="log" placeholder="Username or email"/>
                                       <input type="password" name="pas" placeholder="Password"/>-->
                    <input type="text" name="custid" placeholder="Customer Id" />
                    <textarea class="form-control" placeholder="Message" name="" id="" cols="30" rows="10"></textarea>
                    

                    <br>
                    <center>
                        <div>
                            <input style="background: #00aabb" type="submit" value="SUBMIT" name="sub" />
                        </div>
                    </center>



                </div>

            </section>
        </div>
    </form>
</body>

</html>