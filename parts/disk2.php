<?php 
require_once '../include/head.php'; 
require_once '../update/part-list.php';
$part='disk2';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>  
<title>金屬輪盤 ￭ Core Disk ￭ コアディスク｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
    .name .jap,.name .eng {letter-spacing:0 !important;}
</style>

<?php nav(['/parts','frame.php'],['menu','Frame<br>A～Z'],'parts') ?> 
<main>
    <details>
        <summary></summary>
        <p>能裝上 Frame 的 Disk。理所當然地，最重的 <a href='#00'>00</a>、<a href='#0'>0</a>、<a href='#10'>10</a> 最被廣泛使用。</p>
    </details>
    <section class='catalog'></section>  
</main> 
<?php ruler($part) ?> 
<script>
    <?php 
    for ($n=0;$n<=24;$n++)
    {
        if ($n==0)
            produce('00');
        if ($n==9)
            (new part($part,9))->catalog();
        elseif ($n==23)
            produce('α′');
        elseif (!array_key_exists($n,$disks)) 
            echo part::blank($part); 
        else 
        { 
            produce($n);
            if ($n==1 or $n==8)
                produce($n."′");
        } 
    }
    function produce($sym)
    {
        global $desc,$disks;
        $names=new names($desc[$sym]['can'],$disks[$sym]);
        (new part('disk2',$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
    } ?> 
</script>
<script src='require/end.js'></script>