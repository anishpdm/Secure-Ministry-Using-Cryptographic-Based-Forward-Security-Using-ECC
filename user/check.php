

<?php
include '../dbcon/db.php';
session_start();


$uid=$_SESSION['userid'];
 $cid=$_SESSION['custid'];
if($uid==NULL)
{
    
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
    <body> <form method="POST">
        <div class="container">
		
	
			
			<header>
			
			
				<h1>XYZ <strong>INTERNET</strong> BANKING</h1>
				
				<nav class="codrops-demos">
					<a  class="current-demo" href="index.php">View Messages </a>
					<a href="acc.php">Account Info</a>
                                             <a  href="logout.php">Log Out</a>
				</nav>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
				<div class="form-2">
	<?php
        
 
  $Id= $_SESSION['valiId'];


                   
         $sql= "SELECT `id`, `custId`, `Message`, `Date`, `status` FROM `Data` WHERE `id`=$Id and `status`=1";
     $result=$con->query($sql);
            
            while ($row = mysqli_fetch_array($result))
            {
        $status=$row['status'];
        $Message=$row['Message'];
            }
            
            if($status==1)
            {
              //  echo 'Transaction Success';
                echo '<br>';
                 echo '<br>';
                
          
                   echo 'Decoded Message :'. $Message;
         
                
            }
            else
            {
                 echo "Verification Failed";
                
                
            }
            echo '<br>';
              echo '<br>';
            
            echo "    <a href='./index.php'>Click Here to Try again</a>";
            
          
        
?>

       
				</div>​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
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

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
        </form>  </body>
</html>

