<?php
require_once '../include/head.php';
require_once '../update/part-list.php';
$part='other';
require_once 'require/catalog.php';
require_once '../update/desc.php';

setcookie('history['.basename(__FILE__,'.php').']',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>其他 ￭ Others｜Beyblade Burst ベイブレードバースト</title>
<?php parts_desc() ?>
<style>
.hasbro .name
{font-size:1.5em;}
</style>

<?php nav(['/parts','remake.php'],['menu','復刻版<br>Remake']) ?>
<main>
    <section class='catalog'>
        <a class='box driver stamina' id='Pr'>
            <div class='info'>
                <div class='symbol-wrap'>
                    <h2 class='symbol'>Pr</h2>
                </div>
                <div class='name'>
                    <h3 class='eng'>Prevail (TS14)</h3>
                </div>
            </div>
            <div class='content'>
                <figure class='img'></div>
            </div>
            <div class='desc'>［Hasbro（孩之寶）版限定］［暫時只有 -S（Slingshock）版］</div>
        </a>
    </section>
</main>
<script>
<?php
$names=new names('沒驚',['Mugen','無限']);
(new part('driver','∞',$names,[0,1,4,'35克',0,],'B-96 及 B-126 電動對戰盤專用的 Disk 一體型 Driver。軸端內藏磁石，能在該對戰盤電動加速。（不能發射）'))->catalog();
$names=new names('沒驚L劣',['Mugen L','無限Ｌ']);
(new part('driver','∞L',$names,[0,1,4,'35克',0,],'B-126 電動對戰盤專用的 Disk 一體型 Driver。軸端內藏磁石，能在該對戰盤電動加速。（不能發射）'))->catalog();
?>
function hasbro(name,type,desc='')
{
    code=`
    <a class='box layer hasbro ${type}'>
        <div class='info'>
            <div class='symbol-wrap'></div>
            <div class='name'><h3 class='eng'>${name}</h3></div>
        </div>
        <div class='content'>
            <div class='img'><div class='pic' style='background:url("layer/${name.substr(0,name.indexOf(' ')).toLowerCase()}.png")'></div></div>
        </div>
        <div class='desc'>［Hasbro（孩之寶）版限定］</div>
    </a>`;
    $('#Pr').before(code);
}
hasbro('Balar B4','attack','惡神〈巴羅爾〉。');
hasbro('Cyclops C4','stamina','獨眼巨人〈賽克洛斯〉。');
hasbro('Dullahan D4/D5','balance','無頭騎士〈杜拉漢〉。');
hasbro('Diomedes D2/D4','attack','英雄〈狄俄墨德斯〉。');
hasbro('Gargoyle G4/G5','defense');
hasbro('Hyrus H2/H4','defense');
hasbro('Istros I2/I4','stamina');
hasbro('Kraken K4','stamina','海怪〈克拉肯〉。');
hasbro('Cosmic Kraken K5','stamina','海怪〈克拉肯〉。');
hasbro('Morrigna M4','defense','女神〈摩莉甘〉。');
hasbro('Ogre O4/O5','attack','食人魔〈奧格雷〉。');
hasbro('Orpheus O2','defense','音樂英雄〈奧菲斯〉。');
hasbro('Rudr R4/R5','balance');
hasbro('Sphinx S4','attack','獅身怪物〈史芬克斯〉。');
hasbro('Solar Sphinx S5','attack','獅身怪物〈史芬克斯〉。');
hasbro('Surtr S2/S4','attack','巨人〈史爾特爾〉。');
hasbro('Typhon T4','defense','妖魔巨人〈堤豐〉。');
hasbro('Tyros T2','balance');
hasbro('Viper Hydrax H5','defense');
</script>
<script src='require/end.js'></script>