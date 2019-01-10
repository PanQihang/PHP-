<?php
include 'pdolink.php';
echo"<link href=\"bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"font-awesome-4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"chargetofEnroll.css\">";
$WFlowID = $_GET['WFlowID'];

$pdo = connect();

$sql = "SELECT * FROM webincome WHERE WFlowID = '$WFlowID'";

$result = $pdo->query($sql);
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>网间结算业务修改页面</title>
    <link rel="stylesheet" type="text/css" href="chargetofEnroll.css">
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href=font-awesome-4.7.0/css/font-awesome.min.css rel="stylesheet" type="text/css">
</head>
<body style="background: linear-gradient(white,#87CEFA); height: 750px">

<div style=" position: relative; top: 50px; left: 600px; text-align: left" >
    <div>
<form action="wchangeDeal.php" method="post">
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp; 流水号:
        <input name="WFlowID"  class="smallInput" type="text"  readonly="true" value="<?php echo $WFlowID?>"></p><br/>
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  日期:
        <input name="Wtime" type="date"  class="smallInput" value="<?php echo $row['Wtime']?>"></p><br/>
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 城市:
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
    <p style="font-size:20px; font-weight:bold;"> &nbsp;&nbsp;&nbsp;&nbsp;  产品:
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
    <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp; 运营商：
    <select name="WoperatorID"  class="smallInput">
        <?php
        $y1 = $y2 = $y3 ="";
        if($row['WoperatorID']=='1')
        {
            $y1 = 'selected';
        }
        else if($row['WoperatorID']=='2')
        {
            $y2 = 'selected';
        }
        else if($row['WoperatorID']=='3')
        {
            $y3 = 'selected';
        }
        echo "<option value='1' $y1>电信</option>";
        echo "<option value='2' $y2>移动</option>";
        echo "<option value='3' $y3>联通</option>";
    ?>
    </select></p><br/>
    <p style="font-size:20px; font-weight:bold;"> 结算类型:
    <select name="WtypeID"  class="smallInput">
        <?php
        $o1=$o2="";
        if($row['WtypeID']=='1')
        {
            $o1 = 'selected';
        }
        else if($row['WtypeID']=='2')
        {
            $o2 = 'selected';
        }

        echo "<option value='1' $o1>结算支出</option>";
        echo "<option value='2' $o2>结算收入</option>";
        ?>
    </select></p><br/>
        <p style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  金额:
            <input id="Wmoney" type="text" name="Wmoney"  class="smallInput" value="<?php echo $row['Wmoney']?>"></p><br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="submit" value="提交">

</form></div></div>
</body>
</html>