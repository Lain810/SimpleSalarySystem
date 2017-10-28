<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>salary managment system</title>
</head>
<body>
<?php include ('menu.php'); ?>
<h3 style="text-align: center">insert the information of employee</h3>
<form action="action.php?action=add" method="post">
    <table align="center">
        <tr>
            <td>name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>age</td>
            <td><input type="text" name="age"></td>
        </tr>
        <tr>
            <td>sex</td>
            <td><input type="radio" name="sex" value="male">male</td>
            <td><input type="radio" name="sex" value="female">female</td>
        </tr>
        <tr>
            <td>duty</td>
            <td><input type="text" name="duty"></td>
        </tr>
        <tr>
            <!--        <td> </td>-->
            <td><a href="index.php">buck</td>
            <td><input type="submit" value="submit"></td>
            <td><input type="reset" value="reset"></td>
        </tr>
    </table>
</form>
</body>
</html>