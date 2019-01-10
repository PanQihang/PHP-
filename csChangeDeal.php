<?php
include 'pdolink.php';
$CFlowID = $_POST['CFlowID'];
$Ctime = $_POST['Ctime'];
$AareaID = $_POST['city'];
$ProductID = $_POST['ProductID'];
$Cnumber = $_POST['Cnumber'];
if($ProductID == "320113")
    $Cmoney = $Cnumber*200;
else if($ProductID == "320114")
    $Cmoney = $Cnumber*300;

try
{
    $sql1 = "UPDATE cardincome SET Ctime='$Ctime', AareaID='$AareaID', ProductID='$ProductID', 
 Ccardnumber='$Cnumber', Cmoney='$Cmoney' WHERE CFlowID = '$CFlowID'";
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