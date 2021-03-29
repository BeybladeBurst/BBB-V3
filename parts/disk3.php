<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='disk3';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>金屬輪盤 ￭ Disk ￭ ディスク｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>

<?php nav(['/parts','disk2.php'],['menu','0〜13'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>伴隨 GT 系統推出的 Disk。體積及重量如裝上 Frame 的 Core Disk。
        <a href='#Bl'>Bl</a> 及 <a href='#St'>St</a> 高重量，加強各方面；
        <a href='#Vn'>Vn</a> 低重心，增加持久。</p>
    </details>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php doubleAtoZ($part) ?></script>
<script src='require/end.js'></script>