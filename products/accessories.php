<!DOCTYPE HTML>                                 
<?php include_once '../include/head.php'; head() ?>
<link rel="stylesheet" href="cell.css"/>
<title>裝置配件 Accessories｜Beyblade Burst ベイブレードバースト</title>
<meta name='description' content='爆旋陀螺 撃爆戰魂／戰鬥陀螺 爆烈世代：發射器手把／手柄／握把，各項配件如測角器、穩定器等一覽'>
<script>
$(document).ready(x=>$('.flexbox>div').attr('onclick','retrieve(this.className)'));
function retrieve(type) 
{
    gtag('event',type,{'event_category':'accessories'});
    $("input#popup").click();
    $('#popup+label').html('<span style="color:black">Loading...</span>');  
    $.ajax({url:"ajax-info.php?type="+type}).done(result=>$('#popup+label').html(result))
    .fail(x=>$('#popup+label').html('<span>Please refresh!</span>'));
}   
</script>

<?php nav(['launchers.php','/products'],['發射器<br>Launchers','陀螺<br>Beyblades']) ?>
<main>
    <h1>手把及裝置 Grips & Accessories</h1>
    <h2>手把：標準型　Grips: Standard</h2>
    <div class="flexbox">
        <div class='lg'>
            <p><img src='../img/grips/lg-wh.jpg'></p>
            <p>ランチャーグリップ<br>Launcher Grip</p>
        </div>
        <div class='plg'>
            <p><img src='../img/grips/plg-^bl.jpg'></p>
            <p>パワーランチャーグリップ<br>Power Launcher Grip</p>
        </div>
        <div class='rlg'>
            <p><img src='../img/grips/rlg-^wh.jpg'></p>
            <p>ラバーランチャーグリップ<br>Rubber Launcher Grip</p>
        </div>
    </div>
    <h2>手把：特殊型　Grips: Variant</h2>
    <div class="flexbox">
        <div class='cg'>
            <p><img src='../img/grips/cg-r.jpg'></p>
            <p>カラビナグリップ<br>Carabiner Grip</p>
        </div>
        <div class='kg'>
            <p><img src='../img/grips/kg.jpg'></p>
            <p>ナックルグリップ<br>Knuckle Grip</p>
        </div>
    </div>
    <br>
    <h2>握緊輔助：手把　Accessories for grips</h2>
    <div class="flexbox">
        <div class='ra'>
            <p><img src='../img/grips/ra.jpg'></p>
            <p>ラバーアシスト<br>Rubber Assist</p>
            <p>改變握緊手把姿勢</p>
        </div>
        <div class='gr'>
            <p><img src='../img/grips/gr-^b.jpg'></p>
            <p>グリップラバー<br>Grip Rubber</p>
            <p>橡膠部份 增加摩擦力</p>
        </div>
        <div class='gw'>
            <p><img src='../img/grips/gw-o.jpg'></p>
            <p>グリップウエイト<br>Grip Weight</p>
            <p>加重手把 提升安定性</p>
        </div>
        <div class='pt'>
            <p><img src='../img/grips/pt-bl.jpg'></p>
            <p>パワートリガー<br>Power Trigger</p>
            <p>集中力度握緊手把</p>
        </div>
    </div>
    <h2>握緊輔助：手把以外　Accessories for others</h2>
    <div class="flexbox">
        <div class='ssr'>
            <p><img src='../img/grips/ssr.jpg'></p>
            <p>シュートサポートラバー<br>Shoot Support Rubber</p>
        </div>
        <div class='fb'>
            <p><img src='../img/grips/fb.jpg'></p>
            <p>フィンガーバンド<br>Finger Band</p>
        </div>
    </div>
    <br>
    <h2>手把儀器　Instruments for grips</h2>
    <div class="flexbox">
        <div class='ag'>
            <p><img src='../img/grips/ag.jpg'></p>
            <p>アングルグリップ<br>Angle Grip</p>
            <p>測定發射傾斜角度</p>
        </div>
        <div class='wd'>
            <p><img src='../img/grips/wd-^y.jpg'></p>
            <p>ウエイトダンパー<br>Weight Damper</p>
            <p>鐵球吸收衝擊<br>安定化手把重量平衡</p>
        </div>
    </div>
    <input type='checkbox' id='popup'>
    <label for='popup' class='flexbox'></label>    
</main>