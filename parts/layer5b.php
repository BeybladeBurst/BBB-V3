<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer5b';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>GT Layer Base ￭ ガチンコレイヤーベース｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
summary::before
{background:url('/img/system-GT.png') no-repeat center center;background-size:contain;content:'';}
</style>

<?php nav(['/parts','layer5w.php'],['menu','<img src="/img/system-GT.png">Weight'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>動畫四季的陀螺。「GT」代表<ruby><rb>「ガチ」</rb><rt>gachi</rt></ruby>（チ屬Ｔ行），為<ruby><rb>「ガチンコ」</rb><rt>gachinko</rt></ruby>簡寫，
        等同「真剣勝負」，意思是盡全力對決；同時亦代表「Gold Turbo」，指動畫中陀螺與使用者共鳴力高時，發出金光的狀態。
        要入手 Gold Turbo 版，請<a href='/articles/GT.php'>往此處查看</a>。<br>
        擁有防爆的 <a href='#L'>L</a> 必備，其次是極重的 <a href='#I'>I</a>、高防禦的 <a href='N'>N</a>、攻擊強大的 <a href='#J'>J</a> 及 <a href='#Z'>Z</a>。
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script><?php AtoZ($part,['Δ','?']) ?></script>
<script src='require/end.js'></script>