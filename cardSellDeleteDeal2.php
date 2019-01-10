<?php
include 'pdolink.php';
$CFlowID = $_GET['CFlowID'];
$pdo = connect();

$sql = "delete FROM cardincome WHERE CFlowID = '$CFlowID'";

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
