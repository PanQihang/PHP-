<?php
include 'pdolink.php';
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">
<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"font-awesome-4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">";
$Ctime = $_GET["Ctime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$Cnumber = $_GET["Cnumber"];
$pdo = connect();
$pdo->query("SET NAMES utf8");
$row = null;
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码
if(!empty($Ctime) && !empty($AareaID) && !empty($ProductID) && !empty($Cnumber))//全选
{
    $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' 
AND AareaID = '$AareaID' AND ProductID = '$ProductID' AND Ccardnumber = '$Cnumber'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}
else
{
    if(empty($Ctime) && !empty($AareaID) && !empty($ProductID) && !empty($Cnumber))
    {
        $sql  = "SELECT * FROM cardincome WHERE  AareaID = '$AareaID' 
AND ProductID = '$ProductID' AND Ccardnumber = '$Cnumber'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($AareaID) && !empty($Ctime) && !empty($ProductID) && !empty($Cnumber))
    {
        $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' 
AND ProductID = '$ProductID' AND Ccardnumber = '$Cnumber'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($ProductID) && !empty($Ctime) && !empty($AareaID) && !empty($Cnumber))
    {
        $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' 
AND AareaID = '$AareaID' AND Ccardnumber = '$Cnumber'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(!empty($ProductID) && !empty($Ctime) && !empty($AareaID) && empty($Cnumber))
    {
        $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' AND AareaID = '$AareaID' 
AND ProductID = '$ProductID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else
    {
        if(empty($Ctime) && empty($AareaID) && !empty($ProductID) && !empty($Cnumber))
        {
            $sql  = "SELECT * FROM cardincome WHERE ProductID = '$ProductID' 
AND Ccardnumber = '$Cnumber'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Ctime) && empty($ProductID) && !empty($AareaID) && !empty($Cnumber))
        {
            $sql  = "SELECT * FROM cardincome WHERE AareaID = '$AareaID' AND Ccardnumber = '$Cnumber'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }

        else if(empty($Ctime) && empty($Cnumber) && !empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM cardincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(!empty($Ctime) && !empty($Cnumber) && empty($AareaID) && empty($ProductID))
        {
            $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' 
AND Ccardnumber = '$Cnumber'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(!empty($Ctime) && empty($Cnumber) && empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' 
AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(!empty($Ctime) && empty($Cnumber) && !empty($AareaID) && empty($ProductID))
        {
            $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime' 
AND AareaID = '$AareaID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else
        {
            if(!empty($Ctime) && empty($AareaID) && empty($ProductID) && empty($Cnumber))
            {
                $sql  = "SELECT * FROM cardincome WHERE Ctime = '$Ctime'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && empty($Ctime) && empty($ProductID) && empty($Cnumber))
            {
                $sql  = "SELECT * FROM cardincome WHERE AareaID = '$AareaID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($ProductID) && empty($Ctime) && empty($AareaID) && empty($Cnumber))
            {
                $sql  = "SELECT * FROM cardincome WHERE ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($Cnumber) && empty($Ctime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM cardincome WHERE Ccardnumber = '$Cnumber'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($Cnumber) && empty($Ctime) && empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM cardincome";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
        }

    }
}

if($row==null)
{
    echo "<tr>";
    echo "<td width='200' class='color-text'>无</td>";
    echo "<td width='200' class='color-text'>无</td>";
    echo "<td width='200' class='color-text'>无</td>";
    echo "<td width='450' class='color-text'>无</td>";
    echo "<td width='150' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "</tr>";
}
else
{
    foreach ($pdo->query($sql) as $row)
    {
        $a = $row['AareaID'];
        $b = $row['ProductID'];

        $sql1 = "SELECT Aname FROM area WHERE AareaID = '$a'";
        $sql2 = "SELECT ProductName FROM product WHERE ProductID = '$b'";


        $result1 = $pdo->query($sql1);
        $row1 = $result1->fetch();

        $result2 = $pdo->query($sql2);
        $row2 = $result2->fetch();

        if($row['Audit']==1)
        {
            echo "<tr >";
            echo "<td width='200' class='color-text' style='color: #00FF00'>{$row['CFlowID']}</td>";
            echo "<td width='200' class='color-text' style='color: #00FF00'>{$row['Ctime']}</td>";
            echo "<td width='200' class='color-text' style='color: #00FF00'>{$row1['Aname']}</td>";
            echo "<td width='450' class='color-text' style='color: #00FF00'>{$row2['ProductName']}</td>";
            echo "<td width='150' class='color-text' style='color: #00FF00'>{$row['Ccardnumber']}</td>";
            echo "<td width='100' class='color-text' style='color: #00FF00'>{$row['Cmoney']}</td>";
            echo "<td width='100' class='color-text' style=' color: #00FF00;'>已稽核</td>";
            echo "<td width='100' class='color-text' style=' color: #00FF00;'>已稽核</td>";
            echo "</tr>";
        }
        else if($row['Audit']==2)
        {
            echo "<tr >";
            echo "<td width='200' class='color-text' style='color: red'>{$row['CFlowID']}</td>";
            echo "<td width='200' class='color-text' style='color: red'>{$row['Ctime']}</td>";
            echo "<td width='200' class='color-text' style='color: red'>{$row1['Aname']}</td>";
            echo "<td width='450' class='color-text' style='color: red'>{$row2['ProductName']}</td>";
            echo "<td width='150' class='color-text' style='color: red'>{$row['Ccardnumber']}</td>";
            echo "<td width='100' class='color-text' style='color: red'>{$row['Cmoney']}</td>";
            echo "<td width='100' class='color-text'><a href='cardSellChangeDeal2.php?CFlowID={$row['CFlowID']}'class='btn btn-block'><i class=\"fa fa-pencil-square-o\"></i></a></td>";
            echo "<td width='100' class='color-text'><a href='cardSellDeleteDeal2.php?CFlowID={$row['CFlowID']}'class='btn btn-block '><i class=\"fa fa-trash\"></i></a></td>";
            echo "</tr>";
        }
        else
        {
            echo "<tr >";
            echo "<td width='200' class='color-text'>{$row['CFlowID']}</td>";
            echo "<td width='200' class='color-text'>{$row['Ctime']}</td>";
            echo "<td width='200' class='color-text'>{$row1['Aname']}</td>";
            echo "<td width='450' class='color-text'>{$row2['ProductName']}</td>";
            echo "<td width='150' class='color-text'>{$row['Ccardnumber']}</td>";
            echo "<td width='100' class='color-text'>{$row['Cmoney']}</td>";
            echo "<td width='100' class='color-text'><a href='cardSellChangeDeal2.php?CFlowID={$row['CFlowID']}'class='btn btn-block'><i class=\"fa fa-pencil-square-o\"></i></a></td>";
            echo "<td width='100' class='color-text'><a href='cardSellDeleteDeal2.php?CFlowID={$row['CFlowID']}'class='btn btn-block '><i class=\"fa fa-trash\"></i></a></td>";
            echo "</tr>";
        }
    }
}

?>

