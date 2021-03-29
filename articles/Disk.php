<!DOCTYPE html>
<?php require_once '../include/head.php';head() ?>
<meta name="format-detection" content="telephone=no">
<title>研究｜Beyblade Burst ベイブレードバースト</title>
<style>
table
{
    perspective:200em;
    margin:auto;
    --width:4.5rem;width:var(--width);
    --height:2.5rem;height:calc(var(--height)*12);
    --extend:calc(var(--width)*var(--amount)/2/3);
    perspective-origin:50% 150%;
    -webkit-perspective-origin:50% 150%;
    cursor:grab;
}
tbody
{                                                            
    --spin:calc(360deg/var(--amount)*(var(--checked) - 1)); 
    transform:translateZ(calc(-1*var(--extend))) rotateY(calc(-1*var(--spin)));
    transform-style:preserve-3d;
    position:relative;
    transition:1s;
}
tr
{
    --position:calc(360deg/var(--amount)*(var(--index) - 1));
    transform:rotateY(var(--position)) translateZ(var(--extend));
    position:absolute;
    width:100%;
    transition:1s;
    user-select:none;-webkit-user-select:none;
}
td
{
    display:flex;justify-content:center;align-items:center;
    height:var(--height);
    margin:0.2em 0;
    border:0.1em solid;
    background:hsl(0,0%,100%,0.9);
    position:relative;
    z-index:0;
    font-size:1.3em;white-space:nowrap;
}
.front,.side {z-index:1;}
tr:not(.front) {filter:blur(0.1em);}
tr.side {filter:blur(0.05em);}
td:nth-child(1) {color:sienna;}
td:nth-child(2) {color:gold;}
td:nth-child(3) {color:forestgreen;}
td:nth-child(4) {color:dodgerblue;}
td:nth-child(5) {color:slateblue;}
td:nth-child(6) {color:darkorchid;}
td:nth-child(7) {color:crimson;}
td:nth-child(8) {color:black;}

td:empty {border-color:silver;}
td:empty::before {color:hsl(0,0%,70%,0.5);}
td::before
{
    position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);
    font-size:2rem;font-style:italic;font-family:'ANC','AN';
    z-index:-1;
}
dl {margin:0;}
dl::before {content:'圖例\A';white-space:pre;}
dd {display:inline;margin:0;}
dt {display:inline-block;width:2em;}
</style>

<?php nav(['/articles','/'],['back','home']) ?>
<main>
    <h1>顏色數字鐵</h1>
    <aside>2019-05-02</aside><br><br>
    <article>
        <p>下筒顯示了各款有塗裝的數字鐵取得方式，供有志收集人士查閱。請以滑鼠／手指拉動。</p>
        <p>只以所顯示的色系區分。由上至下︰銅・黃/金・綠・藍・紫藍・紫・紅・黑。同一色系的差別，如藍色實際有「青藍」、「天藍」、「海藍」色，將不再細分。</p>
        <dl>
            <dt>🎰<dd>コロコロ雜誌抽選（100 / 321 / 1000 名）<br>
            <dt>🥇<dd>G1 大會第一名賞品<br>
            <dt>🥉<dd>G1 大會第三名賞品<br>
            <dt>🥈<dd>G4 大會第二名賞品<br>
            <dt>🎫<dd>みんなのくじ獎券賞<br>
            <dt>🈂️<dd>コロコロ雜誌全員service應募品<br>
            <dt>💻<dd>コロコロ網店商品<br>
            <dt>🛒<dd>B-商品<br>
            <dt>🛍️<dd>BBG/BA-商品<br>
            <dt>🎮<dd>遊戲軟件同綑品<br>
            <dt>🎁<dd>購物滿額贈品<br>
        </dl>
    </article>
    <table>
        <tbody style="--checked:1">
            <!--   Br          Go/Y         G           B          PB          P           R       　 Bl -->
            <tr><td></td>  <td>🛍️</td>  <td></td>  <td>🎰🛍</td><td></td>  <td></td>  <td>🎰🛍</td>  <td>💻</td> <!--00-->
            <tr><td></td>  <td>🛍️🥈</td><td></td>  <td></td>    <td></td>  <td>🈂️</td><td>🎰💻</td><td>🎰💻</td> <!--0-->
            <tr><td></td>  <td>🎰</td>  <td></td>  <td></td>    <td></td>  <td></td>  <td></td>    <td></td> <!--1-->
            <tr><td></td>  <td></td>    <td></td>  <td></td>    <td></td>  <td></td>  <td>🛍️</td>  <td></td> <!--1'-->
            <tr><td></td>  <td>🥈</td>  <td></td>  <td>💻</td>  <td></td>  <td></td>  <td></td>    <td></td> <!--2-->
            <tr><td></td>  <td></td>    <td></td>  <td>🎮</td>  <td></td>  <td></td>  <td>🛒</td>  <td></td> <!--3-->
            <tr><td></td>  <td></td>    <td></td>  <td>💻</td>  <td></td>  <td></td>  <td>🛒</td>  <td>🥈🛍💻️</td> <!--4-->
            <tr><td></td>  <td>🎁</td>  <td></td>  <td></td>    <td></td>  <td></td>  <td></td>    <td></td> <!--5-->
            <tr><td>🥉</td><td>🥇</td>  <td></td>  <td>🎰</td>  <td></td>  <td>💻</td><td>🎰</td>  <td></td> <!--6-->
            <tr><td></td>  <td>🛍️</td>  <td>🛒</td><td></td>    <td></td>  <td></td>  <td>🎰🎁</td><td>🈂️</td> <!--7-->
            <tr><td></td>  <td></td>    <td></td>  <td>🎫🈂️</td><td></td>  <td>🎰</td><td>🎫</td>  <td></td> <!--8-->
            <tr><td></td>  <td>🎰</td>  <td></td>  <td></td>    <td></td>  <td></td>  <td></td>    <td>💻</td> <!--8'-->
            <tr><td></td>  <td>🎰🈂️</td><td>🛍️</td><td>🎰</td>  <td></td>  <td></td>  <td>🈂️</td>  <td></td> <!--10-->
            <tr><td>🥉</td><td>🥇</td>  <td></td>  <td>🎰💻</td><td></td>  <td></td>  <td>🛒</td>  <td></td> <!--11-->
            <tr><td></td>  <td></td>    <td></td>  <td>🛒</td>  <td>💻</td><td></td>  <td></td>    <td></td> <!--12-->
            <tr><td></td>  <td>🎰</td>  <td></td>  <td></td>    <td></td>  <td></td>  <td></td>    <td></td> <!--13-->
        </tbody>
    </table>
</main>
<script>
let amount=null;
document.querySelectorAll('tr').forEach((tr,i)=>{tr.style.setProperty('--index',i+1);amount=i+1;});
document.querySelector('table').style.setProperty('--amount',amount);
spin(0);
function spin(n) {
    const cylinder=document.querySelector('tbody');
    cylinder.querySelectorAll('tr').forEach(tr=>tr.removeAttribute('class'));
    const k=parseInt(getComputedStyle(cylinder).getPropertyValue('--checked'))+n;
    cylinder.style.setProperty('--checked',k);
    for (let i=-3;i<=3;i++)
        cylinder.querySelector(`tr:nth-child(${(k+9*amount-1+i)%amount+1})`).classList.add(Math.abs(i)==3? 'side':'front');
}
const disks=['00','0','1','1′','2','3','4','5','6','7','8','8′','10','11','12','13'];
for (let i=1;i<=16;i++)
    document.querySelector('style').append(`tr:nth-child(${i}) td::before {content:"${disks[i-1]}"}`)
</script>
<script>
let start=end=null;
const table=document.getElementsByTagName('table')[0];
table.addEventListener('mousedown',e=>start=event.clientX);
table.addEventListener('touchstart',e=>start=event.touches[0].clientX);
table.addEventListener('mousemove',e=>{
    if (!start) return;
    end=event.clientX;
    const diff=-parseInt((end-start)/50);
    if (Math.abs(diff)>=1) {
        spin(diff);
        start=end;
    }
});
table.addEventListener('touchmove',e=>{
    if (!start) return;
    end=event.touches[0].clientX;
    const diff=-parseInt((end-start)/50);
    if (Math.abs(diff)>=1) {
        spin(diff);
        start=end;
    }
});
document.addEventListener('mouseup',e=>start=null);
document.addEventListener('touchend',e=>start=null);
</script>