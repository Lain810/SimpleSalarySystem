<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect('localhost','root','','study');
mysqli_set_charset($link,'utf8'); //设定字符集
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$pwdconfirm=$_POST['pwdconfirm'];
$yzm=$_POST['yzm'];
if($name==''){
    echo"<script>alert('The user name can not null, please try again');location='".$_SERVER['HTTP_REFERER']. "'</script>";
    exit;
}
if($pwd==''){
    echo"<script>alert('The password can not null, please try again');location='".$_SERVER['HTTP_REFERER']. "'</script>";
    exit;
}
if($pwd != $pwdconfirm){
    echo"<script>alert('The psssword is not same, please try again');location='".$_SERVER['HTTP_REFERER']. "'</script>";
    exit;
}
if($yzm!=$_SESSION['VCODE']){
    echo"<script>alert('The verification code is wrong, please try again');location='".$_SERVER['HTTP_REFERER']. "'</script>";
    exit;
}

$insert_sql="insert into user(username,password)values(? , ? )";
$stmt=mysqli_prepare($link,$insert_sql);
mysqli_stmt_bind_param($stmt,'ss',$name,$pwd);
$result_insert=mysqli_stmt_execute($stmt);
if($result_insert){
    echo "<script>alert('Register successfully');location='login.html'</script>";
    exit;
}else {
    echo "<script>alert('The username already existent, please try again');location='reg.html'</script>";
    exit;
}
?>


