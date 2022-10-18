<?php
header("Content-type:text/html;charset=utf-8");
$task = $_POST["task"];
if($task == ''){
    return;
}
$datetime = $_POST["datetimes"];
$deadline = $_POST["deadline"];
$duration = $_POST["duration"];
// echo "php获取的js传递的参数值为：".$datetimes;
// echo date($deadline);
$edit = $_POST["edit"];
$delete = $_POST["delete"];
$datetimesEdit = $_POST["datetimesEdit"];
$deadlineEdit = $_POST["deadlineEdit"];
$durationVal = $_POST["durationVal"];
// echo "alert($edit)";



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


//SQL
// 调整序号id
// $sqlid = "SET @auto_id = 0; update myguests set id = (@auto_id := @auto_id + 1) ; ALTER TABLE myguests AUTO_INCREMENT = 1;";
// $result=$conn->multi_query($sqlid);
if($task == "deletes"){
    $sqldelete = "DELETE FROM myGuests WHERE id = $delete";
    $result=$conn->query($sqldelete);
    $sqlid = "SET @auto_id = 0; update myguests set id = (@auto_id := @auto_id + 1) ; ALTER TABLE myguests AUTO_INCREMENT = 1;";
    $result=$conn->multi_query($sqlid);
}else if($task == "edit"){
    if($durationVal<0){
        $sqledit = "UPDATE myGuests SET  datetimes = '$datetimesEdit',duration = '$durationVal' WHERE id = $edit";
    }else{
        $sqledit = "UPDATE myGuests SET  datetimes = '$datetimesEdit',deadline = '$deadlineEdit',duration = '$durationVal' WHERE id = $edit";
    }
    // $sqledit = "DELETE FROM myGuests WHERE id = 2";
    $result=$conn->query($sqledit);
}else if($task == "inserts"){
    $sqldata =  "INSERT INTO myGuests (datetimes,deadline,duration) VALUES ('$datetime','$deadline', '$duration')";
    $result=$conn->query($sqldata);
    $sqlid = "SET @auto_id = 0; update myguests set id = (@auto_id := @auto_id + 1) ; ALTER TABLE myguests AUTO_INCREMENT = 1;";
    $result=$conn->multi_query($sqlid);
}else if($task == "orderByDateUD"){
    $sqlOrder = "UPDATE myguests t INNER JOIN (select a.*, (@i:= @i+1) as rank_no from (select * from myguests ORDER BY datetimes desc) a,(select @i:=0)b) c  ON t.id = c.rank_no set t.datetimes = c.datetimes,t.duration = c.duration,t.deadline = c.deadline";
    $result=$conn->query($sqlOrder);
}else if($task == "orderByDateUT"){
    $sqlOrder1 = "UPDATE myguests t INNER JOIN (select a.*, (@i:= @i+1) as rank_no from (select * from myguests ORDER BY datetimes asc) a,(select @i:=0)b) c  ON t.id = c.rank_no set t.datetimes = c.datetimes,t.duration = c.duration,t.deadline = c.deadline";
    $result=$conn->query($sqlOrder1);
}

?>