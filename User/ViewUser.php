
<?php
    @session_start();
    include_once '../config/connection.php';
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql="SELECT * FROM user where email = '$email' AND password = '$password'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<html>
<<<<<<< HEAD
    <head>
    <style type="text/css">
    #viewdata table{
        border:1px solid #aaa;
    }
    #viewdata th{background:#aaa;}
    #viewdata td{background:#efefef;}
    #viewdata th,td{padding:5px;text-align:left;}
    </style>
    <table id="viewdata">
        <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Họ</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ Email</th>
        <th>Kiểu người dùng</th>
        <th>Hành động</th>
        </tr>
        <?php 
        $i=1;
        while($row=mysqli_fetch_assoc($res))
        {

            echo "<tr><td>";
            echo $i;
            echo "</td><td>";
            echo $row['fname'];
            echo "</td><td>";
            echo $row['lname'];
            echo "</td><td>";
            echo $row['phone'];
            echo "</td><td>";
            echo $row['email'];
            echo "</td><td>";
            echo $row['type'];
            echo "

            <td><a href=\"#\" onclick=\"getPage('Edit.php?data=".$row['id_user']."')\">Edit</a></td></tr>";
            $i++;
        }
        mysqli_close($con);
        ?>
=======
<head>
<style type="text/css">
#viewdata table{
    border:1px solid #aaa;
}
#viewdata th{background:#aaa;}
#viewdata td{background:#efefef;}
#viewdata th,td{padding:5px;text-align:left;}
</style>
<table id="viewdata">
<tr>
<th>STT</th>
<th>Tên</th>
<th>Họ</th>
<th>Số điện thoại</th>
<th>Địa chỉ Email</th>
<th>Kiểu người dùng</th>
<th>Hành động</th>
</tr>
<?php
$i=1;
while($row=mysqli_fetch_assoc($res))
{

echo "<tr><td>";
echo $i;
echo "</td><td>";
echo $row['fname'];
echo "</td><td>";
echo $row['lname'];
echo "</td><td>";
echo $row['phone'];
echo "</td><td>";
echo $row['email'];
echo "</td><td>";
echo $row['type'];
echo "

<td><a href=\"#\" onclick=\"getPage('Edit.php?data=".$row['id']."')\">Edit</a></td></tr>";
$i++;
}
mysqli_close($con);
?>
>>>>>>> 1bba2d42102fa95e08347ad7add420465838712b
</table>
