<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>salary managment system</title>
    <script>
        function doDel(id) {
            if(confirm('confirm delete?')) {
                window.location='action.php?action=del&id='+id;
            }
        }
    </script>
</head>
<body>
<?php
include ("menu.php");
?>
<h3 style="text-align: center">list information of employee</h3>
<table width="500" border="1" cellspacing="0"  align="center">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>sex</th>
        <th>age</th>
        <th>duty</th>
        <th>operation</th>
    </tr>
    <?php
    //    1. 链接数据库
    header("content-type:text/html;charset=utf8");
    $conn=mysqli_connect("localhost","root","","study");
    mysqli_set_charset($conn,"utf8");
    //2.执行sql
    $sql_select = "select * from stu";
    //3.data 解析
    foreach ( $conn->query($sql_select) as $row) {
        echo "<tr>";
        echo "<th>{$row['id']} </th>";
        echo "<th>{$row['name']}</th>";
        echo "<th>{$row['sex']} </th>";
        echo "<th>{$row['age']} </th>";
        echo "<th>{$row['duty']}</th>";
        echo "<td>
          <a href='edit.php?id={$row['id']}'>change</a>
          <a href='javascript:void(0);' onclick='doDel({$row['id']})'>delete</a>
          <a href='salary.php?id={$row['id']}'>salary</a>
        </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>