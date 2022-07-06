<?php
// include './dbcon/db.php';
if(isset($_POST['custid']))
{

    $server="localhost";
    $dbusername="root";
    $dbpass="";
    $dbname="twolevel";
    $con=new mysqli($server,$dbusername,$dbpass,$dbname);

   

    $r=array();

$custid=$_POST["custid"];
$pass=$_POST["pass"];


  $sql="SELECT `id`, `CustomerName`, `CustomerId`, `Phone`, `IMEI`, `Email`, `password` FROM `user`  WHERE `CustomerId`=$custid and `password`='$pass'";


$result=$con->query($sql);
if ($result->num_rows > 0) {
    $r["status"]="ok";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $r["data"][]=$row;
    }
} else {
    $r["status"]="failed";
   

    echo $con->error;
}
    

    echo json_encode($r);
}
