<?php
include 'pdolink.php';
$WFlowID = $_GET['WFlowID'];

$pdo = connect();

$sql = "delete FROM webincome WHERE WFlowID = '$WFlowID'";

$res = $pdo->exec($sql);

if($res!=0)
{
    echo "<script>alert('删除成功');history.go(-1)</script>";
}
else
{
    echo "<script>alert('修改失败');history.go(-1)</script>";
}
?>