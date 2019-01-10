<?php
include 'pdolink.php';
echo"<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"font-awesome-4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">";
$Wtime = $_GET["Wtime"];
$AareaID = $_GET["AareaID"];
$ProductID = $_GET["ProductID"];
$Wweboperator = $_GET["Wweboperator"];
$Wwebtype = $_GET["Wwebtype"];


$pdo = connect();
$pdo->query("SET NAMES utf8");
$row = null;
//在创建数据库链接之后，进行转码，防止从数据库读取的中文数据显示时出现乱码
if(!empty($Wtime) && !empty($AareaID) && !empty($ProductID) && !empty($Wweboperator) && !empty($Wwebtype))//全选
{
    $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND ProductID = '$ProductID' AND WoperatorID = '$Wweboperator' AND WtypeID = '$Wwebtype'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
}
else
{
    if(empty($Wtime) && !empty($AareaID) && !empty($ProductID) && !empty($Wweboperator) && !empty($Wwebtype) )
    {
        $sql  = "SELECT * FROM webincome WHERE  AareaID = '$AareaID' AND ProductID = '$ProductID' AND WoperatorID = '$Wweboperator' AND WtypeID = '$Wwebtype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($AareaID) && !empty($Wtime) && !empty($ProductID) && !empty($Wweboperator) && !empty($Wwebtype))
    {
        $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND ProductID = '$ProductID' AND WoperatorID = '$Wweboperator' AND WtypeID = '$Wwebtype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($ProductID) && !empty($Wtime) && !empty($AareaID) && !empty($Wweboperator) && !empty($Wwebtype))
    {
        $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND WoperatorID = '$Wweboperator'  AND WtypeID = '$Wwebtype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($Wweboperator) && !empty($Wtime) && !empty($AareaID) && !empty($ProductID) && !empty($Wwebtype))
    {
        $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'  AND WtypeID = '$Wwebtype'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else if(empty($Wwebtype) && !empty($Wtime) && !empty($AareaID) && !empty($ProductID) && !empty($Wweboperator))
    {
        $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'  AND WoperatorID = '$Wweboperator'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
    }
    else
    {
        if(empty($Wtime) && empty($AareaID) && !empty($ProductID) && !empty($Wwebtype) && !empty($Wweboperator))
        {
            $sql  = "SELECT * FROM webincome WHERE ProductID = '$ProductID' AND WtypeID = '$Wwebtype' AND WoperatorID = '$Wweboperator'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Wtime) && empty($ProductID) && !empty($AareaID) && !empty($Wwebtype) && !empty($Wweboperator))
        {
            $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID' AND WtypeID = '$Wwebtype' AND WoperatorID = '$Wweboperator'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Wtime) && empty($Wwebtype) && !empty($AareaID) && !empty($ProductID) && !empty($Wweboperator))
        {
            $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID' AND WoperatorID = '$Wweboperator'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Wtime) && empty($Wweboperator) &&!empty($AareaID) && !empty($Wwebtype) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID'AND WtypeID = '$Wwebtype' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($Wwebtype) && !empty($Wtime) && !empty($ProductID) && !empty($Wweboperator))
        {
            $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime'AND ProductID = '$ProductID' AND WoperatorID = '$Wweboperator'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty(ProductID) &&!empty($Wtime) && !empty($Wwebtype) && !empty($Wweboperator))
        {
            $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND WtypeID = '$Wwebtype' AND WoperatorID = '$Wweboperator'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($AareaID) && empty($Wweboperator) &&!empty($Wtime) && !empty($ProductID) && !empty($Wwebtype))
        {
            $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND ProductID = '$ProductID' AND WtypeID = '$Wwebtype'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($ProductID) && empty($Wweboperator) &&!empty($Wtime) && !empty($AareaID) && !empty($Wwebtype))
        {
            $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND WtypeID = '$Wwebtype'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($ProductID) && empty($Wwebtype) &&!empty($Wtime) && !empty($AareaID) && !empty($Wweboperator))
        {
            $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND WoperatorID = '$Wweboperator'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else if(empty($Wweboperator) && empty($Wwebtype) &&!empty($Wtime) && !empty($AareaID) && !empty($ProductID))
        {
            $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID' AND ProductID = '$ProductID'";
            $result = $pdo->query($sql);
            $row = $result->fetch();
        }
        else
        {
            if(empty($Wtime) && empty($AareaID) && empty($ProductID) && !empty($Wwebtype) && !empty($Wweboperator))
            {
                $sql  = "SELECT * FROM webincome WHERE WtypeID = '$Wwebtype' AND WoperatorID = '$Wweboperator'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($Wtime) && !empty($ProductID) && empty($AareaID) && empty($Wwebtype) && !empty($Wweboperator))
            {
                $sql  = "SELECT * FROM webincome WHERE ProductID = '$ProductID' AND WoperatorID = '$Wweboperator'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($Wtime) && !empty($Wwebtype) && empty($AareaID) && !empty($ProductID) && empty($Wweboperator))
            {
                $sql  = "SELECT * FROM webincome WHERE WtypeID = '$Wwebtype' AND ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($Wtime) && !empty($Wweboperator) &&!empty($AareaID) && empty($Wwebtype) && empty($ProductID))
            {
                $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID'AND WoperatorID = '$Wweboperator'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && !empty($Wwebtype) && empty($Wtime) && empty($ProductID) && empty($Wweboperator))
            {
                $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID'AND WtypeID = '$Wwebtype'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(!empty($AareaID) && !empty(ProductID) &&empty($Wtime) && empty($Wwebtype) && empty($Wweboperator))
            {
                $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID' AND ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($AareaID) && empty($Wweboperator) &&!empty($Wtime) && empty($ProductID) && empty($Wwebtype))
            {
                $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND WoperatorID = '$Wweboperator'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($ProductID) && empty($Wweboperator) &&!empty($Wtime) && empty($AareaID) && !empty($Wwebtype))
            {
                $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND WtypeID = '$Wwebtype'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($ProductID) && empty($Wwebtype) &&!empty($Wtime) && empty($AareaID) && empty($Wweboperator))
            {
                $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND ProductID = '$ProductID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else if(empty($Wweboperator) && empty($Wwebtype) &&!empty($Wtime) && !empty($AareaID) && empty($ProductID))
            {
                $sql  = "SELECT * FROM webincome WHERE Wtime = '$Wtime' AND AareaID = '$AareaID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
            }
            else
            {
                if(!empty($Wtime) && empty($AareaID) && empty($ProductID) && empty($Wweboperator) && empty($Wwebtype))
                {
                    $sql  = "SELECT * FROM webincome WHERE  Wtime = '$Wtime";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                }
                else if(!empty($AareaID) && empty($Wtime) && empty($ProductID) && empty($Wweboperator) && empty($Wwebtype))
                {
                    $sql  = "SELECT * FROM webincome WHERE AareaID = '$AareaID'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                }
                else if(!empty($ProductID) && empty($Wtime) && empty($AareaID) && empty($Wweboperator) && empty($Wwebtype))
                {
                    $sql  = "SELECT * FROM webincome WHERE ProductID = '$ProductID'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                }
                else if(!empty($Wweboperator) && empty($Wtime) && empty($AareaID) && empty($ProductID) && empty($Wwebtype))
                {
                    $sql  = "SELECT * FROM webincome WHERE WoperatorID = '$Wweboperator'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                }
                else if(!empty($Wwebtype) && empty($Wtime) && empty($AareaID) && empty($ProductID) && empty($Wweboperator))
                {
                    $sql  = "SELECT * FROM webincome WHERE WtypeID = '$Wwebtype'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                }
            }

        }

    }
}

if($row==null)
{
    echo "<tr>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "<td width='150' class='color-text'>无</td>";
    echo "<td width='150' class='color-text'>无</td>";
    echo "<td width='400' class='color-text'>无</td>";
    echo "<td width='100' class='color-text'>无</td>";
    echo "<td width='150' class='color-text'>无</td>";
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
        $c = $row['WoperatorID'];
        $d = $row['WtypeID'];


        $sql1 = "SELECT Aname FROM area WHERE AareaID = '$a'";
        $sql2 = "SELECT ProductName FROM product WHERE ProductID = '$b'";
        $sql3 = "SELECT WoperatorName FROM weboperator WHERE WoperatorID = '$c'";
        $sql4 = "SELECT WtypeName FROM webtype WHERE WtypeID = '$c'";

        $result1 = $pdo->query($sql1);
        $row1 = $result1->fetch();

        $result2 = $pdo->query($sql2);
        $row2 = $result2->fetch();

        $result3 = $pdo->query($sql3);
        $row3 = $result3->fetch();

        $result4 = $pdo->query($sql4);
        $row4 = $result4->fetch();

        echo "<tr>";
        echo "<td width='100' class='color-text'>{$row['WFlowID']}</td>";
        echo "<td width='150' class='color-text'>{$row['Wtime']}</td>";
        echo "<td width='150' class='color-text'>{$row1['Aname']}</td>";
        echo "<td width='400' class='color-text'>{$row2['ProductName']}</td>";
        echo "<td width='100' class='color-text'>{$row3['WoperatorName']}</td>";
        echo "<td width='150' class='color-text'>{$row4['WtypeName']}</td>";
        echo "<td width='100' class='color-text'>{$row['Wmoney']}</td>";
        echo "<td width='100' class='color-text'><a href='clearOfchangeDeal.php?WFlowID={$row['WFlowID']}'class='btn btn-block'><i class=\"fa fa fa-pencil-square-o\"></i></a></td>";
        echo "</tr>";
    }
}

?>

