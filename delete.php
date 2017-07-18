<?php
/**
 * Created by PhpStorm.
 * User: Wenyiwen
 * Date: 2017/6/24
 * Time: 18:55
 */
session_start();
if(isset($_SESSION['admin'])==false) {
    echo "需要管理员登陆";
    exit;
}
include ("input.class.php");
include ("db.php");
$input=new input();
$id=$input->get('id');
$sql="delete from msg where id='$id'";
$is=$mysqli->query($sql);
if($is==true){
    header("location:index.php");
}else{
    echo "删除失败";
}

?>