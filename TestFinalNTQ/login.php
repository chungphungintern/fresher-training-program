<?php
session_start();

try {
    $conn = new PDO("mysql:host=localhost;dbname=fresher_user", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("set names utf8");
} catch (PDOException $e) {
    print "Lỗi kết nối cơ sở dữ liệu" . $e->getMessage();
    exit;
}
if (isset($_POST['submit'])) {
    $sql = "select * from user";
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $result = $cmd->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $value) {
        if ($_POST['username'] == "" || $_POST['password'] == "") {
            $error_message = "<div class='alert alert-danger role='alert'>Vui lòng nhập đầy đủ tài khoản và mật khẩu!</div>";
        } elseif ($_POST['username'] == $value->username) {
            if (MD5($_POST['password']) == $value->pass) {
                $_SESSION['login'] = "Success";
                $_SESSION['name'] = $value->username;
                $_SESSION['id'] = $value->user_id;
                header("location:index.php");
            } else
                $error_message = "<div class='alert alert-danger role='alert'>Bạn đã nhập sai mật khẩu!</div>";
        }  else
            $error_message = "<div class='alert alert-danger role='alert'>Tài khoản không tồn tại!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>NTQ Solution Admin Control Panel</title>

    <link rel="icon" type="image/ico" href="templates/favicon.ico"/>

    <link href="templates/css/stylesheets.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="loginBox">
    <div class="loginHead">
        <img src="templates/img/logo.png" alt="NTQ Solution Admin Control Panel"
             title="NTQ Solution Admin Control Panel"/>
    </div>
    <form class="form-horizontal" action="" method="POST">
        <span><?php echo isset($error_message) ? $error_message : '' ?></span>
        <div class="control-group">
            <label for="inputUsername">Username</label>
            <input type="text" id="inputUsername" name="username"
                   value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
        </div>
        <div class="control-group">
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" name="password"
                   value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
        </div>
        <div class="control-group" style="margin-bottom: 5px;">
            <label class="checkbox"><input type="checkbox"> Remember me</label>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-block" name="submit">Sign in</button>
        </div>
    </form>

</div>

</body>
</html>
