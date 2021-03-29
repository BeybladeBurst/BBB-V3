<!DOCTYPE HTML>
<?php include_once '../include/head.php'; head() ?>     
<title>商品介紹 Product Promotion｜Beyblade Burst ベイブレードバースト</title>  
<style>     
main     
{padding-left:0;padding-right:0;}     
section     
{display:flex;flex-wrap:wrap;justify-content:center;align-items:flex-end;}     
img    
{padding:0.2em;width:50%;max-width:300px;cursor:pointer;}     
</style>     
    
<?php nav(['/products','/parts'],['陀螺<br>Beyblades','部件<br>Parts']) ?>     
<main>     
    <section></section>       
</main>     
<script src='brochure.js'></script>
<script>
display(163,133);
var bottom=0;
$(window).scroll(x=>{
    if ($(window).scrollTop()>=$(document).height()-$(window).height()-150) {
        bottom++;
        if (bottom==1)
            return display(132,104);
        if (bottom==2)
            return display(103,73);
        if (bottom==3)
            return display(71,34);
        if (bottom==4)
            return display(31,1);
    }
});
function display(from,to)
{
    const link='https://beyblade.takaratomy.co.jp/category/img/products/bey_b';
    for (i=from;i>=to;i--)
        $.each(brochure(i),(k,i)=>$('section').append(`<img onclick=window.open('${link}${i}') onerror='this.style.display="none"' src='${link}${i}'>`));
}
</script>