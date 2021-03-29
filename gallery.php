<!DOCTYPE HTML>
<?php require_once 'include/head.php';head() ?>
<title>圖片庫 Gallery｜Beyblade Burst ベイブレードバースト</title>
<style>
main
{padding-left:0;padding-right:0;}
section
{margin-bottom:2em;}
h2
{
    width:100%;display:block;
    border-top:0.1em solid; border-bottom:0.1em solid;
    padding:0.5em 0; margin:1em 0 1em 0;
    font-size:1.1em;
}
#anime label,#anime img,#rb h3,#product div::after
{cursor:pointer;}

#popup+label a:link,#popup+label a:visited
{
    color:white;background:orange;
    width:15em;display:block;
    padding:0.2em 1em;margin:1em auto;
    border-radius:3em;
}
#popup+label a[href=undefined],#popup+label img+div
{display:none;}

#product div
{font-size:1.5em;}
#product div input,#product div::before,#product div::after
{vertical-align:middle;}
#product input
{
    border:0.1em solid grey;border-radius:10em;
    margin:0 0.2em 0 0;padding:0 0.2em;
    width:3em;
    font-size:1em;
}
#product div::before
{content:'B-';}
#product div::after
{
    font-size:1.3em;margin-right:0.2em;
    content:"\f35a";font-family:'Font Awesome 5 Free';
    max-height:1em;display:inline-block;
}

#rb h3
{
    display:inline-block;width:7em;
    margin:0.5em 0.5em;padding:0.2em 0;
    background:hsl(140,100%,80%);
    transform:skew(-15deg);
}
#rb h3:nth-of-type(n+3)
{background:hsl(0,100%,80%);}
#rb h3:nth-of-type(n+6)
{background:hsl(200,100%,80%);}
#rb h3:nth-of-type(n+10)
{background:hsl(140,0%,80%);}
#rb h3:nth-of-type(n+15)
{background:hsl(50,100%,80%);}

#anime input,#anime input+p
{display:none;}
#anime input:checked+p
{display:initial;}
#anime label
{
    display:flex;align-items:center;justify-content:flex-start;
    background:url(https://www.beyblade.jp/god/img/common/bg_pat01.png) repeat;
    margin:0.5em auto;padding:0.5em 1em;
    width:90%;
    transform:skew(-15deg);
}
#anime label img
{height:3em;transform:skew(15deg);}
#anime p img
{width:4.5em;margin:0 0.1em;}

aside
{margin-right:1em;}
textarea
{width:95%;max-width:800px;height:20em;font-family:monospace;color:white;}
</style>
<script>
const pic=href=>
{
    $('#popup').click();
    href.forEach(h=>{
        if (!h.includes('https') && !h.includes('RB'))
            h='https://beyblade.takaratomy.co.jp/category/img/products/bey_b'+h;
        $('#popup+label').prepend(`<img onerror="this.style.display='none'" src="${h}">`);
    });
}
const display=(pos,url,data='')=>$(pos).append(`<img onerror="this.style.display='none'" data="${data}" src="${url}">`);
const links=href=>[...$('#popup+label a')].map((a,i)=>a.href=href[i]);
</script>

<?php nav(['/','guide.php'],['home','教學<br>Guide']); ?>
<input type='checkbox' id='popup'>
<label for='popup'>
    <div>
        <a href class='char'>角色</a>
        <a href class='bey'>陀螺</a>
        <a href class='avatar'>陀螺 motif avatar</a>
    </div>
</label>

<main>
    <section id='product'>
        <h2>商品</h2>
        <div><input type='number'></div>
    </section>
    <section id='rb'>
        <h2>隨機抽包</h2>
    </section>
    <section id='anime'>
        <h2>動畫</h2>
        <label for='gt'><img src='/img/system-GT.png'></label>
        <input type='checkbox' id='gt'>
        <p></p>
        <label for='z'><img src='/img/system-Z.png'></label>
        <input type='checkbox' id='z'>
        <p></p>
        <label for='god'><img src='/img/system-god.png'></label>
        <input type='checkbox' id='god'>
        <p></p>
        <label for='dual'><img src='/img/system-dual.png'></label>
        <input type='checkbox' id='dual'>
        <p></p>
    </section>
</main>

<script src='products/brochure.js'></script>
<script>
let beys={};
const namesGT=['','drum','valt','amane','fumiya','joe','lodin','delta','hope','blind','aiga','arthur','gwyn'];
const namesZ=['','aiga','valt','fubuki','ranjiro','lui','houi','suoh','phi','laban','xhan','kyle','free','hearts','night','evel','shu','kit'];
const url={
    'GT':'https://www.beyblade.jp/gati/wp-content/themes/gati/img/character/',
    'Z':'https://www.beyblade.jp/chozetsu/wp-content/themes/chozetsu/img/character/',
    'god':'https://www.beyblade.jp/god/img/anime/chara/ch',
    'dual':'https://www.beyblade.jp/bbb/img/chara',
};
//fetch('products/beys.txt').then(response=>response.json()).then(json=>beys=json);
$(document).ready(function() {
    if ($('#popup:checked').length==1)
        $('#popup').click();
    $('#product div').on('click',function(clicked) {
        let i=$('#product input').val();
        if (isNaN(i) || !i || clicked.target.nodeName=='INPUT') return;
        gtag('event',`${i}`,{'event_category':'gallery-product'});
        
        // let images=[];
        // if ((bey=beys.find(bey=>bey.no==`B-${i}`)).images===undefined) 
        //     ['L','C',1,2,3,4,5,7,8].forEach(i=>images.push(`https://dmwysfovhyfx3.cloudfront.net/img/goods/${i}/4904810${bey.code}.jpg`)); 
        // else bey.images.forEach(img=>images.push(`https://dmwysfovhyfx3.cloudfront.net/img/goods/${img}.jpg`));
        
        let u=(i>=129 && i<=132 || i>=139 && i<=154 || i>=159)? '-':'_';
        u=(i==141)? '':u;
        pic([`https://beyblade.takaratomy.co.jp/category/img/products/B${u}${i}.png`].concat(brochure(i)));
    });
    for (let i=1;i<=19;i++)
        $('#rb').append(`<h3 onclick='pic(["/img/RB/RB${i}.jpg"]);gtag("event","1",{"event_category":"gallery-RB"});'>Volume ${i}</h3>`);

    for (let c=1;c<=19;c++) {
        id=('00'+c).slice(-3);
        display('#gt+p',url.GT+`link__${id}_on.png`,id+namesGT[c]);
        display('#z+p',url.Z+`link__${id}.png`,id+namesZ[c]);

        id=('0'+c).slice(-2);
        display('#god+p',url.god+id+'_btn'+ (c==11||c==12? '_01.png':'.png'),id);
        display('#dual+p',url.dual+`/chara${id}_thm.png`,id);
    }

    $('#anime p img').click(function() {
        gtag('event','1',{'event_category':'gallery-anime'});
        $('#popup').click();
    });
    $('#gt+p img').click(function() {
        let id=$(this).attr('data').slice(0,3);
        let name=$(this).attr('data').slice(3);
        links([`bg_character__${id}.jpg`, (name=='hope'? 'pot':name)+'/beyblade'+(name=='drum'? '_Imperial':'')+'.png'].map(h=>url.GT+h));
    });
    $('#z+p img').click(function() {
        let id=$(this).attr('data').slice(0,3);
        let name=$(this).attr('data').slice(3);
        links([`bg_character__${id}.jpg`, name+'/beyblade'+(name=='night'? '_right':'')+'.png', name+'/avatar.png'].map(h=>url.Z+h));
    });
    $('#god+p img').click(function() {
        let id=$(this).attr('data');
        links(['_img'+(id==11||id==12? '_01':''), '_blade_img'+(id==11? '_01':'')].map(h=>url.god+id+h+'.png'));
    });
    $('#dual+p img').click(function() {
        let id=$(this).attr('data');
        links([url.dual+`/detail${id}.png`]);
    });

    $('#popup').change(function() {
        if (!$(this).checked)
            $('#popup+label img,#popup+label span').remove(); });
});
</script>