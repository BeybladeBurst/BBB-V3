<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer6';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>攻擊環 ￭ 結晶輪盤 ￭ Mugen Lock Layer ￭ 無限ロックレイヤー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
section a.layer
{background:url('require/bg.php?hue=140&stat=6&heavy=');background-size:cover;}
section a.layer:not([id])
{background:url('require/bg.php?hue=140&stat=6&light=');background-size:cover;}
.scale>div::after
{color:red;text-shadow:0.1em -0.1em 0.1em hsl(0,100%,80%);}
.scale div::after
{background:radial-gradient(1em at 0.4em 0.8em,hsl(0,0%,70%),hsl(0,0%,40%));}
.scale>div[data-scale='7']~div::after,.s-heavy dl div:nth-of-type(4) dd
{color:hsl(270,100%,60%);text-shadow:0.1em -0.1em 0.1em hsl(270,100%,80%);font-weight:bold;}
#scale label::before,#scale label::after
{
    border-color:red !important;
    color:hsl(var(--c),80%,90%);
    background:hsl(var(--c),80%,55%);
}
a.layer:not([id]) dl div:nth-of-type(4) dd
{color:black !important;}
.notch::first-letter
{letter-spacing:-0.05em;}
/*summary::before*/
/*{background:url('/img/system-Z.png');background-size:contain;content:'';}*/
</style>

<?php nav(['/parts','layer5b.php'],['menu','<img src="/img/system-GT.png">'],'parts') ?>
<main>
    <details>
        <summary></summary>
        <p>「無限 Lock」使全個 Layer 自由迴轉，徹底卸走攻擊，不會被 Burst，除非外部的可動機關被擊中。
        裝上「Big-bang Armor」後，即使被擊中也難以 Burst。</p>
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
    } ?>
    $('section').append(`
    <a class="box layer stat-6 grams unknown">
        <div class="info">
            <div class="symbol-wrap"></div>
            <div class="name">
                <div class="top"><h4 class="can">別姑班丫麻</h4><h3 class="eng"> Big-bang Armour</h3></div>
                <div class="bottom"><h3 class="jap">ビッグバンアーマー </h3><h3 class="chi">爆裂裝甲</h3></div>
            </div>
        </div>
        <div class="content">
            <figure class="img"><div class="pic" style="background:url(layer/BA.png)"></div></figure>
            <dl><div></div><div></div><div></div><div><dt>重　量</dt><dd>4<small>克</small></dd></div><div></div><div></div></dl>
        </div>
        <div class="desc">（B-157 附有）能安裝於以上各款 Layer，會把反擊刃固定，不能被 Burst，直至裝甲被擊至移位。而左右的大刃也能進行攻擊。</div>
    </a>`);
</script>
<script src='require/end.js'></script>