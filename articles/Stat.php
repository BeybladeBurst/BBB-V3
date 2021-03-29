<?php 
    require_once '../include/head.php';
    
    $parts=['driver','disk','frame','layer','layer5c','layer5w','layer5b'];
    $data=[];
    foreach ($parts as $p)
    {
        $raw=file_get_contents("../tools/stat$p.txt");
        $entry=str_getcsv($raw,"\n");
        foreach ($entry as $e)
        {  
            if ($e=='') continue;
            $a=str_getcsv($e,",");
            $data[$p]{$a[0]}=0;
            $a[0]=preg_replace("/([A-z]+)′/","$1",$a[0]);
            $data[$p]{$a[0]}+=$a[1]; 
        }
        arsort($data[$p]);
    }
?>
<!DOCTYPE HTML>
<?php head() ?>
<title>研究｜Beyblade Burst ベイブレードバースト</title>
<style>
fieldset
{
    width:100%;max-width:30em;
    margin:3em auto;
    border:2px solid hsl(var(--c),100%,60%);border-radius:0.5em;
    background:hsl(var(--c),100%,95%);
}
legend 
{
    border:2px solid hsl(var(--c),100%,60%);border-radius:9em;
    padding:0.2em 1em;
    background:hsl(var(--c),100%,95%);
}
figure
{margin:1em 0.2em;}
fieldset:first-of-type
{--c:320;}
fieldset:nth-of-type(n+2)
{--c:230;}
fieldset:nth-of-type(n+4)
{--c:140;}
figure div 
{
    background:hsl(var(--c),100%,80%);
    height:2em;
    padding:0 0.5em;margin:0.5em 0;
    display:flex;justify-content:space-between;align-items:center;
}
</style>

<?php nav(['/articles','/'],['back','home']) ?>
<main>
    <h1>部件人氣排行榜</h1>
    <aside>2018-09-01</aside><br><br>
    <article>
        <p>以下是在本網搜尋次數位列前十的部件。如 Driver 有 ′ 版，會與普通版合計。Layer 内 sR 及 Sr 的數據是兩者合計。已於12月26日重設，更好反映最近情況。</p>
        <?php foreach ($parts as $p) { ?>
        <fieldset>
            <legend><?php echo ucfirst($p) ?></legend>
            <figure>
            <?php $c=0;
            foreach ($data[$p] as $s=>$f)
            {
                if ($c==0) $max=$f;
                if ($s==='Sr') $s='Sr+sR';
                if ($s==='sR') continue;
                echo "<div style='width:".($f/$max*100)."%'>$s<small>$f</small></div>";
                $c++;if ($c==10) break;
            } ?>
            </figure>
        </fieldset>
        <?php } ?>
    </article>
</main>