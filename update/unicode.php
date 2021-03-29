<?php 
$part='layer5w';
require 'desc.php';
require 'part-list.php';
$char='戰鬥陀螺爆烈世代爆旋陀螺擊爆戰魂非官方資訊站商品部件景品圖片教學研究往官方網站地區官方消息最新未來登錄標系列開撃';
foreach ($layers as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($disks as $p)
  if (isset($p[2]))
    $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($frames as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($drivers as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($layer5b as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($layer5c as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);
foreach ($layer7r as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($layer7c as $p)
  $char.=preg_replace('/｜(.*)/','',$p[2]);  
foreach ($desc as $k=>$ar)
  $char.=$k;
  
$char=array_unique(str_split_unicode($char));
asort($char);

echo '<textarea>python C://python27/lib/site-packages/fonttools/subset/__init__.pyc SB.otf --output-file=Mincho-chi.otf --unicodes='.substr(code($char),5).'</textarea>';

function str_split_unicode($str, $length = 1) {
    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
    if ($length > 1) {
        $chunks = array_chunk($tmp, $length);
        foreach ($chunks as $i => $chunk)
            $chunks[$i] = join('', (array) $chunk);
        $tmp = $chunks;
    }
    return $tmp;
}
function code($c) { 
    $u='';
    foreach ($c as $s) 
        $u.='u+'.dechex(unpack('V',iconv('UTF-8','UCS-4LE',$s))[1]).','; 
    return $u;
}
echo '<textarea>python C://python27/lib/site-packages/fonttools/subset/__init__.pyc KMPM.otf --output-file=Mincho.otf --unicodes=U+8D85,U+6483,U+95C7,U+5149,U+0020-007F,U+03A9,U+03B1-03B2,U+30A0-30FC,U+3000-301C,U+FF00-FF3A,U+01B5</textarea>
超 擊 闇 光 Basic Ω α β Katakana Punc FullWidth';
?>
<style>
textarea
{
    display:block;
    width:80%;height:200px;
}
</style>
