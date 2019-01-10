<?php
include 'pdolink.php';
$PFlowID = $_GET['PFlowID'];

$pdo = connect();

$sql = "SELECT * FROM preincome WHERE PFlowID = '$PFlowID'";

$result = $pdo->query($sql);
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="chargetofEnroll.css">
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href=font-awesome-4.7.0/css/font-awesome.min.css rel="stylesheet" type="text/css">
</head>
<body style="background: linear-gradient(white,#87CEFA); height: 750px">
<div style=" position: relative; top: 50px; left: 600px; text-align: left" >
    <div >
<form action="psChangeDeal.php" method="post">
    <p style="font-size:20px; font-weight:bold;" > &nbsp;&nbsp;&nbsp;&nbsp; 流水号:
        <input name="PFlowID" type="text" class="smallInput"  readonly="true" value="<?php echo $PFlowID?>"></p><br/>
    <p style="font-size:20px; font-weight:bold;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 日期:
        <input name="Ptime" type="date" class="smallInput" value="<?php echo $row['Ptime']?>"></p><br/>
    <p style="font-size:20px; font-weight:bold;" class="smallInput">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;城市:
    <select id="city" name="city">
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
    </select></p><br/>
    <p style="font-size:20px; font-weight:bold;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;产品:
    <select name="ProductID" class="smallInput">
        <?php
        $p1=$p2=$p3=$p4=$p5=$p6=$p7=$p8="";
        if($row['ProductID']=='120502')
        {
            $p1 = 'selected';
        }
        else if($row['ProductID']=='110101')
        {
            $p2 = 'selected';
        }
        else if($row['ProductID']=='110503')
        {
            $p3 = 'selected';
        }
        else if($row['ProductID']=='420301')
        {
            $p6 = 'selected';
        }
        else if($row['ProductID']=='420201')
        {
            $p7 = 'selected';
        }
        echo "<option value='120502' $p1>固话-增值业务-800-国内</option>";
        echo "<option value='110101' $p2>固话-基础业务-普通电话</option>";
        echo "<option value='110503' $p3>固话-基础业务-公用电话-公话超市电话</option>";
        echo "<option value='420301' $p6>数据业务-互联网接入服务-互联网普通专线接入</option>";
        echo "<option value='420201' $p7>数据业务-互联网接入服务-宽带接入-ADSL虚拟拨号</option>";
        ?>
    </select></p><br/>
    <p style="font-size:20px; font-weight:bold;">  结算运营商:
    <select name="reporttype" class="smallInput">
        <?php
        $r1 = $r2 = $r3 = $r4 = $r5 = $r6 = $r7 = "";
        if($row['PtypeID'] == 'P100')
        {
            $r1 = "selected";
        }
        else if($row['PtypeID'] == 'P110')
        {
            $r2 = "selected";
        }
        else if($row['PtypeID'] == 'P120')
        {
            $r3 = "selected";
        }
        else if($row['PtypeID'] == 'P130')
        {
            $r4 = "selected";
        }
        else if($row['PtypeID'] == 'P140')
        {
            $r5 = "selected";
        }
        else if($row['PtypeID'] == 'P150')
        {
            $r6 = "selected";
        }
        else if($row['PtypeID'] == 'P160')
        {
            $r7 = "selected";
        }

        echo "<option value='P100' $r1>预收账款-用户预存款</option>";
        echo "<option value='P110' $r2>预收账款-缴费卡款</option>";
        echo "<option value='P120' $r3>联预收账款-预付费卡款-面值</option>";
        echo "<option value='P130' $r4>预收账款-预付费卡款-销售折扣</option>";
        echo "<option value='P140' $r5>预收账款-预收出租商品租金</option>";
        echo "<option value='P150' $r6>预收账款-预收代办工程款</option>";
        echo "<option value='P160' $r7>预收账款-其他-其他</option>";
        ?>
    </select></p><br/>
    <p style="font-size:20px; font-weight:bold;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额:<input type="text" name="Pmoney" value="<?php echo $row['Pmoney']?>"></p><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="提交">
</form>
    </div>
</div>
</body>
</html>