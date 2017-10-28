<?php
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","study");
mysqli_set_charset($conn,"utf8");
if($conn){

    switch ($_GET['action']){

        case 'add'://add
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $duty = $_POST['duty'];

            $sql = "insert into stu (`name`, sex, age, duty) values ('$name', '$sex','$age','$duty')";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('insert successfully');</script>";
            }else{
                echo "<script>alert('insert failed');</script>";
            }
            header('Location: index.php');
            break;

        case 'del'://get
            $id = $_GET['id'];
            $sql = "delete from stu where id='$id'";
            $rw = mysqli_query($conn,$sql);
            if ($rw > 0){
                echo "<script>alert('delete successfully');</script>";
            }else{
                echo "<script>alert('delete failed');</script>";
            }
            header('Location: index.php');
            break;

        case 'edit'://post
            $id = $_POST['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $duty = $_POST['duty'];
            $sex = $_POST['sex'];

// echo $id, $age, $age, $name;
            $sql = "update stu set name='$name', age='$age',sex='$sex',duty='$duty' where id='$id';";
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