<?php
// данные для подключения к базе данных
$server="localhost";
$username="root";
$password="";
$dbname="taskdb";

//подключение к баже данных
$conn=mysqli_connect($server,$username,$password,$dbname);
//прописываем кодировку базы данных
mysqli_set_charset($conn,"utf8");

?>