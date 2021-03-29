<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='disk1';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>金屬輪盤 ￭ Disk ￭ ディスク｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>

<?php nav(['/parts','disk3.php'],['menu','Bl〜St'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>大部分已被淘汰的 Disk。<a href='#Ω'>Ω</a> 外圍圓滑、又有顯著外重心特性，令持久優秀，仍有高實用度。</p>
    </details>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php AtoZ($part) ?></script>
<script src='require/end.js'></script>