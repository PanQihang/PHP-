<?php
include 'pdolink.php';
$PFlowID = $_POST['PFlowID'];
$Ptime = $_POST['Ptime'];
$AareaID = $_POST['city'];
$ProductID = $_POST['ProductID'];
$reporttype = $_POST['reporttype'];
$Pmoney = $_POST['Pmoney'];


try
{
    $sql1 = "UPDATE preincome SET Ptime='$Ptime', AareaID='$AareaID', ProductID='$ProductID', 
 PtypeID='$reporttype', Pmoney='$Pmoney' WHERE PFlowID = '$PFlowID'";
    $pdo = connect();
    $res = $pdo->exec($sql1);
    echo "<script>alert('修改成功');history.go(-2)</script>";
}

catch(PDOException $e)
{
    echo "<script>alert('修改失败');history.go(-1)</script>";
    echo $e->getMessage();
}

?>