<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='driver2';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>軸心 底盤 ￭ Driver ￭ ドライバー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>

<?php nav(['/parts','driver1.php'],['menu','A～β'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>底部寛闊又能自由迴轉，如 <a href='#At'>At</a>、<a href='#Br'>Br</a>、<a href='#Ds'>Ds</a>、<a href='#Et'>Et</a> 都屬頂尖級。<a href='#Xt+'>Xt+</a> 底部成闊鈍角狀又圓滑同樣優秀。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php doubleAtoZ($part,['Xt\+','Ω']) ?></script>
<script src='require/end.js'></script>