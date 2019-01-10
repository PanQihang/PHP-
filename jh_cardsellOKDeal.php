<?php
include 'pdolink.php';
$CFlowID = $_GET['CFlowID'];
$Audit = $_GET['audit'];
try
{
    $sql1 = "UPDATE cardincome SET Audit = '$Audit' WHERE CFlowID = '$CFlowID'";
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