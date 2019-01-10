<?php
include 'pdolink.php';
$WFlowID = $_POST['WFlowID'];
$Wtime = $_POST['Wtime'];
$AareaID = $_POST['city'];
$ProductID = $_POST['ProductID'];
$WoperatorID = $_POST['WoperatorID'];
$WtypeID = $_POST['WtypeID'];
$Wmoney = $_POST['Wmoney'];


try
{
    $sql1 = "UPDATE webincome SET Wtime='$Wtime', AareaID='$AareaID', ProductID='$ProductID',  WoperatorID='$WoperatorID',
 WtypeID='$WtypeID', Wmoney='$Wmoney' WHERE WFlowID = '$WFlowID'";
    $pdo = connect();
    $res = $pdo->exec($sql1);
    echo "<script>alert('修改成功');history.go(-2)</script>";
}

catch(PDOException $e)
{
    echo $e->getMessage();
}

?>