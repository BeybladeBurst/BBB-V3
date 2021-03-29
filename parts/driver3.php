<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='driver3';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>軸心 底盤 ￭ Driver ￭ ドライバー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>

<?php nav(['/parts','driver2.php'],['menu','At～Ω'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>最新的 Driver。只有 <a href='#Rs'>Rs</a> 表現稍良，幫助吸收。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php doubleAtoZ($part) ?></script>
<script src='require/end.js'></script>