<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part=null;
require_once '../update/desc.php';
require_once 'require/catalog.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>軸心 底盤 ￭ Driver ￭ ドライバー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
.name {
    margin:0 0 0.1em 0.3em;
    line-height:1.25em;
    display:block;
}
.eng {
    font-size:0.9em;
    margin-left:0.1em;
}
:-webkit-any(#Dm′,#Hn′,#Mr′) .symbol::first-letter {
    letter-spacing:-0.1em;
}
:-webkit-any(#Ds′,#Kp′,#Op′,#Qc′,#Rb′,#Sp′) .symbol::first-letter {
    letter-spacing:-0.05em;
}
:-webkit-any(#Ig′,#Jl′,#Ul′,#Vl′,#Zt′) .symbol::first-letter {
    letter-spacing:0.0em;
}
.symbol {
    letter-spacing:calc(1em*var(--space));
    padding-left:calc(1em*var(--space) + .05em);
}
#T′ .symbol,#V′ .symbol,#X′ .symbol,#Z′ .symbol {
    padding-left:calc(1em*var(--space) + .1em);
}
#Z′~a .symbol {
    letter-spacing:calc(1em*var(--space));
    padding-right:calc(-1em*var(--space) - .05em);
    padding-left:calc(1em*var(--space) + .1em);
}
#Dm′ 
{--space:-.25;}
#Ds′,#Kp′,#Op′,#Rb′,#Sp′,#Hn′ 
{--space:-.15;}
#A′,#Mr′,#Qc′,#Ig′ 
{--space:-.1}
#B′,#H′,#L′,#Q′,#X′,#U′,#Jl′,#Ul′,#Vl′ 
{--space:-.05;}
#F′,#J′,#T′,#V′,#Z′,#α′,#Zt′ 
{--space:-.0;}
a[id*=g] .symbol,a[id*=p] .symbol 
{--adj:-.1em}

#Ul′ .jap
{letter-spacing:-.15em;}
</style>

<?php nav(['/parts','driver3.php'],['menu','Driver<br>Ab～αn']) ?>
<main>
    <details>
        <summary></summary>
        <p>使用強化彈簧的 Driver，減低陀螺被 Burst 的機會！
        <a href='#Ds′'>Ds′</a> 及 <a href='#Qc′'>Qc′</a> 最高實用性，
        <a href='#Vl′'>Vl′</a>「覺醒」（能超暢順地自由迴轉）後，持久大增！</p>
    </details>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<script>
function dash(sym,eng,jap,type,desc='')
{
    $('section').append(`
    <a href='/products?driver=${sym}#myTable' class='box driver ${type}' id='${sym}'>\
        <div class='info'>
          <div class='symbol-wrap'><h2 class='symbol ${sym.replace('′','').length==1? 'single':''}'>${sym}</h2></div>
          <div class='name'><h3 class='eng'>${eng} <sup>dash</sup></h3><br><h3 class='jap'>${jap}ダッシュ</h3></div>
        </div>
        <div class='content'>
          <div class='img'><div class='pic' style='background:url("driver/${sym.slice(0,-1)}′.png")'></div></div>
        </div>
        <div class='desc'>內藏強化彈簧的【${sym.slice(0,-1)}】driver。</div>
    </a>`);
}
<?php 
foreach ($dash as $s)
    echo "dash('{$s}′','{$drivers[$s][0]}','{$drivers[$s][1]}','".Classify::type('driver',$s)."');";
?>
$("label[for='stamina']").remove();
</script>
<script src='require/end.js'></script>