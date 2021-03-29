<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='other';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>攻擊環 ￭ 結晶輪盤 ￭ Bakuten Shoot Beyblade / Metal Fight Beyblade Remake Layer ￭ 爆転シュートベイブレード/メタルファイトベイブレード復刻レイヤー｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
summary::before
{
    background:url('/img/system-20anni.png');background-size:contain;
    content:'';border:none;border-radius:initial;
}
details[open] summary::before
{font-size:4em;}
details p 
{text-indent:5.5em;}
</style>

<?php nav(['/parts','reinforced.php'],['menu','Driver′']) ?>
<main>
    <details>
        <summary></summary>
        <p>為紀念【爆転シュートベイブレード】<small>(Bakuten Shoot Beyblade)</small> 於 1999 年、以及【メタルファイトベイブレード】<small>(Metal Fight Beyblade)</small> 於 2008 年推出而製作的バースト<small>(Burst)</small> 復刻版。</p>
    </details>
    <section class='catalog'></section>
</main>
<?php ruler('layer1') ?>
<script>
<?php
foreach ($desc as $sym=>$ar)
{
  $names=new names($desc[$sym]['can'],$layers[$sym]);
  (new part('layer',$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
} ?>
</script>
<script src='require/end.js'></script>