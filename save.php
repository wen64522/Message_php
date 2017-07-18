<?php
/**
 * Created by PhpStorm.
 * User: Wenyiwen
 * Date: 2017/6/24
 * Time: 13:20
 */
include ("input.class.php");
include ("db.php");
$i=new input();

$msg=$i->post('msg');
$user=$i->post('user');
if($msg==''or $user==''){
    echo '用户名或留言内容不能为空';
    exit;
}
$tt=time();
$sql="INSERT INTO msg (username,content,intime) VALUES ('$user', '$msg','$tt')";
$is=$mysqli->query($sql);
if($is){
    echo '插入成功';
    header("location:index.php");
}
    else {
        echo '插入失败';
}
?>