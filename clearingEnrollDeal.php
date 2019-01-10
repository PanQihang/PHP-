<?php
include 'pdolink.php';
$Wtime = $_GET["Wtime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$Wweboperator = $_GET["Wweboperator"];
$Wmoney = $_GET["Wmoney"];
$Wwebtype = $_GET["Wwebtype"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码


$WFlowID = time() + rand(0, 1000);

$sql = "INSERT INTO webincome (WFlowID,Wtime,AareaID,ProductID,WoperatorID,WtypeID,Wmoney) 		
	VALUES ('$WFlowID','$Wtime', '$AareaID', '$ProductID', '$Wweboperator', '$Wwebtype','$Wmoney')";     //插入数据SQL语句

$sql1  = "SELECT * FROM area WHERE AareaID = '$AareaID'";
$sql2  = "SELECT * FROM product WHERE ProductID = '$ProductID'";
$sql3  = "SELECT * FROM weboperator WHERE WoperatorID = '$Wweboperator'";
$sql4  = "SELECT * FROM webtype WHERE WtypeID = '$Wwebtype'";

$result1 = $pdo->query($sql1);
$row1 = $result1->fetch();

$result2 = $pdo->query($sql2);
$row2 = $result2->fetch();

$result3 = $pdo->query($sql3);
$row3 = $result3->fetch();

$result4 = $pdo->query($sql4);
$row4 = $result4->fetch();

$pdo->query($sql);

echo "<tr>";
echo "<td width='200' class=\" color-text\">{$Wtime}</td>";
echo "<td width='200' class=\" color-text\">{$row1['Aname']}</td>";
echo "<td width='450' class=\" color-text\">{$row2['ProductName']}</td>";
echo "<td width='200' class=\" color-text\">{$row3['WoperatorName']}</td>";
echo "<td width='250' class=\" color-text\">{$row4['WtypeName']}</td>";
echo "<td width='200' class=\" color-text\">{$Wmoney}</td>";
echo "</tr>"
?>

