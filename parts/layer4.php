<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer4';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>攻擊環 ￭ 結晶輪盤 ￭ Cho Z Layer ￭ 超Ｚレイヤー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
section a.layer
{background:url('require/bg.php?hue=140&stat=6&heavy=');background-size:cover;}
dl div:nth-of-type(4) dd,.scale>div::after
{color:red;text-shadow:0.1em -0.1em 0.1em hsl(0,100%,80%);}
.scale div::after
{background:radial-gradient(1em at 0.4em 0.8em,hsl(0,0%,70%),hsl(0,0%,40%));}
#scale label::before,#scale label::after
{
    border-color:red !important;
    color:hsl(var(--c),80%,90%);
    background:hsl(var(--c),80%,55%);
}
#pP dl div:nth-of-type(4) dd,.scale>div[data-scale='7']~div::after
{color:hsl(270,100%,60%);text-shadow:0.1em -0.1em 0.1em hsl(270,100%,80%);font-weight:bold;}
#pP dl div:nth-of-type(4) dd
{padding-right:0.1em;}

.notch::first-letter
{letter-spacing:-0.05em;}
summary::before
{background:url('/img/system-Z.png');background-size:contain;content:'';}
</style>

<?php nav(['/parts','layer3.php'],['menu','<img src="/img/system-god.png">'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>動畫三季的陀螺。<ruby><rb>「Ƶ」</rb><rt>zetsu</rt></ruby>音同<ruby><rb>「絕」</rb><rt>ゼツ</rt></ruby>；「超絕」意思為出眾超群，
        同時亦代表所使用的 Zinc alloy（鋅合金）。Layer 加上金屬後重量、亦即是力量大增。
        <a href='#pP'>pP</a> 及 <a href='#超S'>超S</a> 比賽必備，另外性能良好的亦有 <a href='#hS'>hS</a>、<a href='#aH'>aH</a>、<a href='#超A'>超A</a> 等。
        除【超】三機、lα 及 rα 外，其他都可安裝 <a href='/articles/BHothers.php#G4LC'>Level Chip</a>，提升穩定性。</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script>
    <?php
    foreach ($desc as $sym=>$ar)
    {
        if ($sym[0]=='_') 
        {
            part::blank($part);
            continue;
        }
        $names=new names($desc[$sym]['can'],$layers[$sym]);
        (new part($part,$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
    } ?>
</script>
<script src='require/end.js'></script>