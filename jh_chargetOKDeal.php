<?php
include 'pdolink.php';
$OFlowID = $_GET['OFlowID'];
$Audit = $_GET['audit'];
try
{
    $sql1 = "UPDATE outincome SET Audit = '$Audit' WHERE OFlowID = '$OFlowID'";
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