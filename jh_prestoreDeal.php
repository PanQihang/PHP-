<?php
include 'pdolink.php';
echo"<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"font-awesome-4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">";
$Ptime = $_GET["Ptime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$PtypeID = $_GET["PtypeID"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
$row = null;
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码
if(!empty($Ptime) && !empty($AareaID) && !empty($ProductID) && !empty($PtypeID))//全选
{
    $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime' 
AND AareaID = '$AareaID' AND ProductID = '$ProductID' AND PtypeID = '$PtypeID'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}
else
{
    if(empty($Ptime) && !empty($AareaID) && !empty($ProductID) && !empty($PtypeID))
    {
        $sql  = "SELECT * FROM preincome WHERE  AareaID = '$AareaID' AND ProductID = '$ProductID' AND PtypeID = '$PtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($AareaID) && !empty($Ptime) && !empty($ProductID) && !empty($PtypeID))
    {
        $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime' AND ProductID = '$ProductID' AND PtypeID = '$PtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($ProductID) && !empty($Ptime) && !empty($AareaID) && !empty($PtypeID))
    {
        $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime' AND AareaID = '$AareaID' AND PtypeID = '$PtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($PtypeID) && !empty($Ptime) && !empty($AareaID) && !empty($ProductID))
    {
        $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else
    {
        if(empty($Ptime) && empty($AareaID) && !empty($ProductID) && !empty($PtypeID))
        {
            $sql  = "SELECT * FROM preincome WHERE ProductID = '$ProductID' AND PtypeID = '$PtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Ptime) && empty($ProductID) && !empty($AareaID) && !empty($PtypeID))
        {
            $sql  = "SELECT * FROM preincome WHERE AareaID = '$AareaID' AND PtypeID = '$PtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Ptime) && empty($PtypeID) && !empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM preincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($ProductID) &&!empty($Ptime) && !empty($PtypeID))
        {
            $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime'AND PtypeID = '$PtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($PtypeID) && !empty($Ptime) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime'AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($ProductID) && empty($PtypeID) &&!empty($Ptime) && !empty($AareaID))
        {
            $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime' AND AareaID = '$AareaID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else
        {
            if(!empty($Ptime) && empty($AareaID) && empty($ProductID) && empty($PtypeID))
            {
                $sql  = "SELECT * FROM preincome WHERE Ptime = '$Ptime'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && empty($Ptime) && empty($ProductID) && empty($PtypeID))
            {
                $sql  = "SELECT * FROM preincome WHERE AareaID = '$AareaID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($ProductID) && empty($Ptime) && empty($AareaID) && empty($PtypeID))
            {
                $sql  = "SELECT * FROM preincome WHERE ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($PtypeID) && empty($Ptime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM preincome WHERE PtypeID = '$PtypeID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($PtypeID) && empty($Ptime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM preincome";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
        }
    }
}

if($row==null)
{
    echo "<tr>";
    echo "<td width='150'class='color-text'>无</td>";
    echo "<td width='150' class='color-text'>无</td>";
    echo "<td width='200' class='color-text'>无</td>";
    echo "<td width='350' class='color-text'>无</td>";
    echo "<td width='350' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "</tr>";
}
else
{
    $flag = 0;
    foreach ($pdo->query($sql) as $row)
    {
        if($row['Audit']==null  || $row['Audit']==0 || $row['Audit']==2)
        {
            $flag = 1;
            $a = $row['AareaID'];
            $b = $row['ProductID'];
            $c = $row['PtypeID'];


            $sql1 = "SELECT Aname FROM area WHERE AareaID = '$a'";
            $sql2 = "SELECT ProductName FROM product WHERE ProductID = '$b'";
            $sql3 = "SELECT PtypeName FROM pretype WHERE PtypeID = '$c'";

            $result1 = $pdo->query($sql1);
            $row1 = $result1->fetch();

            $result2 = $pdo->query($sql2);
            $row2 = $result2->fetch();

            $result3 = $pdo->query($sql3);
            $row3 = $result3->fetch();

            echo "<tr>";
            echo "<td width='150' class='color-text'>{$row['PFlowID']}</td>";
            echo "<td width='150' class='color-text'>{$row['Ptime']}</td>";
            echo "<td width='200' class='color-text'>{$row1['Aname']}</td>";
            echo "<td width='350' class='color-text'>{$row2['ProductName']}</td>";
            echo "<td width='350' class='color-text'>{$row3['PtypeName']}</td>";
            echo "<td width='100' class='color-text'>{$row['Pmoney']}</td>";
            echo "<td width='100' class='color-text'><button id='{$row['PFlowID']}' name='{$row['PFlowID']}' onclick='check1({$row['PFlowID']})' value='{$row['PFlowID']}'class='btn btn-block'><i style='color: green' class=\"fa fa-check\"></i></button></td>";
            echo "<td width='100' class='color-text'><button id='{$row['PFlowID']}no' name='{$row['PFlowID']}no' onclick='check2({$row['PFlowID']})' value='{$row['PFlowID']}'class='btn btn-block'><i style='color: red' class=\"fa fa-close\"></i></button></td>";
            echo "</tr>";
        }
    }
    if($flag==0)
    {
        echo "<tr>";
        echo "<td width='150' class='color-text'>无</td>";
        echo "<td width='150' class='color-text'>无</td>";
        echo "<td width='200' class='color-text'>无</td>";
        echo "<td width='350' class='color-text'>无</td>";
        echo "<td width='350' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "</tr>";
    }
}

?>

