<!DOCTYPE HTML>                                 
<?php include_once '../include/head.php';head() ?>
<link rel="stylesheet" href="cell.css"/>
<title>發射器 Launchers｜Beyblade Burst ベイブレードバースト</title>
<meta name='description' content='爆旋陀螺 撃爆戰魂／戰鬥陀螺 爆烈世代：各款、各式、各色發射器一覽'>
<script>
$(document).ready(x=>$('.flexbox>div').attr('onclick','retrieve(this.className)'));
function retrieve(type) 
{
    gtag('event',type,{'event_category':'launchers'});
    $("input#popup").click();
    $('#popup+label').html('<span style="color:black">Loading...</span>');  
    $.ajax({url:"ajax-info.php?type="+type}).done(result=>$('#popup+label').html(result))
    .fail(x=>$('#popup+label').html('<span>Please refresh!</span>'));
}   
</script>

<?php nav(['/products','accessories.php'],['陀螺<br>Beyblades','裝置及配件<br>Accessories']) ?>
<main>
    <h1>發射器 Launchers</h1>
    <h2>線型 String</h2>
    <div class="flexbox">
        <div class='lbl-lr'>
            <p><img src='../img/launchers/lbl-lr-bl.jpg'></p>
            <p>ロングベイランチャー LR<br>Long Bey Launcher LR</p>
            <p>拉線較長</p>
        </div>
        <div class='lbl-r'>
            <p><img src='../img/launchers/lbl-r-^b.jpg'></p>
            <p>ロングベイランチャー<br>Long Bey Launcher</p>
            <p>拉線較長</p>
        </div>
        <div class='lbl-l'>
            <p><img src='../img/launchers/lbl-l-^bl.jpg'></p>
            <p>ロングベイランチャー L<br>Long Bey Launcher L</p>
            <p>拉線較長</p>
        </div>
        <div class='bl-lr'>
            <p><img src='../img/launchers/bl-lr-r.jpg'></p>
            <p>ベイランチャー LR<br>Bey Launcher LR</p>
        </div>  
        <div class='bl-r'>
            <p><img src='../img/launchers/bl-r-na.jpg'></p>
            <p>ベイランチャー<br>Bey Launcher</p>
        </div>      
        <div class='bl-l'>
            <p><img src='../img/launchers/bl-l-wh.jpg'></p>
            <p>ベイランチャー L<br>Bey Launcher L</p>
        </div>      
        <div class='blh'>
            <p><img src='../img/launchers/blh.jpg'></p>
            <p>ベイランチャー ヘビー<br>Bey Launcher: Heavy</p>
            <p>重量較重<br>拉線較短</p>
        </div>
        <div class='bls'>
            <p><img src='../img/launchers/bls.jpg'></p>
            <p>ベイランチャー スピード<br>Bey Launcher: Speed</p>
            <p>拉線更長</p>
        </div>
    </div>
    <br>
    <h2>弦型 Winder</h2>
    <div class="flexbox">
        <div class='ll-lr'>
            <p><img src='../img/launchers/ll-lr-dw.jpg'></p>
            <p>ライトランチャー LR<br>Light Launcher LR</p>
        </div>
        <div class='ll-r'>
            <p><img src='../img/launchers/lll-r-pe.jpg'></p>
            <p>ライトランチャー<br>Light Launcher</p>
        </div>
        <div class='ll-l'>
            <p><img src='../img/launchers/ll-l-go.jpg'></p>
            <p>ライトランチャー L<br>Light Launcher L</p>
        </div>
        <div class='sl'>
            <p><img src='../img/launchers/sl-r.jpg'></p>
            <p>ソードランチャー<br>Sword Launcher</p>
            <p>拉弦有標準及較長兩邊</p>
        </div>
        <div class='dsl'>
            <p><img src='../img/launchers/dsl-b.jpg'></p>
            <p>デジタルソードランチャー<br>Digital sword launcher</p>
            <p>附上限 2500 的力量測定功能</p>
        </div>
        <div class='pl'>
            <p><img src='../img/launchers/pl-wh.jpg'></p>
            <p>プロトランチャー<br>Proto Launcher</p>
            <p>最低級的發射器</p>
        </div>
        <div class='el-r'>
            <p><img src='../img/launchers/el-r-bl.jpg'></p>
            <p>エントリーランチャー<br>Entry Launcher</p>
            <p>最低級的發射器</p>
        </div>
        <div class='el-l'>
            <p><img src='../img/launchers/el-l-wh.jpg'></p>
            <p>エントリーランチャー L<br>Entry Launcher L</p>
            <p>最低級的發射器</p>
        </div>
    </div>
    <input type='checkbox' id='popup'>
    <label for='popup' class='flexbox'></label>    
</main>