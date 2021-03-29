<?php
require_once '../update/time.php';
require_once '../update/classify.php';
class part
{
    const TYPES=['A'=>'attack','B'=>'balance','D'=>'defense','S'=>'stamina'];
    const SPINS=['L'=>'left','R'=>'right','D'=>'left right'];
    static $flush,$types;
    static function setter()
    {
        global $update;
        part::$flush='?'.max($update);
    }
    public function __construct($component,$symbol,$names=false,$stat=false,$desc='')
    {
        $this->component=rtrim($component,'0..9s');
        $this->symbol=(string)$symbol;
        $this->names=$names? $names:null;
        $this->stat=$stat? $stat:['','','','',''];
        $this->desc=$desc;
        
        part::setter();
        $this->type=Classify::type($this->component,$this->symbol);
        if (!$this->spin=Classify::spin($this->component,$this->symbol))
            unset($this->spin);
        if (!$this->deck=Classify::deck($this->component,$this->symbol))
            unset($this->deck);
        if (!$this->dash=Classify::dash($this->component,$this->symbol))
            unset($this->dash);
    }
    public function catalog()
    {
        echo "catalog(".json_encode($this,JSON_UNESCAPED_UNICODE).");\n";
    }
    static function blank($component)
    {
        echo "catalog({\"component\":'".rtrim($component,'0..9s')."'});\n";
    }
}
class names
{
    public function __construct($can,$names)
    {
        $this->jap=$names[1];
        $this->eng=$names[0];
        $this->chi=(isset($names[2]))? preg_replace('/｜(.*)/','',$names[2]):'';
        $this->can=$can;
    }
}
function AtoZ($component,$last2=['α','β'],$layer2=false)
{
    $component=preg_replace('/^([a-z]+)\d?$/','$1s',$component);
    global $desc,${$component};
    
    $alphabet=array_merge(range('A','Z'),$last2);
    if ($component=='disks')
        $alphabet[]='Ω';
    foreach ($alphabet as $letter)
    {
        if ($layer2 and $letter!='β')
            $letter.='2';
        if (!array_key_exists($letter,$desc))
            part::blank($component);
        else
        {
            $names=new names($desc[$letter]['can'],${$component}[$letter]);
            (new part($component,$letter,$names,$desc[$letter]['stat'],$desc[$letter]['desc']))->catalog();
        }
    }
}
function doubleAtoZ($component,$last2=['α','β'])
{
    $component=preg_replace('/^([a-z]+)\d?$/','$1s',$component);
    global $desc,${$component};
    
    $symbols=array_keys($desc);
    $alphabet=array_merge(range('A','Z'),$last2);
    foreach ($alphabet as $letter)
        if ($letter=preg_grep("/^{$letter}[a-z]*$/",$symbols))
        {
            $sym=array_values($letter)[0];
            $names=new names($desc[$sym]['can'],${$component}[$sym]);
            (new part($component,$sym,$names,$desc[$sym]['stat'],$desc[$sym]['desc']))->catalog();
        }
        else part::blank($component);
}
function ruler($part)
{
    echo "<script>ruler('$part')</script>";
}
function types()
{
    foreach (part::TYPES as $t) echo "<input type='checkbox' id='$t' checked hidden>"; 
    echo '<div class="filter">';  
    foreach (part::TYPES as $t) echo "<label for='$t'><img src='../img/type-$t.png'></label>"; 
    echo '</div>';
} ?>