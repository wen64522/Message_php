<?php
/**
 * Created by PhpStorm.
 * User: Wenyiwen
 * Date: 2017/6/24
 * Time: 17:27
 */
session_start();
include ("input.class.php");
include ("db.php");
$input=new input();
$act=$input->get('act');
if($act!==false) {
    $admin = $input->post('admin');
    $pwd = $input->post('pwd');
    $sql = "select * from login where admin='$admin'and pwd='$pwd'";
    $mysqli_result = $mysqli->query($sql);
    if ($row = $mysqli_result->fetch_array()) {
        $_SESSION['admin'] = $row['admin'];
        header("location:index.php");
    } else {
        echo "你的账号或密码错误！";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>管理员登陆</title>
</head>
<body>
<form action="login.php?act=chk" method="post">
   <label>账号：<input type="text" name="admin"/></label> <br/><br/>
   <label>密码：<input type="password" name="pwd"/></label> <br/><br/>
    <input type="submit" value="登陆">
</form>
</body>
</html>
