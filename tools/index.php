<?php
$files=scandir('/home4/beyblade/public_html/message');
foreach($files as $file) 
  if (preg_match('/^155/',$file))
    echo file_get_contents('/home4/beyblade/public_html/message/'.$file).'<br>';

require_once '../update/part-list.php';
$parts=['driver','frame','disk','layer','layer5c','layer5b','layer5w'];
$record=false;
  
foreach ($parts as $c)
    if (isset($_GET[$c]) and $_GET[$c]!=='')
    {
        $record=true;
        $s=preg_quote($_GET[$c]);
        $raw=file_get_contents("stat$c.txt");
        if (preg_match("/\n$s,([0-9]+)/i",$raw,$result)==1)
        {
            $result[1]++;
            $raw=preg_replace("/\n($s),([0-9]+)/i","\n$1,{$result[1]}",$raw);
            file_put_contents("stat$c.txt",$raw);
        }
    };

if ($record===true) exit();

// $post_data['bTmFCOMDTO.searchValue'] = '3';
// $post_data['bTmFCOMDTO.searchKeyword'] = 'コマおもちゃ';
// $post_data['bTmFCOMDTO.enzanShiValue'] = '2';
// $post_data['sumbit'] = 'submit';

// foreach ($post_data as $key=>$value)
//   $post_items[]=$key.'='.$value;
// $post_string=implode('&',$post_items);

// $curl_connection=curl_init('https://www.j-platpat.inpit.go.jp/web/all/top/BTmTopSearchPage.action');
// curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
// curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
// curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
// curl_setopt($curl_connection, CURLOPT_COOKIEJAR, 'cookie.txt');

// $result=curl_exec($curl_connection);
// $html=htmlentities($result);

// $start=strpos($html,"search-result")+51;
// echo substr($html,$start,7);
// curl_close($curl_connection);

echo "<div style='display:flex'>";
foreach ($parts as $c)
{
    $raw=file_get_contents("stat$c.txt");
    $f=fopen("stat$c.txt","a");
    if (preg_match('/layer5/',$c)>0) 
    {
        foreach (${$c} as $d=>$a)
            if (preg_match("/\n$d,([0-9]+)/",$raw)==0)
                fwrite($f,"\n$d,0"); 
    }
    else 
    {
        foreach (${$c.'s'} as $d=>$a)
            if (preg_match("/\n$d,([0-9]+)/",$raw)==0)
                fwrite($f,"\n$d,0"); 
    }
    fclose($f);
    echo "<div style='margin-right:1em'><h1>$p</h1>";
    $entry=str_getcsv($raw,"\n");
    $data=[];
    foreach ($entry as $e)
    { 
        if ($e=='') continue;
        $a=str_getcsv($e,",");
        $data{$a[0]}=0;
        $data{$a[0]}+=$a[1]; 
    }
    arsort($data);
    foreach ($data as $symbol=>$figure)
        echo "$symbol $figure<br>";
    echo "</div>";
}
echo "</div>";
$raw=file_get_contents("statdriver.txt");
$f=fopen("statdriver.txt","a");
foreach ($dash as $d) 
    if (preg_match("/\n{$d}′,([0-9]+)/",$raw)==0)
        fwrite($f,"\n{$d}′,0");
fclose($f);

if (isset($_GET['reset']) and $_GET['reset']=='true')
    foreach ($parts as $p)
    {
        $raw=file_get_contents("stat$p.txt"); 
        $raw=preg_replace("/\n(.*?),([0-9]+)/i","\n$1,0",$raw);
        file_put_contents("stat$p.txt",$raw);
    }
?>
<style>
a.layer 
{ 
  width:10em;height:10em; 
  border-radius:10em; 
  position:relative; 
} 
a.layer figure 
{ 
  width:<?php echo 2*sqrt(7) ?>em;height:<?php echo 2*sqrt(7) ?>em; 
  border-radius:9em; 
  position:absolute;left:50%;top:50%; 
  transform:translate(-50%,-50%); 
  margin:0; 
} 

a.layer figure div 
{position:absolute;left:50%;top:50%;} 
a.layer figure:not(.center) div 
{width:2em;height:calc(2*var(--sqrt3));} 
.center div 
{ 
  width:2em;height:var(--sqrt3); 
  background:linear-gradient(to bottom right,hsla(230,100%,30%,0.5),hsla(230,100%,50%,0.2)); 
} 
.blue div 
{background:linear-gradient(hsla(205,100%,30%,1),hsla(205,100%,60%,1),hsla(205,100%,60%,1));} 
.red div 
{background:linear-gradient(hsla(0,100%,50%,1),hsla(0,100%,80%,1),hsla(0,100%,80%,1));} 
.green div 
{background:linear-gradient(to bottom right,hsla(90,100%,40%,1),hsla(90,100%,70%,1));} 
.bottom1 div,.bottom2 div 
{border:0.2em solid white;background:white;box-sizing:content-box;} 
.red,.bottom2 
{transform:translate(-50%,-50%) rotate(60deg)!important;} 

figure:not(.center) div:nth-of-type(1) 
{transform:translate(-50%,calc(-50% - var(--sqrt3))) skew(-30deg);} 
figure:not(.center) div:nth-of-type(2) 
{transform:translate(calc(-50% + 1.5em),calc(-50% + var(--sqrt3)/2)) rotate(120deg) skew(-30deg);} 
figure:not(.center) div:nth-of-type(3) 
{transform:translate(calc(-50% - 1.5em),calc(-50% + var(--sqrt3)/2)) rotate(240deg) skew(-30deg);} 
.center div:nth-of-type(1) 
{transform:translate(calc(-50% - 0.5em),calc(-50% - var(--sqrt3)/2)) skew(-30deg);} 
.center div:nth-of-type(2) 
{transform:translate(calc(-50% + 1em),-50%) rotate(120deg) skew(-30deg);} 
.center div:nth-of-type(3) 
{transform:translate(calc(-50% - 0.5em),calc(-50% + var(--sqrt3)/2)) rotate(240deg) skew(-30deg);} 
</style>
<div style='display:flex;width:500px;justify-content:center;background:black;--sqrt3:<?php echo sqrt(3) ?>em'>
<a class='layer'>
    <figure class='bottom1'> 
        <div></div> <div></div> <div></div> 
    </figure> 
    <figure class='bottom2'> 
        <div></div> <div></div> <div></div> 
    </figure> 
    <figure class='red'> 
        <div></div> <div></div> <div></div> 
    </figure> 
    <figure class='blue'> 
        <div></div> <div></div> <div></div> 
    </figure> 
    <figure class='center'> 
        <div></div> <div></div> <div></div> 
    </figure>
</a>
<a class='layer'>
    <figure class='bottom1'> 
        <div></div> <div></div> <div></div> 
    </figure> 
    <figure class='green'> 
        <div></div> <div></div> <div></div> 
    </figure> 
</a>
</div>