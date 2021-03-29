<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer5c';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>GT Chip ￭ ガチンコレイヤーチップ｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
#Dr .notch::first-letter,#Db .notch::first-letter
{letter-spacing:-0.05em;}
</style>

<?php nav(['/parts','layer5b.php'],['menu','<img src="/img/system-GT.png">Base'],'parts') ?>
<main>
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
        $names=new names($desc[$sym]['can'],$layer5c[$sym]);
        (new part($part,$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
    } ?>
</script>
<script src='require/end.js'></script>