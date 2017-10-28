<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>salary managment system</title>
</head>
<body>
<?php include ('menu.php'); ?>
<h3>insert the information of employee</h3>
<form action="salaryaction.php?action=addsalary" method="post">
    <table>
        <tr>
            <td>name</td>
            <td><input type="text" name="name"></td>
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