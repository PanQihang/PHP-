<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11 0011
 * Time: 15:31
 */
function getVerify($type = 1,$length = 4,$width = 100,$height = 50,$codeName='verifycode')
{
//创建画布
    $image = imagecreatetruecolor($width, $height);
//创建颜色
    $white = imagecolorallocate($image, 200, 200, 200);
//创建填充矩形
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    function getRandColor($image)
    {
        return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }

    /**
     * 默认是4位的数字验证码
     * 1-数字
     * 2-字母
     * 3-数字+字母
     * 4-汉字
     */
    switch ($type) {
        case 1:
            //数字
            $string = join('', array_rand(range(0, 9), $length));
            break;
        case 2:
            //字母
            $string = join('', array_rand(array_flip(array_merge(range('a', 'z'), range('A', 'Z'))), $length));
            break;
        case 3:
            //数字+字母
            $string = join('', array_rand(array_flip(array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'))), $length));
            break;
        case 4:
            //汉字
            $str = '搬,血,需,调,动,全,身,精,血,滚,滚,如,雷,鸣,熔,炼,骨,文,在,血,液,中,催,发,出,神,曦,从,而,淬,炼,天,地,造,化,滋,养,肉,身,最,高,可,
        使,肉,身,达,至,十,万,斤,极,境,洞,天,开,辟';
            $arr = explode(',', $str);
            $string = join('', array_rand(array_flip($arr), $length));
            break;
        default:
            exit('非法参数');
            break;
    }

    //将验证码存入session
    session_start();
    $_SESSION[$codeName] = $string;

    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(15, 20);
        $angle = mt_rand(-15, 15);
        $x = ceil($width / $length) * $i;
        $y = mt_rand(ceil($height/3), $height);
        $color = getRandColor($image);
        $fonts = 'simkai.ttf';
        $text = mb_substr($string, $i, 1, 'utf-8');
        imagettftext($image, $size, $angle, $x, $y, $color, $fonts, $text);
    }
//添加像素当干扰元素
    for ($i = 0; $i < 100; $i++) {
        imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), getRandColor($image));
    }
//添加线段当干扰元素
    for ($i = 1; $i < 5; $i++) {
        imageline($image, mt_rand(0, $width), mt_rand(0, $height),
            mt_rand(0, $width), mt_rand(0, $height), getRandColor($image));
    }
//告诉浏览器以图像方式显示
    header('content-type:image/png');
    imagepng($image);
    imagedestroy($image);
}
