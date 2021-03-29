<script>
<?php
    if (!isset($_GET['type'])) exit();
    
    $t=$_GET['type'];
    switch ($t) {
        case 'bl-r': echo "
            cell('st','bl-r-na.jpg','B-08 BA-01','$t');
            cell('b','bl-r-^b.png','BBG-03','$t');
            cell('st','bl-r-b.jpg','B-38','$t');
          
            cell('b','bl-r-r.jpg','B-16 B-108 BA-01','$t');
            cell('st','bl-r-^r.jpg','B-76','$t');
            cell('l','bl-r-^ma.jpg','限定<br><a href=\"http://beybladeburstnews.tumblr.com/post/153468037064/%E3%82%A4%E3%82%AA%E3%83%B3%E9%99%90%E5%AE%9A-%E3%83%99%E3%82%A4%E3%83%96%E3%83%AC%E3%83%BC%E3%83%89%E3%83%90%E3%83%BC%E3%82%B9%E3%83%88%E3%82%AD%E3%83%A3%E3%83%B3%E3%83%9A%E3%83%BC%E3%83%B3%E8%B1%AA%E8%8F%AF%E3%82%B0%E3%83%83%E3%82%BA%E3%82%92%E5%A4%A7%E5%85%AC%E9%96%8B\">購物抽獎</a>','$t');
          
            cell('b','bl-r-bl.jpg','B-78','$t');
            cell('st','bl-r-^bl+b.png','「超Ｚ改造セット」<br>《コロコロ ver》','$t');
            cell('s','bl-r-^bl.jpg','BBG-02','$t');
          
            cell('b','bl-r-wh.jpg','B-39','$t');
            cell('st','bl-r-^wh.png','「神改造セット」<br>《コロコロ ver》','$t')   
            cell('s','bl-r-^y.jpg','B-23','$t');
            cell('s','bl-r-p.jpg','B-14','$t')  
            cell('l','bl-r-go.png','G2 大會優勝賞品','$t');
            cell('l','bl-r-si.png','G2 大會優勝賞品','$t');
            cell('l','bl-r-br.png','G2 大會優勝賞品','$t');"; 
        break;
        
        case 'bl-l': echo "
            cell('l','https://charahiroba.com/img/trans/contents/2958_p_thu.jpg','「みんなのくじ」<br>抽奬：2018－C賞','$t');
            cell('s','bl-l-^bl.png','BBG-09','$t');
            cell('b','bl-l-^wh.jpg','B-99','$t');
            cell('s','bl-l-wh.jpg','B-66','$t');"; 
        break;
        
        case 'bl-lr': echo "  
            cell('b','bl-lr-go.jpg','BBG-17','$t');
            cell('b','bl-lr-b.jpg','B-119','$t');
            cell('b','bl-lr-r.jpg','B-88','$t');"; 
        break;
          
        case 'lbl-r': echo "
            cell('st','lbl-r-b.jpg','BBG-26','$t');
            cell('l','lbl-r-o.jpg','棒球比賽活動抽獎','$t');
            cell('b','lbl-r-^b.jpg','B-137','$t');
            cell('b','lbl-r-go.jpg','BBG-23','$t');
            cell('st','lbl-r.jpg','B-123','$t');"; 
        break;
        
        case 'lbl-l': echo "
            cell('st','lbl-l-wh.jpg','BBG-26','$t');
            cell('b','lbl-l-^bl.jpg','B-141','$t');
            cell('b','lbl-l-si.jpg','BBG-24','$t');
            cell('st','lbl-l.jpg','B-124','$t');"; 
        break;
        
        case 'lbl-lr': echo "
            cell('s','lbl-lr-bl.jpg','B-155','$t');
            cell('b','lbl-lr-go.jpg','BBG-29','$t');
            cell('s','lbl-lr-r.jpg','B-129','$t');"; 
        break;
          
        case 'blh': echo "
            cell('st','blh.jpg','B-64','$t');"; 
        break;
        
        case 'bls': echo "
            cell('st','bls.jpg','B-65','$t');"; 
        break;
          
          
        case 'pl': echo "
            cell('s','pl-wh.jpg','B-29 B-30','$t');
            cell('st','pl-gr.jpg','B-62','$t');
            cell('l','pl-g.png','限定<br><a href=\"https://precam.club/1917\">購物抽獎</a>','$t');"; 
        break;
          
        case 'el-r': echo "
            cell('s','el-r-bl.jpg','B-73 B-74 B-92','$t');
            cell('s','el-r-gr.jpg','B-104 B-105<br>B-120 B-127','$t');"; 
        break;
          
        case 'el-l': echo "
            cell('s','el-l-wh.jpg','B-79 B-97<br>B-110 B-122','$t');"; 
        break;
          
        case 'll-r': echo "
            cell('s','pll-r.png','附更長的<br>「Phoenix Winder」拉弦<br>B-117','$t very-long');
            cell('b','lll-r-pe.jpg','附較長拉弦<br>B-138','$t long');
            cell('b','lll-r-o.jpg','附較長拉弦<br>B-45','$t long');
            cell('st','lll-r-^b.jpg','附較長拉弦<br>B-22','$t long');
          
            cell('st','ll-r-lbl.jpg','B-136','$t');
            cell('st','ll-r-whr.jpg','B-136','$t');
            cell('st','ll-r-p.jpg','BA-03','$t');
            cell('st','ll-r-r.png','B-18<br>B-107','$t');
            cell('st','ll-r-b.png','B-18<br>B-107','$t');
            cell('s','ll-r-bl.jpg','B-34 B-35<br>B-41 B-59','$t');
            cell('s','ll-r-wh.jpg','B-01 B-02 B-03<br>B-04 B-12 B-31','$t');
            cell('l','ll-r-go.png','大會優勝賞品','$t');
            cell('l','ll-r-si.png','大會優勝賞品','$t');
            cell('l','ll-r-br.png','大會優勝賞品','$t');"; 
        break;
          
        case 'll-l': echo "
            cell('s','ll-l-go.jpg','B-139','$t');
            cell('b','ll-l-wh.jpg','B-81 BA-03','$t');"; 
        break;
        
        case 'll-lr': echo "
            cell('st','https://dbcn1bdvswqbx.cloudfront.net/client_info/SHOPRO/itemimage/P57906001/P57906001_1b.jpg','附更長的<br>「Dragon Winder」拉弦<br>「レジェンドスターベイセット」','$t very-long');
            cell('s','ll-lr-bl-dw.jpg','附更長的<br>「Dragon Winder」拉弦<br>B-145','$t very-long');
            cell('s','ll-lr-dw.jpg','附更長的<br>「Dragon Winder」拉弦<br>B-133','$t very-long');
            cell('b','lll-lr-wh.jpeg','附較長拉弦<br>B-112','$t long');
            cell('s','lll-lr-bl.jpg','附較長拉弦<br>B-100','$t long');
            cell('s','lll-lr-go.png','附較長拉弦<br>BBG-13','$t long');
          
            cell('s','ll-lr-r.jpg','B-86','$t');"; 
        break;
          
        case 'sl': echo "
            cell('s','sl-r.jpg','B-48','$t');
            cell('b','sl-b.jpg','B-70','$t');"; 
        break;
        
        case 'dsl': echo "
            cell('b','dsl-b.jpg','B-93','$t');
            cell('b','dsl-r.jpg','B-94','$t');"; 
        break; 
          
        case 'lg': echo "
            cell('st','https://dbcn1bdvswqbx.cloudfront.net/client_info/SHOPRO/itemimage/P57906001/P57906001_1b.jpg','「レジェンドスターベイセット」','$t');
            cell('b','lg-wh.jpg','B-11','$t');
            cell('b','lg-bl.jpg','B-40','$t');
            cell('b','lg-me.jpg','B-109','$t');
            cell('st','lg-^b.jpg','B-18 BA-01','$t');
            cell('st','lg-^r.jpg','B-18 BA-01','$t');
            cell('st','lg-^wh.png','「神改造セット」<br>《コロコロ ver.》','$t');
            cell('st','lg-^bl.jpg','「超Ｚ改造セット」<br>《コロコロ ver.》','$t');
            cell('l','https://charahiroba.com/img/trans/contents/780_p_thu.jpg','「みんなのくじ」<br>抽獎：2016－B賞','$t');
            cell('l','lg-go.png','G3 大會優勝賞品','$t');
            cell('l','lg-si.png','G3 大會優勝賞品','$t');
            cell('l','lg-br.png','G3 大會優勝賞品','$t');"; 
        break;
        
        case 'plg': echo "
            cell('st','plg-^bl.jpg','B-21','$t');
            cell('st','plg-r.jpg','B-123','$t');
            cell('b','plg-^wh.jpg','BBG-05','$t');"; 
        break;
        
        case 'rlg': echo "
            cell('st','rlg-^wh.jpg','B-76','$t');
            cell('b','rlg-r.jpg','BBG-10','$t');
            cell('b','rlg-^r.jpg','BBG-16','$t');"; 
        break;
        
        case 'cg': echo "
            cell('b','cg-r.jpg','B-58');
            cell('st','cg-^y.jpg','B-124');
            cell('l','https://charahiroba.com/img/trans/contents/1040_p_thu.jpg','「みんなのくじ」<br>抽獎：2017－B賞');"; 
        break;
        
        case 'kg': echo "
            cell('b','kg.jpg','B-83');"; 
        break;
        
        case 'ra': echo "
            cell('b','ra.jpg','B-26');"; 
        break;
        
        case 'gr': echo "
            cell('b','gr-^b.jpg','B-43');
            cell('b','gr-p.jpg','B-116');"; 
        break;
        
        case 'gw': echo "
            cell('b','gw-o.jpg','B-60');
            cell('b','gw-bl.jpeg','B-114');"; 
        break;
        
        case 'pt': echo "
            cell('b','pt-bl.jpg','B-72');
            cell('st','pt-r.jpg','B-123');"; 
        break;
        
        case 'ag': echo "
            cell('b','ag.jpg','B-25');"; 
        break;
        
        case 'wd': echo "
            cell('b','wd-^y.jpg','B-47');
            cell('st','wd-^bl.jpg','B-124');"; 
        break;
        
        case 'ssr': echo "
            cell('b','ssr.jpg','B-32');"; 
        break;
        
        case 'fb': echo "
            cell('b','fb.jpg','B-51');";
    }
?>
function cell(classes,img,no,type='')
{ 
    if (classes==='s') no+='<br>Starter 隨附';
    else if (classes==='b') no+='<br>獨立發售';
    else if (classes==='st') no+='<br>Set 內含';
    
    if (img.indexOf('http')===-1)
        img=(type!=='' && type.indexOf('lg')===-1)? '/img/launchers/'+img:'/img/grips/'+img
    
    $('#popup+label').append(
    `<div class="${classes} ${type}">
        <p><img src=${img}></p>
        <p>${no}</p>
    </div>`);  
}
</script>