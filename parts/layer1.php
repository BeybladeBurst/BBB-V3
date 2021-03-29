<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer1';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>攻擊環 ￭ 結晶輪盤 ￭ Layer ￭ レイヤー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
.can
{--f:.75 !important;}
.eng,.jap,.chi
{font-size:0.8em !important;}
summary::before
{background:url('/img/system-single.png');background-size:contain;content:'';}
</style>

<?php nav(['/parts','layer5b.php'],['menu','<img src="/img/system-GT.png">'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>動畫前推出的陀螺，上部透明部分完全覆蓋下部。<a href='#D'>D</a> 因過強曾被禁止在官方大賽使用，<a href='#O'>O</a> 也是在此代表現優異。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php AtoZ($part) ?></script>
<script src='require/end.js'></script>