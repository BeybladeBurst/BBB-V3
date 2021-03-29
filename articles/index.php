<!DOCTYPE HTML>
<?php include_once '../include/head.php'; head(); ?>
<title>研究｜Beyblade Burst ベイブレードバースト</title>
<style>
main
{max-width:700px;margin:0 auto;position:relative;overflow:hidden;}
p
{
    display:flex;justify-content:space-between;align-items:center;
    width:100%;
    margin:0.8em auto;
    z-index:999;
}
main a
{margin:0;}
main p time
{font-size:0.8em;padding:0 0.5em;}
main a:link
{
    width:75%;text-align:left;
    padding:0.5em 0.75em;
    border:0.15em solid rgb(150,255,0);border-radius:0.5em;
    text-decoration:none;color:black;
    background:hsla(<?php echo rand(0,359) ?>,100%,80%,0.7);
    animation:bg-coloring linear 20s infinite both;
}
main a:link:hover
{
    background-image:linear-gradient(to top right,skyblue,royalblue);
    border:0.15em solid blue;
    color:white;
}
main a:visited
{color:grey;border:0.15em solid grey;}
</style>

<?php nav(['/','../guide.php'],['home','教學<br>Guide']) ?>
<main>
    <p><a href='RL3.php'>Random Layer 3 機率研究</a><time>2019-10</time></p>
    <p><a href='ProbGraph3.php'>Rare Bey Get Battle 機率追蹤３</a><time>2019-09</time></p>
    <p><a href='GT.php'>Gold Turbo 版入手方式</a><time>2019-08</time></p>
    <p><a href='GTbase.php'>GT Base 決定 Lock 鬆緊度設計</a><time>2019-07</time></p>
    <p><a href='2019AC.php'>2019 亞洲盃</a><time>2019-05</time></p>
    <!--<p><a href='Extension.php'>官網部件圖片簡易看</a><time>2019-05</time></p>-->
    <p><a href='Disk.php'>塗裝數字鐵</a><time>2019-05</time></p>
    <p><a href='Popularity.php'>陀螺人氣變化</a><time>2019-04</time></p>
    <p><a href='Glossary.php'>陀螺詞彙</a><time>2019-02</time></p>
    <p><a href='Engrave.php'>產品包裝刻印號碼</a><time>2018-12</time></p>
    <p><a href='Stat.php'>部件人氣排行</a><time>2018-09</time></p>
    <p><a href='BBG.php'>BBG 產品</a><time>2018-08</time></p>
    <p><a href='2018AC.php'>2018 亞洲盃</a><time>2018-04</time></p>
    <p><a href='BHothers.php'>限定部件</a><time>2017-12</time></p>
    <p><a href='ProbGraph2.php'>Rare Bey Get Battle 機率追蹤２</a><time>2017-12</time></p>
    <p><a href='ProbGraph.php'>Rare Bey Get Battle 機率追蹤１</a><time>2017-11</time></p>
    <p><a href='RBGBChance2.php'>Rare Bey Get Battle 機率研究２</a><time>2017-08</time></p>
    <p><a href='RBGBChance1.php'>Rare Bey Get Battle 機率研究１</a><time>2017-08</time></p>
    <p><a href='../MFB'>鋼鐵世代商品目錄（香港）</a><time>2017-07</time></p>
</main>
<?php include '../tools/platonic.php' ?>