<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='frame';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>結晶環 ￭ 戰輪 ￭ Frame ￭ フレーム｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>

<?php nav(['/parts','disk1.php'],['menu','Disk<br>A～Ω'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>能安裝在 Core Disk 上。萬用的 <a href='#B'>B</a>、外圍圓滑的 <a href='#C'>C</a>、<a href='#E'>E</a>、<a href='#P'>P</a> 都是比賽熱門。<a href='#L'>L</a>、<a href='#W'>W</a> 亦不俗，但容易擦地，須注意配搭。</p>
    </details>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php AtoZ($part) ?></script>
<script src='require/end.js'></script>