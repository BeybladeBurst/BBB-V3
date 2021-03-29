<?php
error_reporting(E_ALL ^ E_WARNING);

date_default_timezone_set('Asia/Hong_Kong');
$now=new DateTime();
$week=$now->format("W");
$prev=str_pad($week-1,2,'0',STR_PAD_LEFT);

if (!isset($_REQUEST['message'])) {
    $json=[];
    try {
        $replies=explode("\n",file_get_contents(isset($_GET['prev'])? $prev.'r.txt':$week.'r.txt'));
        $messages=explode("\n",file_get_contents(isset($_GET['prev'])? $prev.'.txt':$week.'.txt'));
    } catch(Exception $e) {;}
    foreach ($messages as $i=>$m) 
        if ($m) $json[]=array_merge(explode('⢌⢌⢌',$m),[isset($replies[$i])? $replies[$i]:'']);
    echo json_encode(array_slice($json,-50),JSON_UNESCAPED_UNICODE);
} else {
    $ips=explode("\n",file_get_contents('block.txt'));
    if (in_array($_SERVER['REMOTE_ADDR'],$ips)) {
        echo $_SERVER['REMOTE_ADDR'];
        exit();
    }
    $message=htmlspecialchars($_REQUEST['message']);
    $f=fopen($week.(isset($_REQUEST['private'])? 'p':'').'.txt','a');
    flock($f,LOCK_EX);
    fwrite($f,time()."⢌⢌⢌".$_SERVER['REMOTE_ADDR']."⢌⢌⢌"."$message\n");
    flock($f,LOCK_UN);
    fclose($f);
}