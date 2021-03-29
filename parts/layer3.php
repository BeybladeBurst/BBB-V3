<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer3';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>攻擊環 ￭ 結晶輪盤 ￭ God Layer ￭ ゴッドレイヤー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
.notch::first-letter,#nL dl div:nth-of-type(4) dd
{letter-spacing:-0.05em;}
summary::before
{background:url('/img/system-god.png');background-size:contain;content:'';}
</style>

<?php nav(['/parts','layer2.php'],['menu','<img src="/img/system-dual.png">'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>動畫二季的陀螺。全部都擁有稱為<ruby><rb>「神能力」</rb><rt>God Ability</rt></ruby>的 gimmick 或機關，但只有少量能在實戰中起明顯作用。有橡膠又能隨意切換迴轉的 
        <a href='#Sr'>Sr</a> 成為萬能機；近乎完美圓形的 <a href='#mG'>mG</a> 有壓倒性的持久。<a href='#dC'>dC</a>、<a href='#dF'>dF</a> 表現亦不俗。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script>
    <?php
    foreach ($desc as $sym=>$ar)
    {
        $names=new names($desc[$sym]['can'],$layers[$sym]);
        (new part($part,$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
        if ($sym=='SgV') part::blank($part);
    } ?>
</script>
<script src='require/end.js'></script>