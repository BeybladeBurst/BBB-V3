<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer5w';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>GT Weight ￭ ガチンコレイヤーウエイト｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
.symbol {
    --f: 1.7 !important;
    --adj: 0.22em !important;
}
#幻 .pic
{filter: brightness(125%) drop-shadow(0.15em -0.15em 0.1em hsla(0,0%,0%,0.3));}
</style>

<?php nav(['/parts','layer5c.php'],['menu','<img src="/img/system-GT.png">Chip']) ?>
<main>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script>
    <?php
    foreach ($desc as $sym=>$ar)
    {
        $names=new names($desc[$sym]['can'],['',$sym,'']);
        (new part($part,$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
    } ?>
</script>
<script src='require/end.js'></script>