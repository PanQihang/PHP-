<?php
include 'pdolink.php';
$CFlowID = $_GET['CFlowID'];

$pdo = connect();

$sql = "SELECT * FROM cardincome WHERE CFlowID = '$CFlowID'";

$result = $pdo->query($sql);
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>卡销售业务修改页面</title>
    <link rel="stylesheet" type="text/css" href="chargetofEnroll.css">
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href=font-awesome-4.7.0/css/font-awesome.min.css rel="stylesheet" type="text/css">
</head>
<body style="background: linear-gradient(white,#87CEFA); height: 750px">
<div style=" position: relative; top: 50px; left: 600px; text-align: left" >
    <div >
<form action="csChangeDeal.php" method="post">
    <p style="font-size:20px; font-weight:bold;"> &nbsp;&nbsp;流水号:
        <input name="CFlowID" type="text"  readonly="true" class="smallInput" value="<?php echo $CFlowID?>"></p><br/>
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 日期:
        <input name="Ctime" type="date" class="smallInput" value="<?php echo $row['Ctime']?>"></p><br/>
    <p style="font-size:20px; font-weight:bold;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  城市:<select id="city" name="city" class="smallInput" ><br/>
        <?php
        $bb = $jdz = $nc = $ja = $gz = $xy = $yt = $jj = $yc = $sr = $px =$fz = "";
        if($row['AareaID']=='000')
        {
            $bb = 'selected';
        }
        else if($row['AareaID']=='740')
        {
            $jdz = 'selected';
        }
        else if($row['AareaID']=='750')
        {
            $nc = 'selected';
        }
        else if($row['AareaID']=='751')
        {
            $ja = 'selected';
        }
        else if($row['AareaID']=='752')
        {
            $gz = 'selected';
        }
        else if($row['AareaID']=='753')
        {
            $xy = 'selected';
        }
        else if($row['AareaID']=='754')
        {
            $yt = 'selected';
        }
        else if($row['AareaID']=='755')
        {
            $jj = 'selected';
        }
        else if($row['AareaID']=='756')
        {
            $yc = 'selected';
        }
        else if($row['AareaID']=='757')
        {
            $sr = 'selected';
        }
        else if($row['AareaID']=='758')
        {
            $px = 'selected';
        }
        else if($row['AareaID']=='759')
        {
            $fz = 'selected';
        }
        echo "<option value='000' $bb>江西本部</option>";
        echo "<option value='740' $jdz>江西景德镇</option>";
        echo "<option value='750' $nc>江西南昌</option>";
        echo "<option value='751' $ja>江西吉安</option>";
        echo "<option value='752' $gz>江西赣州</option>";
        echo "<option value='753' $xy>江西新余</option>";
        echo "<option value='754' $yt>江西鹰潭</option>";
        echo "<option value='755' $jj>江西九江</option>";
        echo "<option value='756' $yc>江西宜春</option>";
        echo "<option value='757' $sr>江西上饶</option>";
        echo "<option value='758' $px>江西萍乡</option>";
        echo "<option value='759' $fz>江西抚州</option>";
        ?>
    </select><br/><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;产品:
    <select name="ProductID" class="smallInput">
        <?php
        $p1=$p2=$p3=$p4=$p5=$p6=$p7=$p8="";
        if($row['ProductID']=='320113')
        {
            $p4 = 'selected';
        }
        else if($row['ProductID']=='320114')
        {
            $p5 = 'selected';
        }
        echo "<option value='320113' $p4>卡类-IP卡-省内IP电话卡-200卡</option>";
        echo "<option value='320114' $p5>卡类-IP卡-省内IP电话卡-300卡</option>";
        ?>
    </select><br/>
    <p style="font-size:20px; font-weight:bold">销售数量:
    <input id="Cnumber" type="text" name="Cnumber" class="smallInput" value="<?php echo $row['Ccardnumber']?>"><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="提交">
</form>
</div>
</div>
</body>
</html>