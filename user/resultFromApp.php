<?php


if(isset($_POST['resotp']))
    
{

    $server="localhost";
    $dbusername="root";
    $dbpass="";
    $dbname="twolevel";
    $con=new mysqli($server,$dbusername,$dbpass,$dbname);

   
  
     $r=array(); 
     $otp=$_POST['resotp'];
    
     $sql="UPDATE `Data` SET `status`=1 WHERE `id`='$otp'";
   //$result=$con->query($sql);
   $res=$con->query($sql);

    
    $r["status"]="ok";

     echo json_encode($r);
    
}

?>