<?php
include 'pdolink.php';
$OFlowID = $_GET['OFlowID'];

$pdo = connect();

$sql = "delete FROM outincome WHERE OFlowID = '$OFlowID'";

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