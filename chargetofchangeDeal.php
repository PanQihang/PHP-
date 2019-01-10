<?php
include 'pdolink.php';
$OFlowID = $_GET['OFlowID'];

$pdo = connect();

$sql = "SELECT * FROM outincome WHERE OFlowID = '$OFlowID'";

$result = $pdo->query($sql);
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>出账业务修改页面</title>
    <link rel="stylesheet" type="text/css" href="chargetofEnroll.css">
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href=font-awesome-4.7.0/css/font-awesome.min.css rel="stylesheet" type="text/css">
</head>
<body style="background: linear-gradient(white,#87CEFA); height: 750px">
<div style=" position: relative; top: 50px; left: 600px; text-align: left" >
    <div style="">
<form action="cchangeDeal.php" method="post">
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;  流水号:
        <input name="OFlowID" type="text"  readonly="true" class="smallInput" value="<?php echo $OFlowID?>"></p>
    <p style="font-size:20px; font-weight:bold;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 日期:
        <input name="Otime" type="date"  class="smallInput" value="<?php echo $row['Otime']?>"></p>
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;城市:
    <select name="city" name="city"  class="smallInput">
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
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;产品:
    <select name="ProductID"  class="smallInput">
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
        else if($row['ProductID']=='320113')
        {
            $p4 = 'selected';
        }
        else if($row['ProductID']=='320114')
        {
            $p5 = 'selected';
        }
        else if($row['ProductID']=='420301')
        {
            $p6 = 'selected';
        }
        else if($row['ProductID']=='420201')
        {
            $p7 = 'selected';
        }
        else if($row['ProductID']=='430101')
        {
            $p8 = 'selected';
        }
        echo "<option value='120502' $p1>固话-增值业务-800-国内</option>";
        echo "<option value='110101' $p2>固话-基础业务-普通电话</option>";
        echo "<option value='110503' $p3>固话-基础业务-公用电话-公话超市电话</option>";
        echo "<option value='320113' $p4>卡类-IP卡-省内IP电话卡-200卡</option>";
        echo "<option value='320114' $p5>卡类-IP卡-省内IP电话卡-300卡</option>";
        echo "<option value='420301' $p6>数据业务-互联网接入服务-互联网普通专线接入</option>";
        echo "<option value='420201' $p7>数据业务-互联网接入服务-宽带接入-ADSL虚拟拨号</option>";
        echo "<option value='430101' $p8>数据业务-平台业务-IDC-主机托管</option>";
?>
    </select></p><br/>
    <p style="font-size:20px; font-weight:bold;">出账类型:
    <select name="OtypeID"  class="smallInput">
    <?php
    $o1=$o2=$o3=$o4=$o5=$o6=$o7=$o8=$o9="";
    if($row['OtypeID']=='4001')
    {
        $o1 = 'selected';
    }
    else if($row['OtypeID']=='4003')
    {
        $o2 = 'selected';
    }
    else if($row['OtypeID']=='4004')
    {
        $o3 = 'selected';
    }
    else if($row['OtypeID']=='4002')
    {
        $o4 = 'selected';
    }
    else if($row['OtypeID']=='4005')
    {
        $o5 = 'selected';
    }
    else if($row['OtypeID']=='4006')
    {
        $o6 = 'selected';
    }
    else if($row['OtypeID']=='4012')
    {
        $o7 = 'selected';
    }
    else if($row['OtypeID']=='4007')
    {
        $o8 = 'selected';
    }
    else if($row['OtypeID']=='4011')
    {
        $o9 = 'selected';
    }
    echo "<option value='4001' $o1>主营业务收入-公众客户-月租费收入</option>";
    echo "<option value='4003' $o2>主营业务收入-公众客户-本地区间通话费</option>";
    echo "<option value='4004' $o3>主营业务收入-公众客户-本地拨号上网通信费</option>";
    echo "<option value='4002' $o4>主营业务收入-公众客户-本地区内通话费</option>";
    echo "<option value='4005' $o5>主营业务收入-公众客户-国内长途通信费</option>";
    echo "<option value='4006' $o6>主营业务收入-公众客户-国际长途通信费</option>";
    echo "<option value='4012' $o7>主营业务收入-公众客户-开户费收入</option>";
    echo "<option value='4007' $o8>主营业务收入-公众客户-港澳台长途通信费</option>";
    echo "<option value='4011' $o9>主营业务收入-公众客户-装移机工料费收入</option>";
?>
    </select></p><br/>
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额:
        <input id="Omoney" type="text" name="Omoney"  class="smallInput" value="<?php echo $row['Omoney']?>"></p><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="提交">
</form>
    </div>
</div>
</body>
</html>