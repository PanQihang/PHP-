<?php
include 'pdolink.php';
echo"<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"font-awesome-4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">";
$Rtime = $_GET["Rtime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$RtypeID = $_GET["RtypeID"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码
$row = null;
if(!empty($Rtime) && !empty($AareaID) && !empty($ProductID) && !empty($RtypeID))//全选
{
    $sql  = "SELECT * FROM reportincome WHERE Otime = '$Rtime' 
AND AareaID = '$AareaID' AND ProductID = '$ProductID' AND RtypeID = '$RtypeID'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}
else
{
    if(empty($Rtime) && !empty($AareaID) && !empty($ProductID) && !empty($RtypeID))
    {
        $sql  = "SELECT * FROM reportincome WHERE  AareaID = '$AareaID' AND ProductID = '$ProductID' AND RtypeID = '$RtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($AareaID) && !empty($Rtime) && !empty($ProductID) && !empty($RtypeID))
    {
        $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND ProductID = '$ProductID' AND OtypeID = '$RtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($ProductID) && !empty($Rtime) && !empty($AareaID) && !empty($RtypeID))
    {
        $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND AareaID = '$AareaID' AND RtypeID = '$RtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($RtypeID) && !empty($Rtime) && !empty($AareaID) && !empty($ProductID))
    {
        $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else
    {
        if(empty($Rtime) && empty($AareaID) && !empty($ProductID) && !empty($RtypeID))
        {
            $sql  = "SELECT * FROM reportincome WHERE ProductID = '$ProductID' AND RtypeID = '$RtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Rtime) && empty($ProductID) && !empty($AareaID) && !empty($RtypeID))
        {
            $sql  = "SELECT * FROM reportincome WHERE AareaID = '$AareaID' AND RtypeID = '$RtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Rtime) && empty($RtypeID) && !empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM reportincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($ProductID) &&!empty($Rtime) && !empty($RtypeID))
        {
            $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime'AND RtypeID = '$RtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($RtypeID) && !empty($Rtime) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime'AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($ProductID) && empty($RtypeID) &&!empty($Rtime) && !empty($AareaID))
        {
            $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND AareaID = '$AareaID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else
        {
            if(!empty($Rtime) && empty($AareaID) && empty($ProductID) && empty($RtypeID))
            {
                $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && empty($Rtime) && empty($ProductID) && empty($RtypeID))
            {
                $sql  = "SELECT * FROM reportincome WHERE AareaID = '$AareaID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($ProductID) && empty($Rtime) && empty($AareaID) && empty($RtypeID))
            {
                $sql  = "SELECT * FROM reportincome WHERE ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($RtypeID) && empty($Rtime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM reportincome WHERE RtypeID = '$RtypeID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($RtypeID) && empty($Rtime) && empty($AareaID) && empty($ProductID))
            {
                $row = null;
            }
        }

    }
}

if($row==null)
{
    echo "<tr>";
    echo "<td width='100'>无</td>";
    echo "<td width='150'>无</td>";
    echo "<td width='150'>无</td>";
    echo "<td width='350'>无</td>";
    echo "<td width='350'>无</td>";
    echo "<td width='100'>无</td>";
    echo "<td width='100'>无</td>";
    echo "</tr>";
}
else
{
    foreach ($pdo->query($sql) as $row)
    {
        $a = $row['AareaID'];
        $b = $row['ProductID'];
        $c = $row['RtypeID'];


        $sql1 = "SELECT Aname FROM area WHERE AareaID = '$a'";
        $sql2 = "SELECT ProductName FROM product WHERE ProductID = '$b'";
        $sql3 = "SELECT RtypeName  FROM reporttype WHERE RtypeID = '$c'";

        $result1 = $pdo->query($sql1);
        $row1 = $result1->fetch();

        $result2 = $pdo->query($sql2);
        $row2 = $result2->fetch();

        $result3 = $pdo->query($sql3);
        $row3 = $result3->fetch();

        echo "<tr>";
        echo "<td width='100' class='color-text'>{$row['RFlowID']}</td>";
        echo "<td width='150'class='color-text'>{$row['Rtime']}</td>";
        echo "<td width='150'class='color-text'>{$row1['Aname']}</td>";
        echo "<td width='350'class='color-text'>{$row2['ProductName']}</td>";
        echo "<td width='350'class='color-text'>{$row3['RtypeName']}</td>";
        echo "<td width='100'class='color-text'>{$row['Rmoney']}</td>";
        echo "<td width='100'><a href='requisitionofChangeDeal.php?RFlowID={$row['RFlowID']}' class='btn btn-block'><i class=\"fa fa fa-pencil-square-o\"></i></a></td>";
        echo "</tr>";
    }
}

?>

