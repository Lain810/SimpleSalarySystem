<!DOCTYPE html>
<html lang="en">
<?php
//1. 链接数据库
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","study");
mysqli_set_charset($conn,"utf8");
$num=$_GET['num'];
//2.执行sql
$sql_select = "select * from salary where num='$num'";
$stmt = mysqli_query($conn,$sql_select);
// var_dump($stmt);
// die();
$salary2 = mysqli_fetch_assoc($stmt); // 解析数据

?>
<head>
    <meta charset="UTF-8">
    <title>salary managment system</title>
</head>
<body>
<?php include ('menu.php'); ?>
<h3 style="text-align: center">insert the information of employee</h3>
<form action="salaryaction.php?action=addsalary" method="post">
    <table align="center">
        <tr>
            <td>name</td>
            <td><input type="text" name="name" value="<?php echo $salary2['name'];?>"></td>
        </tr>
        <tr>
            <td>month</td>
            <td><input type="text" name="month"></td>
        </tr>
        <tr>
            <td>salary</td>
            <td><input type="text" name="salary"></td>
        </tr>
        <tr>
            <!--        <td> </td>-->
            <td><a href="salary.php">back</td>
            <td><input type="submit" value="submit"></td>
            <td><input type="reset" value="reset"></td>
        </tr>
    </table>
</form>
</body>
</html>