<?php
/**
 * Created by PhpStorm.
 * User: Wenyiwen
 * Date: 2017/6/24
 * Time: 13:59
 */
$mysqli = new  mysqli('localhost', 'root', '', 'liuyan');
if ($mysqli->connect_errno > 0) {
    echo "连接错误";
    echo $mysqli->connect_errno;
    exit;
}
$mysqli->query("SET NAMES UTF8");

