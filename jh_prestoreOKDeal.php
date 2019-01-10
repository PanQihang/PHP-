<?php
include 'pdolink.php';
$PFlowID = $_GET['PFlowID'];
$Audit = $_GET['audit'];
try
{
    $sql1 = "UPDATE preincome SET Audit = '$Audit' WHERE PFlowID = '$PFlowID'";
    $pdo = connect();
    $res = $pdo->exec($sql1);
    if($res==0)
    {
        echo "<script>alert('稽核失败')</script>";
    }
    else
    {
        echo "<script>alert('稽核成功')</script>";
    }
}

catch(PDOException $e)
{
    echo $e->getMessage();
}

?>