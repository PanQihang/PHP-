<?php
include 'pdolink.php';
$username = $password = $provinces = $admintype = $yzm = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["psword"]);
    $admintype = test_input($_POST["AdminType"]);
    $yzm = test_input($_POST["image"]);
    session_start();
    if($_SESSION['verifycode'] != $yzm)
    {
        echo "<script>alert('验证码错误!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }
    $pdo = connect();
    $sql = "select * from admin where username = '$username'";
    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute();
    $row = $stmt->fetch();
    if($row['username'] == NULL)
    {
        echo "<script>alert('该用户名未注册!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }
    else
    {
        if($admintype=='YWY')
        {
            if ($row['password'] == $password && $row['type'] == $admintype) {

                echo "<script>alert('业务员登录成功!');location.href='zjm.html';</script>";
            }
            else
            {
                echo "<script>alert('业务员密码错误!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
            }
        }
        else if($admintype=='JHY')
        {
            if ($row['password'] == $password && $row['type'] == $admintype)
            {

                echo "<script>alert('稽核员登录成功!');location.href='jh_zjm.html';</script>";
            }
            else
            {
                echo "<script>alert('稽核员密码错误!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
            }
        }
        else if($admintype=='CWY')
        {
            if ($row['password'] == $password && $row['type'] == $admintype)
            {

                echo "<script>alert('财务员登录成功!');location.href='GJ_zjm.html';</script>";
            }
            else
            {
                echo "<script>alert('财务员密码错误!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
            }
        }
        else if($admintype=='GLY')
        {
            if ($row['password'] == $password && $row['type'] == $admintype)
            {

                echo "<script>alert('管理员登录成功!');location.href='G_zjm.html';</script>";
            }
            else
            {
                echo "<script>alert('管理员密码错误!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data); //删除两边
    $data = stripslashes($data); //删除反斜杠
    $data = htmlspecialchars($data);
    return $data;
}
?>