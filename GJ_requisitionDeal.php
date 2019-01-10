<?php
include 'pdolink.php';
echo"<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"font-awesome-4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">";
$Rtime = $_GET["Rtime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$reporttype = $_GET["reporttype"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
$row = null;
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码
if(!empty($Rtime) && !empty($AareaID) && !empty($ProductID) && !empty($reporttype))//全选
{
    $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' 
AND AareaID = '$AareaID' AND ProductID = '$ProductID' AND RtypeID = '$reporttype'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}
else
{
    if(empty($Rtime) && !empty($AareaID) && !empty($ProductID) && !empty($reporttype))
    {
        $sql  = "SELECT * FROM reportincome WHERE  AareaID = '$AareaID' AND ProductID = '$ProductID' AND RtypeID = '$reporttype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($AareaID) && !empty($Rtime) && !empty($ProductID) && !empty($reporttype))
    {
        $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND ProductID = '$ProductID' AND RtypeID = '$reporttype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($ProductID) && !empty($Rtime) && !empty($AareaID) && !empty($reporttype))
    {
        $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND AareaID = '$AareaID' AND RtypeID = '$reporttype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($reporttype) && !empty($Rtime) && !empty($AareaID) && !empty($ProductID))
    {
        $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else
    {
        if(empty($Rtime) && empty($AareaID) && !empty($ProductID) && !empty($reporttype))
        {
            $sql  = "SELECT * FROM reportincome WHERE ProductID = '$ProductID' AND  RtypeID = '$reporttype'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Rtime) && empty($ProductID) && !empty($AareaID) && !empty($reporttype))
        {
            $sql  = "SELECT * FROM reportincome WHERE AareaID = '$AareaID' AND RtypeID = '$reporttype'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Rtime) && empty($reporttype) && !empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM reportincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($ProductID) &&!empty($Rtime) && !empty($reporttype))
        {
            $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime'AND RtypeID = '$reporttype'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($reporttype) && !empty($Rtime) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime'AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($ProductID) && empty($reporttype) &&!empty($Rtime) && !empty($AareaID))
        {
            $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime' AND AareaID = '$AareaID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else
        {
            if(!empty($Rtime) && empty($AareaID) && empty($ProductID) && empty($reporttype))
            {
                $sql  = "SELECT * FROM reportincome WHERE Rtime = '$Rtime'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && empty($Rtime) && empty($ProductID) && empty($reporttype))
            {
                $sql  = "SELECT * FROM reportincome WHERE AareaID = '$AareaID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($ProductID) && empty($Rtime) && empty($AareaID) && empty($reporttype))
            {
                $sql  = "SELECT * FROM reportincome WHERE ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($reporttype) && empty($Rtime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM reportincome WHERE RtypeID = '$reporttype'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($reporttype) && empty($Rtime) && empty($AareaID) && empty($ProductID))
            {
                $row = null;
            }
        }

    }
}

if($row==null)
{
    echo "<tr>";
    echo "<td width='150'>无</td>";
    echo "<td width='150'>无</td>";
    echo "<td width='200'>无</td>";
    echo "<td width='450'>无</td>";
    echo "<td width='450'>无</td>";
    echo "<td width='100'>无</td>";
    echo "</tr>";
}
else
{
    $flag=0;
    foreach ($pdo->query($sql) as $row)
    {
        if($row['Audit']==1)
        {
            $flag = 1;
            $a = $row['AareaID'];
            $b = $row['ProductID'];
            $c = $row['RtypeID'];


            $sql1 = "SELECT Aname FROM area WHERE AareaID = '$a'";
            $sql2 = "SELECT ProductName FROM product WHERE ProductID = '$b'";
            $sql3 = "SELECT RtypeName FROM reporttype WHERE RtypeID = '$c'";

            $result1 = $pdo->query($sql1);
            $row1 = $result1->fetch();

            $result2 = $pdo->query($sql2);
            $row2 = $result2->fetch();

            $result3 = $pdo->query($sql3);
            $row3 = $result3->fetch();

            echo "<tr>";
            echo "<td width='150' class='color-text'>{$row['RFlowID']}</td>";
            echo "<td width='150' class='color-text'>{$row['Rtime']}</td>";
            echo "<td width='200' class='color-text'>{$row1['Aname']}</td>";
            echo "<td width='450' class='color-text'>{$row2['ProductName']}</td>";
            echo "<td width='450' class='color-text'>{$row3['RtypeName']}</td>";
            echo "<td width='100' class='color-text'>{$row['Rmoney']}</td>";
            echo "</tr>";
        }
    }
    if($flag==0)
    {
        echo "<tr>";
        echo "<td width='150' class='color-text'>无</td>";
        echo "<td width='150' class='color-text'>无</td>";
        echo "<td width='200' class='color-text'>无</td>";
        echo "<td width='450' class='color-text'>无</td>";
        echo "<td width='450' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "</tr>";
    }
}

?>

