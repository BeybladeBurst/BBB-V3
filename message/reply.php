<?php 
if (empty($_GET['personal'])) exit();
error_reporting(E_ALL ^ E_WARNING);
if (isset($_POST['reply']) and isset($_POST['confirm']) and $_POST['confirm']=='Confirm')
    file_put_contents($_POST['time'].'r.txt',implode("\n",$_POST['reply']));
?>
<!DOCTYPE html>
<style>
div {
    width:60%;
    text-align:left;
    font-size:.8em;
}
[type=text] {width:100%;}
</style>
<?php
require '../include/head.php'; head();
date_default_timezone_set('Asia/Hong_Kong');
$week=(new DateTime())->format("W");

if (isset($_GET['prev'])) 
    $week=$week-1;
    
$private=explode("\n",file_get_contents($week.'p.txt'));
foreach ($private as $m)
    if ($m) echo '<div style="color:blue">'.
    ((new DateTime("@".explode('⢌⢌⢌',$m)[0]))->format('Y-m-d H:i:s e')).' '.explode('⢌⢌⢌',$m)[1].' '.explode('⢌⢌⢌',$m)[2].
    '</div><br>';

?>
<form method=post>
<?php
echo "<input type=hidden name=time value='$week'>";

$replies=explode("\n",file_get_contents($week.'r.txt'));
$messages=explode("\n",file_get_contents($week.'.txt'));

foreach ($messages as $i=>$m)
    if ($m) echo '<div>'.explode('⢌⢌⢌',$m)[1].' '.explode('⢌⢌⢌',$m)[2].'</div><input type=text name="reply[]" value="'.(isset($replies[$i])? $replies[$i]:'').'"><br>';
?>
<input type=submit id=here>
<input type=text name=confirm>
</form>