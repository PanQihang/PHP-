


<?php

include 'pdolink.php';

header('Content-type: text/html; charset=GB2312');
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=test.xls");

$pdo = connect();
$pdo->query("SET NAMES GB2312");  //在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码

$row = null;

$sql = "SELECT PFlowID,Ptime,Aname,ProductName,	PtypeName,Pmoney FROM preincome,area,product,pretype
WHERE Audit = '1' AND preincome.AareaID=area.AareaID AND preincome.ProductID=product.ProductID AND preincome.PtypeID=pretype.PtypeID ";
$result = $pdo->query($sql);
$row = $result->fetch();


if($row != null)
{
    $str = "流水号\t时间\t城市名\t产品名称\t销账类型名称\t金额\n";
    echo iconv("UTF-8","gbk//TRANSLIT",$str);
    foreach ($pdo->query($sql) as $row)
    {
        echo $row[0]."\t".$row[1]."\t".$row[2]."\t".$row[3]."\t".$row[4]."\t".$row[5]."\t\n";
    }
}

?>

