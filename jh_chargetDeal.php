<?php
include 'pdolink.php';
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">
<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=font-awesome-4.7.0/css/font-awesome.min.css rel=\"stylesheet\" type=\"text/css\">";
$Otime = $_GET["Otime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$OtypeID = $_GET["OtypeID"];

$pdo = connect();
$pdo->query("SET NAMES utf8");
$row = null;
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码
if(!empty($Otime) && !empty($AareaID) && !empty($ProductID) && !empty($OtypeID))//全选
{
    $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime' 
AND AareaID = '$AareaID' AND ProductID = '$ProductID' AND OtypeID = '$OtypeID'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}
else
{
    if(empty($Otime) && !empty($AareaID) && !empty($ProductID) && !empty($OtypeID))
    {
        $sql  = "SELECT * FROM outincome WHERE  AareaID = '$AareaID' AND ProductID = '$ProductID' AND OtypeID = '$OtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($AareaID) && !empty($Otime) && !empty($ProductID) && !empty($OtypeID))
    {
        $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime' AND ProductID = '$ProductID' AND OtypeID = '$OtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($ProductID) && !empty($Otime) && !empty($AareaID) && !empty($OtypeID))
    {
        $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime' AND AareaID = '$AareaID' AND OtypeID = '$OtypeID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($OtypeID) && !empty($Otime) && !empty($AareaID) && !empty($ProductID))
    {
        $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else
    {
        if(empty($Otime) && empty($AareaID) && !empty($ProductID) && !empty($OtypeID))
        {
            $sql  = "SELECT * FROM outincome WHERE ProductID = '$ProductID' AND OtypeID = '$OtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Otime) && empty($ProductID) && !empty($AareaID) && !empty($OtypeID))
        {
            $sql  = "SELECT * FROM outincome WHERE AareaID = '$AareaID' AND OtypeID = '$OtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Otime) && empty($OtypeID) && !empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM outincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($ProductID) &&!empty($Otime) && !empty($OtypeID))
        {
            $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime'AND OtypeID = '$OtypeID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($OtypeID) && !empty($Otime) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime'AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($ProductID) && empty($OtypeID) &&!empty($Otime) && !empty($AareaID))
        {
            $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime' AND AareaID = '$AareaID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else
        {
            if(!empty($Otime) && empty($AareaID) && empty($ProductID) && empty($OtypeID))
            {
                $sql  = "SELECT * FROM outincome WHERE Otime = '$Otime'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && empty($Otime) && empty($ProductID) && empty($OtypeID))
            {
                $sql  = "SELECT * FROM outincome WHERE AareaID = '$AareaID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($ProductID) && empty($Otime) && empty($AareaID) && empty($OtypeID))
            {
                $sql  = "SELECT * FROM outincome WHERE ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($OtypeID) && empty($Otime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM outincome WHERE OtypeID = '$OtypeID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($OtypeID) && empty($Otime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM outincome";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
        }

    }
}

if($row==null)
{
    echo "<tr>";
    echo "<td width='150' class='color-text'>无</td>";
    echo "<td width='200' class='color-text'>无</td>";
    echo "<td width='150' class='color-text'>无</td>";
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

        if($row['Audit']==null || $row['Audit']==0 || $row['Audit']==2)
        {
            $flag = 1;
            $a = $row['AareaID'];
            $b = $row['ProductID'];
            $c = $row['OtypeID'];


            $sql1 = "SELECT Aname FROM area WHERE AareaID = '$a'";
            $sql2 = "SELECT ProductName FROM product WHERE ProductID = '$b'";
            $sql3 = "SELECT OtypeName FROM outtype WHERE OtypeID = '$c'";

            $result1 = $pdo->query($sql1);
            $row1 = $result1->fetch();

            $result2 = $pdo->query($sql2);
            $row2 = $result2->fetch();

            $result3 = $pdo->query($sql3);
            $row3 = $result3->fetch();

            echo "<tr>";
            echo "<td width='150' class='color-text'>{$row['OFlowID']}</td>";
            echo "<td width='200' class='color-text'>{$row['Otime']}</td>";
            echo "<td width='150' class='color-text'>{$row1['Aname']}</td>";
            echo "<td width='350' class='color-text'>{$row2['ProductName']}</td>";
            echo "<td width='350' class='color-text'>{$row3['OtypeName']}</td>";
            echo "<td width='100' class='color-text'>{$row['Omoney']}</td>";
            echo "<td width='100' class='color-text'><button id='{$row['OFlowID']}' name='{$row['OFlowID']}' onclick='check1({$row['OFlowID']})' value='{$row['OFlowID']}'class='btn btn-block'><i style='color: green' class=\"fa fa-check\"></i></button></td>";
            echo "<td width='100' class='color-text'><button id='{$row['OFlowID']}no' name='{$row['OFlowID']}no' onclick='check2({$row['OFlowID']})' value='{$row['OFlowID']}'class='btn btn-block'><i style='color: red' class=\"fa fa-close\"></i></button></td>";
            echo "</tr>";
        }
    }
    if($flag==0)
    {
        echo "<tr>";
        echo "<td width='150' class='color-text'>无</td>";
        echo "<td width='200' class='color-text'>无</td>";
        echo "<td width='150' class='color-text'>无</td>";
        echo "<td width='350' class='color-text'>无</td>";
        echo "<td width='350' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "<td width='100' class='color-text'>无</td>";
        echo "</tr>";
    }
}
?>

