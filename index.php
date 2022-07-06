<?php
session_start();

if(isset($_POST['but']))
{
   
 $user=$_POST['log'];
    
 $pass=$_POST['pas'];
 
 if($user=="admin")
 {
     if($pass=="admin")
     {
           $_SESSION['admin']="login";
            echo "<script type='text/javascript'> window.location='./admin/index.php';</script>"; 
         
     }
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
    <body>      <form method="POST" action="">
        <div class="container">
		

			
			<header>
			
				<h1>Secure <strong>Ministry</strong> LogIn</h1>
				
				<nav class="codrops-demos">
					<a class="current-demo" href="index.php">Admin LogIn</a>
                                        <a href="usr.php">User LogIn</a>
					
				</nav>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
                       
                                
                        
                            <div class="form-1">
                           
<!--                                <input type="text" name="log" placeholder="Username or email"/>
                                       <input type="password" name="pas" placeholder="Password"/>-->
                                    
                           
					<p class="field">
                                  
						<input type="text" name="log" placeholder="Username or email" />
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="pas" placeholder="Password" />
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" name="but"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</div>
                                   
			</section>
        </div>
        </form>   </body>
</html>