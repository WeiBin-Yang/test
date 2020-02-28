
<?php
$servername = "localhost";
// $username = "root";
$username = "wy9077";
// $password = "yangweibin038";
$password = "weathernews";
$database = "wy9077";

// $mysql = mysqli_connect("127.0.0.1","root","yangweibin038");
// $mysql = new mysqli($servername,$username,$password);
// if(!$mysql){
//     echo "it doesnot connect";
// }else{
//     echo"it connect";
// }
// if($mysql -> connect_error){
//     die("connect failed " . $mysql->connect_error);
// }

require "mysqli.php";
// echo "connect success";


$server = $_SERVER['SERVER_NAME'];
$serverip = GetHostByName($_SERVER['SERVER_NAME']);
$clientip = $_SERVER['REMOTE_ADDR']; 
$username = Get_Current_User();
$serverport = $_SERVER['SERVER_PORT'];
$filepath = __FILE__;
$currentVisitTime = date('Y-m-d H:i:s',time());
$message = "";
$message .= "username:".$username."<br>";
$message .= "server:".$server."<br>";
$message .= "server ip:".$serverip."<br>";
$message .= "client ip:".$clientip."<br>";
$message .= "server port:".$serverport."<br>";
$message .= "current file path:".$filepath."<br>";
$message .= "current visit time:".$currentVisitTime."<br>";


// echo $message;

if($mysql){
    $stmt = $mysql -> prepare("insert into selfmain(username)values(?)");
    $stmt -> bind_param("s",$username);
    $stmt -> execute();
    $stmt -> close();

    // $stmt2 = $mysql -> prepare("insert into selfvice(username,server,serverip,clientip,serverPort,currentPath,currentTime)values(?,?,?,?,?,?,?)");
    // $stmt2 -> bind_param("s,s,s,s,s,s,i",$username,$server,$serverip,$clientip,$serverport,$filepath,$currentVisitTime);
    // $stmt2 = $mysql -> prepare("insert into selfvice(username,serverip)values(?,?)");
    // $stmt2 -> bind_param("s,i",$username,$serverip);
    // $stmt2 -> execute();
    // $stmt2 -> close();
    $sql = "insert into selfvice(username,server,serverip,clientip,serverPort,currentPath,currentTime)values('$username','$server','$serverip','$clientip','$serverport','$filepath','$currentVisitTime')";
    // $sql = "insert into selfvice(username)values('$username')";
    $insert = mysqli_query($mysql,$sql);
    if($insert){
        echo "<p>insert success</p>";
    }else{
        echo "<p>insert fail</p>";
    }
}
header("Location:selfCheckPoint.php");
?>