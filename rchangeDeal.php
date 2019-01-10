<?php
include 'pdolink.php';
$RFlowID = $_POST['RFlowID'];
$Rtime = $_POST['Rtime'];
$AareaID = $_POST['city'];
$ProductID = $_POST['ProductID'];
$RtypeID = $_POST['RtypeID'];
$Rmoney = $_POST['Rmoney'];


try
{
    $sql1 = "UPDATE reportincome SET Rtime='$Rtime', AareaID='$AareaID', ProductID='$ProductID', 
 RtypeID='$RtypeID', Rmoney='$Rmoney' WHERE RFlowID = '$RFlowID'";
    $pdo = connect();
    $res = $pdo->exec($sql1);
    echo "<script>alert('修改成功');history.go(-2)</script>";
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

?>