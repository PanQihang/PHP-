<?php
include 'pdolink.php';
$Ctime = $_GET["Ctime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$Cnumber = $_GET["Cnumber"];
$Cmoney = $_GET["Cmoney"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码


$CFlowID = time() + rand(0, 1000);

$sql = "INSERT INTO cardincome (CFlowID, Ctime, AareaID, ProductID,Ccardnumber,Cmoney) 		
	VALUES ('$CFlowID','$Ctime', '$AareaID', '$ProductID', '$Cnumber', '$Cmoney')";     //插入数据SQL语句
$sql1  = "SELECT * FROM area WHERE AareaID = '$AareaID'";
$sql2  = "SELECT * FROM product WHERE ProductID = '$ProductID'";


$result1 = $pdo->query($sql1);
$row1 = $result1->fetch();

$result2 = $pdo->query($sql2);
$row2 = $result2->fetch();

$pdo->query($sql);

echo "<tr>";
echo "<td width ='250' class='color-text'>{$Ctime}</td>";
echo "<td width ='250' class='color-text'>{$row1['Aname']}</td>";
echo "<td width ='450' class='color-text'>{$row2['ProductName']}</td>";
echo "<td width='400' class='color-text'>{$Cnumber}</td>";
echo "<td width='150' class='color-text'>{$Cmoney}</td>";
echo "</tr>";
?>

