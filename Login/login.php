<?php

include('../config/connection.php');

session_start();
ob_start();
$noti = "";
if (isset($_SESSION['email'])) header("Location: login.php");
if (isset($_GET['status']))  $noti = $_GET['status'] == 0 ? "Đăng ký thành công, vui lòng kiểm tra email để kích hoạt tài khoản" : "Kích hoạt tài khoản thành công";
if (isset($_POST['submit-login'])) {

    $email = $_POST['uname'];
    $password = $_POST['password'];

    $query = "SELECT * From user where email = '$email' AND password = '$password'";
    $res = mysqli_query($con, $query);
    $row = mysqli_num_rows($res);
    if ($row > 0) {
        $user_logged = mysqli_fetch_assoc($res);
        if ($user_logged['status'] == 0) {
            $errors['all'] = "Tài khoản chưa được kích hoạt";
        } elseif($row==1) {
        

               
                $_SESSION['email'] = $user_logged ['email'];
                $_SESSION['password'] =$user_logged ['password'];
                $_SESSION['type'] = $user_logged ['type'];
                   
                   if($_SESSION['type'] == 'Admin'){
                       header('location:../index.php'); 
                   }elseif ($_SESSION['type'] == 'user') {
                       header('location:../User/index.php');
                    }    
    }
    }
    else {
        header('location:ErrorMesage.php');
    }
}

    


?>


<!DOCTYPE html>
<html>

<head>
    <title>Docs | Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fontawesome.com/v4.7/icons/">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script>
        function getPage(url) {
            $('#content').hide(1000, function() {
                $('#content').load(url);
                $('#content').show(1000, function() {});
            });
        }
    </script>
</head>

<body>
    <div id="wrap">
        <div id="header">
            <div id="logo">
                <h1 style="text-align: center;">DFS | <span style="color:green">ĐĂNG NHẬP</span></h1>
            </div>
        </div>
        <?php if (isset($_GET['status'])) : ?>
                                        <div class="alert alert-success text-center " role="alert">
                                            <?php echo $noti ?>
                                        </div>
                                    <?php endif; ?>

        <?php if (isset($_POST['submit-login'])) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $errors['all'] ?>
                </div>
            <?php endif; ?>

        <div id="content">
            <form name="Myform" id="Myform" action="" method="post" onsubmit="return(Validate());">
                <div id="error" style="color:red; font-size:16px; font-weight:bold; padding:5px"></div>
                <table style="width:100px; margin-left:2em;">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td style="text-align: right;font-size: 20px"><i class="fas fa-user-circle"></i>Email:  </td>
                            <td style="font-size: 20px"><input type="text" name="uname" id="fname" onkeydown="HideError()" size="20px;" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;font-size: 20px"><i class="fas fa-lock"></i>Mật khẩu: </td>
                            <td style="font-size: 20px"><input type="password" name="password" id="password" onkeydown="HideError()" size="20px;" /></td>
                        </tr>

                        <tr>
                            <td style="color:#F8F8FF;">dddddddddddddddd</td>
                            <td><input type="submit" name="submit-login" value="Đăng Nhập" /></td>
                        </tr>
                        <tr>
                            <td style="color:#F8F8FF;">dddddddddddddddd</td>
                            <td style="color:red;"><a href="#" onclick="getPage('forgetPassword.php')"><i>Quên Mật Khẩu?</i></a></td>
                        </tr>
                        <tr>
                            <td style="color:#F8F8FF;">dddddddddddddddd</td>
                            <td style="color:green;">Chưa có tài khoản?<br><i> <a href="#" onclick="getPage('../User/Registation.php')">Đăng Ký</a></i></br></td>
                        </tr>

                    </tbody>
                </table>
            </form>

        </div>

        <div class="clear"></div>

        <div id="footer">
        @Nhóm 10
        </div>
    </div>
</body>

</html>