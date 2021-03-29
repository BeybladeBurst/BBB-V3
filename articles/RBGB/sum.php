<?php
$tp=$bp=$rb=0;
$f=fopen('-sum.txt','a');
for ($i=1;$i<=5;$i++) 
{
    $r=file(date('m').date('d')."-$i.txt");
    foreach ($r as $l)
        if (strpos($l,'!!!!')!==false)
        {    
            $g=fopen('dead.txt','a');
            fwrite($g,$l."\n");
            fclose($g);
        }
    $ar=explode(',',$l);
    $tp+=$ar[0];
    $bp+=$ar[1];
    $rb+=$ar[2];
}
fwrite($f,date('m').'-'.sprintf('%02d',date('d')+1).",$tp,$bp,$rb\n");
fclose($f);