<?php
include 'pdolink.php';
$RFlowID = $_GET['RFlowID'];
$Audit = $_GET['audit'];
try
{
    $sql1 = "UPDATE reportincome SET Audit = '$Audit' WHERE RFlowID = '$RFlowID'";
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