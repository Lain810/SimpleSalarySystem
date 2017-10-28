<?php
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","study");
mysqli_set_charset($conn,"utf8");
if($conn){

    switch ($_GET['action']){

        case 'addsalary'://add
            $name = $_POST['name'];
            $time = $_POST['month'];
            $salary = $_POST['salary'];

            $sql = "insert into salary (`name`, `time`, salary) values ('$name', '$time','$salary')";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('insert successfully');</script>";
            }else{
                echo "<script>alert('insert failed');</script>";
            }
            header('Location: index.php');
            break;

        case 'del'://get
            $num = $_GET['num'];
            $sql = "delete from salary where num='$num'";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('delete successfully');</script>";
            }else{
                echo "<script>alert('delete failed');</script>";
            }
            header('Location: index.php');
            break;

        case 'edit'://post
            $num = $_POST['num'];
            $name = $_POST['name'];
            $time = $_POST['month'];
            $salary = $_POST['salary'];
// echo $id, $age, $age, $name;
            $sql = "update salary set name='$name', time='$time',salary='$salary' where num='$num';";
// $sql = "update myapp.stu set name='jike',sex='女', age=24,classid=44 where id=17";
// print $sql;
            $rw = mysqli_query($conn,$sql);
// var_dump($rw);
// die();
            if ($rw > 0){
                echo "<script>alert('update successfully');</script>";
            }else{
                echo "<script>alert('update failed');</script>";
            }
            header('Location: index.php');
            break;
        default:
            header('Location: index.php');
            break;
    }

}else{
    die('数据库连接失败' .mysqli_connect_error());
}

?>