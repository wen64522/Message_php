<?php
/**
 * Created by PhpStorm.
 * User: Wenyiwen
 * Date: 2017/6/24
 * Time: 19:26
 */
function message($msgTitle,$message,$jumpUrl){
    $str = '<!DOCTYPE HTML>';
    $str .= '<html>';
    $str .= '<head>';
    $str .= '<meta charset="utf-8">';
    $str .= '<title>页面提示</title>';
    $str .= '<style type="text/css">';
    $str .= '*{margin:0; padding:0}a{color:#369; text-decoration:none;}a:hover{text-decoration:underline}body{height:100%; font:12px/18px Tahoma, Arial,  sans-serif; color:#424242; background:#fff}.message{width:450px; height:120px; margin:16% auto; border:1px solid #99b1c4; background:#ecf7fb}.message h3{height:28px; line-height:28px; background:#2c91c6; text-align:center; color:#fff; font-size:14px}.msg_txt{padding:10px; margin-top:8px}.msg_txt h4{line-height:26px; font-size:14px}.msg_txt h4.red{color:#f30}.msg_txt p{line-height:22px}';
    $str .= '</style>';
    $str .= '</head>';
    $str .= '<body>';
    $str .= '<div class="message">';
    $str .= '<h3>'.$msgTitle.'</h3>';
    $str .= '<div class="msg_txt">';
    $str .= '<h4 class="red">'.$message.'</h4>';
    $str .= '<p>系统将在 <span style="color:blue;font-weight:bold">3</span> 秒后自动跳转,如果不想等待,直接点击 <a href="index.php">这里</a> 跳转</p>';
    $str .= "<script>setTimeout('location.replace(\'".$jumpUrl."\')',2000)</script>";
    $str .= '</div>';
    $str .= '</div>';
    $str .= '</body>';
    $str .= '</html>';
    echo $str;
}
include ("input.class.php");
include ("db.php");
$input=new input();
$a=$input->post('admin');
$p=$input->post('pwd');
if($a==''or $p==''){
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
    echo  exit;
}

$sql1="SELECT * FROM login WHERE admin='$_POST[admin]' ";
$iss=$mysqli->query($sql1);
$num =mysqli_num_rows($iss);
if($num){
    echo "<script>alert('用户已存在！'); history.go(-1);</script>";
}
else{
    $sql="INSERT INTO login (admin,pwd) VALUES ('$a', '$p')";
    $mysqli->query($sql);
    message('提示信息','操作成功','index.php');
}

