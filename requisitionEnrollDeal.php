<?php
include 'pdolink.php';
$Rtime = $_GET["Rtime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$reporttype = $_GET["reporttype"];
$Rmoney = $_GET["Rmoney"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码

$RFlowID = time() + rand(0, 1000);

$sql = "INSERT INTO reportincome (RFlowID, Rtime, AareaID, ProductID, RtypeID, Rmoney) 		
	VALUES ('$RFlowID','$Rtime', '$AareaID', '$ProductID', '$reporttype', '$Rmoney')";     //插入数据SQL语句
$sql1  = "SELECT * FROM area WHERE AareaID = '$AareaID'";
$sql2  = "SELECT * FROM product WHERE ProductID = '$ProductID'";
$sql3  = "SELECT * FROM reporttype WHERE RtypeID = '$reporttype'";


$result1 = $pdo->query($sql1);
$row1 = $result1->fetch();

$result2 = $pdo->query($sql2);
$row2 = $result2->fetch();

$result3 = $pdo->query($sql3);
$row3 = $result3->fetch();

$pdo->query($sql);

echo "<tr>";
echo "<td width='200' class='color-text'>{$Rtime}</td>";
echo "<td width='200' class='color-text'>{$row1['Aname']}</td>";
echo "<td width='450' class='color-text'>{$row2['ProductName']}</td>";
echo "<td width='450' class='color-text'>{$row3['RtypeName']}</td>";
echo "<td width='200' class='color-text'>{$Rmoney}</td>";
echo "</tr>";
?>



