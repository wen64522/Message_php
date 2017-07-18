<?php
session_start();
include ("db.php");
$sql="SELECT * FROM msg  ORDER BY id DESC ";
$mysqli_result=$mysqli->query($sql);
$rows=array();
while($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[]=$row;
    }
?>

<!DOCTYPE html>
<html>
 <head>
  <title>小绎留言板</title>
  <link rel="stylesheet"href="css.css"/>
 </head>
 <body>
 <div class="log">
     <h1 style="text-align: center">欢迎使用小绎留言板^_^！</h1>
     <a href="register.php" class="b">管理员注册</a>
     <a href="login.php?" class="a">管理员登陆</a>
 </div>
 <div class="add">
     <form action="save.php" method="post">
         <textarea name="msg"></textarea>
         <input  class="user"  name="user" type="text" placeholder="请输入你的昵称"/>
         <input class="btn" type="submit" value='发表'/>
     </form>
 </div>
<div class="msg">
    <?php
    foreach($rows as $row) {
        $t=date("Y年m月d日",$row['intime']);
        ?>
        <div class="item">
            <span class="user"><?php echo $row['username']."说：";?></span>
            <span class="time"><?php echo $t;?>

                <?php
                if(isset($_SESSION['admin'])) {
                    ?>
                    <a onclick="return confirm('你确定要删除吗？')" href="delete.php?id=<?php echo $row['id']; ?>">删除</a>
                    <?php
                }
                ?>
            </span>
            <div style="clear: both;"></div>
            <p>
                <?php echo $row['content'];?>
            </p>
        </div>
        <?php
    }
    ?>
</div>
 </body>
</html> 