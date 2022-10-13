<?php

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
// echo ("连接成功");

//创建数据表--------
// $sql = "CREATE TABLE myOvertimes(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// datetimes date NOT NULL,
// duration VARCHAR(30) NOT NULL,
// reg_date TIMESTAMP)";
// $sql1 = "ALTER TABLE myGuests alter column datetimes date ";
// if(mysqli_query($conn,$sql)){
//     echo "Table MyGuests created/update successfully";
// }
// else{
//     echo "Error creating table:".mysqli_error($conn);
// }
// mysqli_close($conn);
//设置查询结果的编码，一定要放在query之前

$result=$conn->query("select * from myGuests");

//$conn->query()获取的是二进制

//将查询的结果集封装到一个数组里

$css=$result->fetch_all();

//以json的格式发送ajax的success中由data接收

echo json_encode($css);

$conn->close();

?>