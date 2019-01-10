<?php
include 'pdolink.php';
$OFlowID = $_POST['OFlowID'];
$Otime = $_POST['Otime'];
$AareaID = $_POST['city'];
$ProductID = $_POST['ProductID'];
$OtypeID = $_POST['OtypeID'];
$Omoney = $_POST['Omoney'];


try
{
    $sql1 = "UPDATE outincome SET Otime='$Otime', AareaID='$AareaID', ProductID='$ProductID', 
 OtypeID='$OtypeID', Omoney='$Omoney' WHERE OFlowID = '$OFlowID'";
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