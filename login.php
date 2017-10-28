<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect('localhost','root','','study');//链接数据库
mysqli_set_charset($link,'utf8'); //设定字符集
$name=$_POST['username'];
$pwd=$_POST['password'];
$yzm=$_POST['yzm'];
$hadden=$_POST['hadden'];
if($hadden=="hadden"){
    if($name==''){
        echo "<script>alert('Please input username');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;
    }
    if($pwd==''){

        echo "<script>alert('Please input password');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;

    }
    if($yzm!=$_SESSION['VCODE']){

        echo"<script>alert('the verification code is wrong, please try again');location='".$_SERVER['HTTP_REFERER']. "'</script>";
        exit;
    }
}
$sql_select="select id,username,password from user where username= ?"; //从数据库查询信息
$stmt=mysqli_prepare($link,$sql_select);
mysqli_stmt_bind_param($stmt,'s',$name);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);

if($row){

    if($pwd !=$row['password'] || $name !=$row['username']){

        echo "<script>alert('The password is wrong, please try again');location='login.html'</script>";
        exit;
    }
    else{
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
        echo "<script>alert('login successfully');location='menu.php'</script>";
    }

}else{
    echo "<script>alert('the username is not existent');location='login.html'</script>";
    exit;
};