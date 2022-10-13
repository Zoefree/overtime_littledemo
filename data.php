<?php
header("Content-type:text/html;charset=utf-8");
$datetime = $_GET["datetimes"];
$datetimes = $datetime;
$duration = $_GET["duration"];
echo "php获取的js传递的参数值为：".$datetimes;
// echo date($datetimes);
$servername = "localhost"; //本地服务器名为localhost
$username = "admin";  //mysql用户名
$password = "123456";   //mysql密码
$datebase = "loacl8082";   //数据库名
$port = "3306";
 
// 创建连接
$conn = mysqli_connect($servername,$username,$password,$datebase,$port);
mysqli_query($conn,"SET NAMES 'UTF8'");  //解决中文乱码问题
 
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqldata =  "INSERT INTO myGuests (datetimes,duration) VALUES ('$datetimes','$duration')";

$result=$conn->query($sqldata);
?>