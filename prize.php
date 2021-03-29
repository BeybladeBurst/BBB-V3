<!DOCTYPE HTML>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/include/head.php'; head() ?>
<title>Prize ￭ 景品 ｜ Beyblade Burst ￭ ベイブレードバースト</title>
<link rel="stylesheet" href="/include/carousel.css">
<script src='/include/carousel.js'></script>
<?php nav(['/','/parts'],['home','部件<br>Parts'],' ') ?>
<main><div class='tips' style='margin-bottom:1em'>要查看非 Layer 的景品，請<a href='/articles/BHothers.php'>按此</a></div></main>
<script>
    <?php $imgs=[];
    for ($i=6;$i>=1;$i--)
        $imgs[]="/img/Prize$i.jpg?".filemtime($_SERVER['DOCUMENT_ROOT']."/img/Prize$i.jpg"); ?>
    (new Carousel(<?php echo json_encode($imgs) ?>)).build();
</script>