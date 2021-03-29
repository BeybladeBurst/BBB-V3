<?php include_once '../../include/head.php' ?>
<!DOCTYPE HTML>
<?php head() ?>
<meta property="og:image" content="http://beyblade.vocarevoproject.com/MFB/S1/pages/1.jpg">
<title>爆旋陀螺 鋼鐵戰魂｜戰鬥陀螺鋼鐵奇兵｜Metal Fight Beyblade｜メタルファイトベイブレード</title>
<style>
img
{width:100%;max-width:940px;filter:contrast(120%);}
img:first-of-type,img:last-of-type
{width:50%;max-width:470px;}
</style>

<?php nav(['../','/'],['back','home'])  ?>
<main>
    <?php for ($i=1;$i<=11;$i++) echo "<img src='pages/$i.jpg'>" ?>
</main>