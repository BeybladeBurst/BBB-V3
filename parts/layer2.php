<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer2';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>攻擊環 ￭ 結晶輪盤 ￭ Dual Layer ￭ デュアルレイヤー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
summary::before
{background:url('/img/system-dual.png');background-size:contain;content:'';}
</style>

<?php nav(['/parts','layer1.php'],['menu','<img src="/img/system-single.png">'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>動畫一季的陀螺。上部及下部皆露出接觸對手。最重的 <a href='#L2'>L2</a>，及最輕的 <a href='#D2'>D2</a> —出乎意料地—都成為此季最強。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php AtoZ($part,['α','β'],true) ?></script>
<script src='require/end.js'></script>