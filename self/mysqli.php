<?php

$mysql = mysqli_connect($servername,$username,$password,$database);

if($mysql -> connect_error){
    die("connect failed " . $mysql->connect_error);
}
?>