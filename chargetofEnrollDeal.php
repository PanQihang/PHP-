<?php
include 'pdolink.php';
$Otime = $_GET["Otime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$OtypeID = $_GET["OtypeID"];
$Omoney = $_GET["Omoney"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码

$OFlowID = time() + rand(0, 1000);

$sql = "INSERT INTO outincome (OFlowID, Otime, AareaID, ProductID, OtypeID, Omoney) 		
	VALUES ('$OFlowID','$Otime', '$AareaID', '$ProductID', '$OtypeID', '$Omoney')";     //插入数据SQL语句
$sql1  = "SELECT * FROM area WHERE AareaID = '$AareaID'";
$sql2  = "SELECT * FROM product WHERE ProductID = '$ProductID'";
$sql3  = "SELECT * FROM outtype WHERE OtypeID = '$OtypeID'";


$result1 = $pdo->query($sql1);
$row1 = $result1->fetch();

$result2 = $pdo->query($sql2);
$row2 = $result2->fetch();

$result3 = $pdo->query($sql3);
$row3 = $result3->fetch();
		
$pdo->query($sql);

echo "<tr>";
echo "<td width='200' class='color-text'>{$Otime}</td>";
echo "<td width='250' class='color-text'>{$row1['Aname']}</td>";
echo "<td width='450' class='color-text'>{$row2['ProductName']}</td>";
echo "<td width='450' class='color-text'>{$row3['OtypeName']}</td>";
echo "<td width='150' class='color-text'>{$Omoney}</td>";
echo "</tr>";
?>

