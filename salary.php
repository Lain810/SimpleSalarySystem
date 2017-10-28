<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>salary managment system</title>
    <script>
        function doDel(num) {
            if(confirm('confirm delete?')) {
                window.location='salaryaction.php?action=del&num='+num;
            }
        }
    </script>
</head>
<body>
<?php
include ("menu.php");
?>
<h3 style="text-align: center">list information of employee</h3>

<table width="500" border="1" cellspacing="0" align="center">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>month</th>
        <th>salary</th>
        <th>operation</th>
    </tr>
<?php
//    1. 链接数据库
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","study");
mysqli_set_charset($conn,"utf8");
//2.执行sql
$id=$_GET['id'];
$sql_select = "SELECT * FROM stu,salary WHERE stu.name=salary.name and stu.id = '$id'";
//3.data 解析
$tmp=9999;
foreach ( $conn->query($sql_select) as $row) {
    $tmp=$row['num'];
    echo "<tr>";
    echo "<th>{$row['id']} </th>";
    echo "<th>{$row['name']}</th>";
    echo "<th>{$row['time']} </th>";
    echo "<th>{$row['salary']} </th>";
    echo "<td>
          <a href='salaryedit.php?num={$row['num']}'>change</a>
          <a href='javascript:void(0);' onclick='doDel({$row['num']})'>delete</a>
        </td>";
    echo "</tr>";
}
if ($tmp!=9999)
{
    echo "<a href='addsalary.php?num={$tmp}'>insert new salary</a>";
}
else
{
    echo "<a href='add%20salary.php'>insert new salary</a>";
}

?>