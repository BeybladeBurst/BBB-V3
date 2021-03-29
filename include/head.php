<?php
date_default_timezone_set('Asia/Hong_Kong');

function head($fast=false)
{ ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138094590-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());
        gtag("config", "UA-138094590-1");
        const Q=(el,func)=>func? document.querySelectorAll(el).forEach(func):document.querySelector(el);
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/include/common.css"> <?php if (!$fast) { ?>
    <link rel="stylesheet" href="/include/fonts/fa.css"> <?php }
    
    if ($_SERVER['REQUEST_URI']=='/' or $_SERVER['REQUEST_URI']=='/parts/')
    {
        $reminder='';$part=false;
        include $_SERVER['DOCUMENT_ROOT'].'/update/time.php';
        if (isset($_COOKIE['history']))
            foreach ($update as $page=>$time)
                if (isset($_COOKIE['history'][$page]) and $time>$_COOKIE['history'][$page] or 
                   !isset($_COOKIE['history'][$page]) and (time()-$time)<604800) //7 days
                    if ($page=='products')
                        $reminder.="#contents a[href*='$page']::after,";
                    else {
                        $reminder.="main a[href$='$page.php']::after,";
                        $part=true;}
                  
        if ($part==true) $reminder.="#contents a[href*='part']::after,";
        if ($reminder!='') echo "<style>$reminder#nil {content:'❗';}</style>";
    }
}
function parts_desc($fast=false)
{ ?>
    <meta name="description" content="戰鬥陀螺 爆烈世代 ￭ 爆旋陀螺 擊爆戰魂：陀螺全種類／編號／代號／組件／配件／零件 圖鑑／一覽／列表／攻略／介紹／改造／配置。ベイブレードバースト・パーツ・レイヤー・ディスク・フレーム・ドライバー：一覧／略称／名称／情報／全集／リスト">
    <?php if (!$fast) { ?>
    <script src="require/catalog.js"></script>
    <link rel="stylesheet" href="require/catalog.css"> <?php } 
}
function nav($links,$texts,$button='')
{
    $c=rand(0,359);$s=rand(60,80).'%';$b=rand(30,60).'%';
    foreach ($texts as &$t)
        if ($t=='home') $t='<i class="fas fa-home"></i>';
        elseif ($t=='menu') $t='<i class="fas fa-list"></i>';
        elseif ($t=='back') $t='<i class="fas fa-reply"></i>';
        elseif ($t=='next') $t='<i class="fas fa-chevron-right"></i>';
    if ($button=='parts')
        $button='<li><label for="fixed">7×4</label></li>';
    echo "
    <nav style='--c:$c;--s:$s;--b:$b'>
        <a href='$links[0]'><span>$texts[0]</span></a>
        <menu>$button</menu>
        <a href='$links[1]'><span>$texts[1]</span></a>
    </nav>";
    return;
}
?>