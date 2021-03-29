<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='driver1';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>軸心 底盤 ￭ Driver ￭ ドライバー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>

<?php nav(['/parts','driver3.php'],['menu','Ab～αn'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>最舊的 Driver，大多已被淘汰。<a href='#O'>O</a> 及 <a href='#R'>R</a> 曾經廣受歡迎。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php AtoZ($part) ?></script>
<script src='require/end.js'></script>