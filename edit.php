<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>salary managment system</title>
</head>
<body>

<?php include ('menu.php');
//1. 链接数据库
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","study");
mysqli_set_charset($conn,"utf8");
$id=$_GET['id'];
//2.执行sql
$sql_select = "select * from stu where id='$id'";
$stmt = mysqli_query($conn,$sql_select);
// var_dump($stmt);
// die();
$stu = mysqli_fetch_assoc($stmt); // 解析数据

?>

<h3 style="text-align: center">update employee information</h3>

<form action="action.php?action=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $stu['id'];?>">
    <table align="center">
        <tr>
            <td>name</td>
            <td><input type="text" name="name" value="<?php echo $stu['name'];?>"></td>
        </tr>
        <tr>
            <td>age</td>
            <td><input type="text" name="age" value="<?php echo $stu['age'];?>"></td>
        </tr>
        <tr>
            <td>sex</td>
            <td>
                <input type="radio" name="sex" value="male" <?php echo ($stu['sex'] == "male")? "checked":"";?> >male
            </td>
            <td>
                <input type="radio" name="sex" value="female" <?php echo ($stu['sex'] == "female")? "checked":"";?> >female
            </td>
        </tr>
        <tr>
            <td>duty</td>
            <td><input type="text" name="duty" value="<?php echo $stu['duty']?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="submit"></td>
            <td><input type="reset" value="reset"></td>
        </tr>
    </table>
</form>




<?php
?>
</body>
</html>