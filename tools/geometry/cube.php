<style>
html
{
    position:relative;
    height:100%;
}
.cube
{
    position:absolute;
    left:50%;top:50%;
    transform:translate(-50%,-50%);
    perspective:2500px; z-index:-99;
    width:var(--side);height:var(--side);
    transform-style: preserve-3d;
}
.cube figure
{
    margin:0;
    position:absolute;
    font-size:var(--side);
    width:1em;height:1em;
    background:hsla(var(--c),var(--s),var(--l),var(--a));
    border:0.02em solid hsl(var(--c),var(--s),calc(var(--l) - 20%));
    box-sizing:border-box;
    transform:rotateX(var(--position)) translateZ(0.5em);
}
figure.left,figure.right
{transform:rotateY(var(--position)) translateZ(0.5em);}
figure.front
{--position:0deg;}
figure.back
{--position:180deg;}
figure.top,figure.right
{--position:90deg;}
figure.bottom,figure.left
{--position:-90deg;}
</style>
<script>
function draw(n,size=100)
{
    for (let i=1;i<=n;i++) 
    {
        let side=(Math.random()*200+size)/100;
        let hue=Math.random()*359;
        let sat=Math.random()*40+60;
        let light=Math.random()*40+60;
        let alpha=Math.random()*0.5+0.5;
        let time=Math.random()*20+20;
        document.getElementsByTagName('body')[0].insertAdjacentHTML('beforeend',"\
        <div class='cube' style='--side:"+side+"em;--c:"+hue+";--s:"+sat+"%;--l:"+light+"%;--a:"+alpha+";--time:"+time+"s'>\
            <figure class='front'></figure>\
            <figure class='back'></figure>\
            <figure class='right'></figure>\
            <figure class='left'></figure>\
            <figure class='top'></figure>\
            <figure class='bottom'></figure>\
        </div>");
        
        document.getElementsByTagName('style')[0].insertAdjacentHTML('beforeend',"\
        .cube:nth-of-type("+i+")\
        {animation:turning"+i+" var(--time) ease-in-out infinite alternate;}\
        @keyframes turning"+i+" {\
        0% {transform:"+rotate(2000)+" "+translate(40)+";}\
        100% {transform:"+rotate(2000)+" "+translate(40)+";} }");
    }
    function rotate(d)
    { return "rotate3d("+rand(1)+","+rand(1)+","+rand(1)+","+rand(d)+"turn)"; }
    function translate(p)
    { return "translate3d("+rand(p)+"vw,"+rand(p)+"vh,"+rand(p)+"vmin)"; }
    function rand(r)
    { return (Math.random()*2-1)*r; }
}
</script>
<?php if (isset($_GET['n'])) echo "<body><script>draw({$_GET['n']})</script></body>"; ?>