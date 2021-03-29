<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='layer7ʃ';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>GT Weight ￭ ガチンコレイヤーウエイト｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
    .name .left {display:none;}
    .name .right {margin-bottom:0 !important;}
    .eng {font-size:1.2em;}
</style>

<?php nav(['/parts','layer5c.php'],['menu','<img src="/img/system-GT.png">Chip'],'parts') ?>
<main>
    <?php types() ?>
    <section class='catalog'></section>
</main>
<?php ruler($part) ?>
<script>
    <?php
    $types=['A','B','D','S'];
    $chassis=[];
    foreach ($types as $t)
        for ($i=1;$i<=7;$i++)
            $chassis[]=$i.$t;
    foreach ($chassis as $sym)
    {
        if (!array_key_exists($sym,$desc))
            part::blank('layer');
        else (new part($part,$sym,new names('',[preg_replace_callback('/(\d)([ABDS])/',function($m) {return "$m[1]-".ucfirst(part::TYPES[$m[2]]);},$sym),'','']),
            $desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
    } ?>
</script>
<script src='require/end.js'></script>