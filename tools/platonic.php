<style>
    figure,div:not(.cube),svg {
        width:var(--diameter);height:var(--diameter);
        transform-style:preserve-3d;
    }
    figure {
        text-align:left;
        z-index:-2;
        position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);
        display:inline-flex;justify-content: center;align-items: center;
        width:calc(var(--diameter)*1.5);height:calc(var(--diameter)*1.5);
        --stroke:0.02;--stroke-percent:calc(100%*var(--stroke));
        perspective:200em;
        margin:0;
    }
    div:not(.cube),svg {
        position:absolute;
        overflow:visible;
    }
    polygon {
        stroke:hsl(var(--c),50%,50%);stroke-width:var(--stroke);
        fill:hsla(var(--c),80%,80%,0.75);
    }
    .vertex-1 {transform:translateZ(calc(var(--extend)*var(--diameter)/-2));}
    .vertex-2 {transform:rotateY(180deg) translateZ(calc(var(--extend)*var(--diameter)/-2));}
    
    [class="3-gon"] [class|=vertex] svg {
        right:calc(50% + var(--stroke-percent)/4*2);
        transform-origin:calc(100% + var(--stroke-percent)/4*2) 50%;
        transform:rotate(var(--r)) rotate3d(0,1,0,var(--slant));
    }

    #icosahedron {
        --widen:calc(var(--midHeight)/2);
        --extend:calc(var(--widen) + var(--height));
    }
    .mid-1 {transform:translateZ(calc(var(--widen)*var(--diameter)/2));}
    .mid-2 {transform:rotateY(180deg) translateZ(calc(var(--widen)*var(--diameter)/2));}
    
    [class|=mid] svg {
        left:calc(25% + var(--stroke-percent)/4);
        transform-origin:calc(25% - var(--stroke-percent)/4) 50%;
        transform:rotate(var(--r)) translateX(calc(var(--diameter)/2*var(--normal))) rotate3d(0,1,0,var(--midSlant));
    }

    #tetrahedron svg:only-of-type {transform:translateZ(calc((var(--height) - var(--extend))*var(--diameter)/2));}

    #dodecahedron svg:not(:last-child) {
        transform-origin:var(--originX) var(--originY);
        transform:rotate3d(var(--vectorX),calc(-1*var(--vectorY)),0,calc(-1*var(--slant))) rotate(108deg);
    }
</style>

<template>
    <figure id='tetrahedron' class='3-gon'>
        <div class='vertex-1'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
        <svg><polygon/></svg>
    </figure>    
    <figure id='octahedron' class='3-gon'>
        <div class='vertex-1'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
        <div class='vertex-2'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
    </figure>
    <figure id='dodecahedron' class='5-gon'>
        <div class='vertex-1'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
        <div class='vertex-2'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
    </figure>
    <figure id='icosahedron' class='3-gon'>
        <div class='vertex-1'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
        <div class='vertex-2'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
        <div class='mid-1'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
        <div class='mid-2'>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
            <svg><polygon/></svg>
        </div>
    </figure>
</template>

<script>
document.querySelectorAll('template').forEach(temp=>document.querySelector('main').appendChild(document.importNode(temp.content,true)));
</script>

<script>
class Gon {
    constructor(n) {
        this.n=n;
        this.stroke=parseFloat(getComputedStyle(document.querySelector(document.currentScript.getAttribute('rel'))).getPropertyValue('--stroke'));
    }
    static points(n) {
        let points='';
        for (let i=0;i<=n-1;i++)
            points+=Math.cos(2*Math.PI/n*i)+','+Math.sin(2*Math.PI/n*i)+' ';
        document.querySelectorAll(`[class="${n}-gon"] polygon`).forEach(gon=>{
            gon.setAttribute('points',points);
            gon.setAttribute('style','--c:'+Math.random()*360); 
        });
    }
    halfAngle()  {return (this.n-2)/this.n/2*Math.PI;}
    get normal() {return Math.sin(this.halfAngle())+this.stroke/2;}
    get side()   {return this.normal/Math.tan(this.halfAngle())*2;}
    get strokedRadius() {return this.normal/Math.sin(this.halfAngle());}
    get height() {return this.strokedRadius*(1+Math.cos(2*Math.PI/this.n/2));}
}
class TriangleVertex {
    constructor(n) {
        this.n=n;
        this.tri=new Gon(3);
        for (let i=1;i<=n;i++)
            document.querySelectorAll(document.currentScript.getAttribute('rel')+` svg:nth-child(${i})`).forEach(svg=>svg.style.setProperty('--r',360/n*i+'deg'));
    }
    get normal()    {return this.tri.side/2/Math.tan(2*Math.PI/this.n/2);}
    get slant()     {return Math.acos(this.normal/this.tri.height);}
    get height()    {return Math.sin(this.slant)*this.tri.height;}
    get radius()    {return this.tri.side/2/Math.sin(2*Math.PI/this.n/2);}
    get midSlant()  {return Math.acos((this.radius-this.normal)/this.tri.height);}
    get midHeight() {return Math.sin(this.midSlant)*this.tri.height;}
}

document.querySelectorAll('svg').forEach(svg=>svg.setAttribute('viewBox','-1,-1 2,2'));
Gon.points(3);Gon.points(5);
document.querySelector(':root').setAttribute('style','--x:'+Math.random()+';--y:'+Math.random()+';--z:'+Math.random());

let vertex;
</script>

<script rel='#icosahedron'>
vertex=new TriangleVertex(5);
document.querySelector('#icosahedron').setAttribute('style','\
    --normal:'+vertex.normal+';\
    --slant:'+vertex.slant+'rad;\
    --height:'+vertex.height+';\
    --midSlant:'+vertex.midSlant+'rad;\
    --midHeight:'+vertex.midHeight);
</script>

<script rel='#octahedron'>
vertex=new TriangleVertex(4);
document.querySelector('#octahedron').setAttribute('style','\
    --slant:'+vertex.slant+'rad;\
    --extend:'+vertex.height);
</script>

<script rel='#tetrahedron'>
vertex=new TriangleVertex(3);
document.querySelector('#tetrahedron').setAttribute('style','\
    --slant:'+vertex.slant+'rad;\
    --height:'+vertex.height+';\
    --extend:'+(Math.pow(vertex.tri.strokedRadius,2)+Math.pow(vertex.height,2))/2/vertex.height);
</script>

<script rel='#dodecahedron'>
let penta=new Gon(5);

for (let i=0;i<=4;i++) {
    let x=Math.cos(2*Math.PI/5*i);
    let y=Math.sin(2*Math.PI/5*i);
    let vectorX=Math.cos(2*Math.PI/5*(i+1))-x;
    let vectorY=Math.sin(2*Math.PI/5*(i+1))-y;
    document.querySelectorAll(`#dodecahedron svg:nth-child(${i+1})`).forEach(svg=>svg.setAttribute('style','\
    --originX:'+(x*penta.strokedRadius/2+0.5)*100+'%;--originY:'+(-y*penta.strokedRadius/2+0.5)*100+'%;\
    --vectorX:'+vectorX+';--vectorY:'+vectorY));
}

let pentaDiagonal=penta.side*Math.cos(Math.PI*(1-3/5)/2)*2;
let vertexNormal=pentaDiagonal/2/Math.tan(Math.PI/5);
let heightToDiagonal=penta.side*Math.cos(Math.PI*(3/5-1/2));

let vertexSlant=Math.acos((vertexNormal-penta.normal)/heightToDiagonal);
let extend=(penta.height+heightToDiagonal)*Math.sin(vertexSlant)/-2;

document.querySelector('#dodecahedron').setAttribute('style','\
    --slant:'+vertexSlant+'rad;\
    --extend:'+extend);
</script>

<script>
document.querySelectorAll('figure').forEach((fig,i)=>{
    fig.style.setProperty('--diameter',(Math.random()*4+3-i)+'em');
    fig.style.animation=`turning${i} ${Math.random()*20+20}s ease-in-out infinite alternate`;
    document.getElementsByTagName('style')[0].insertAdjacentHTML('beforeend',`\
        @keyframes turning${i} {\
        0% {transform:${rotate(2000)} ${translate(40)};}\
        100% {transform:${rotate(2000)} ${translate(40)};} }`);    
});
function rotate(d)
{ return `rotate3d(${rand(1)},${rand(1)},${rand(1)},${rand(d)}turn)`; }
function translate(p)
{ return `translate3d(${rand(p)}vw,${rand(p)}vh,${rand(p)}vmin)`; }
function rand(r)
{ return (Math.random()*2-1)*r; }
</script>