<!DOCTYPE HTML>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/include/head.php'; head() ?>
<title>部件 ￭ Parts ￭ パーツ ｜ Beyblade Burst ￭ ベイブレードバースト</title>
<?php require_once $_SERVER["DOCUMENT_ROOT"].'/update/part-list.php'; parts_desc() ?>
<style>
section
{margin:1em auto;}
section,div
{display:flex;justify-content:center;align-items:center;}

.other
{--c:0;--s:0%;}
.layer
{--c:140;--s:80%;}
.disk
{--c:230;--s:80%;}
.driver
{--c:320;--s:80%;}
section>figure
{
    position:relative;
    width:8em;height:8em;
    background:linear-gradient(to right,hsl(var(--c),var(--s),80%),hsl(var(--c),var(--s),75%));
    margin:0 -1em 0 0;padding:1em;
    border-radius:10em;
    box-shadow:0.5em -0.5em 0.5em hsla(0,0%,0%,0.4);
}
section>figure::before
{
    content:'';display:block;
    background:white;
    width:6em;height:6em;
    border-radius:10em;
    box-shadow:inset 0.5em -0.5em 0.5em hsla(0,0%,0%,0.4);
}
section>figure::after
{
    content:'';display:block;
    width:85%;height:85%;
    position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
    filter:brightness(0%) drop-shadow(0.2em -0.2em 0.15em hsla(0,0%,0%,0.4));
}
section>div
{
    background:linear-gradient(to right,hsl(var(--c),var(--s),75%),hsl(var(--c),var(--s),60%));
    justify-content:space-evenly;
    width:16em;height:4em;
    border-top-right-radius:5em;border-bottom-right-radius:5em;
    padding-right:0.5em;margin-left:0.45em;
    box-shadow:0.5em -0.5em 0.5em hsla(0,0%,0%,0.4);
    z-index:1;
    position:relative;
}
section .window
{
    width:100%;height:100%;
    overflow:hidden;
    justify-content:flex-start;
    border-top-right-radius:5em;border-bottom-right-radius:5em;
    margin-left:0.1em;
}
section:not(.layer) a
{
    background:hsl(var(--c),var(--s),75%);
    border:0.15em solid;border-color:hsl(var(--c),var(--s),50%);
    width:29%;height:2.2em;
    z-index:1;
    display:inline-flex;align-items:center;justify-content:center;
    border-radius:10em;
}
section a
{
    filter:drop-shadow(0.25rem -0.25rem 0.2rem hsla(0,0%,0%,0.4));
    font-size:0.7em;
    position:relative;
}

section:not(.layer) a:link,section:not(.layer) a:visited
{color:black;}
section a:hover
{filter:brightness(120%) drop-shadow(0.25rem -0.25rem 0.2rem hsla(0,0%,0%,0.4));}

div.tips
{margin:2em auto;}
figure span
{
    position:absolute;z-index:3;
    left:50%;top:50%;transform:translate(-50%,-50%);
    font-size:1rem;color:hsl(var(--c),100%,70%);
    -webkit-text-stroke:0.03em white;
    text-align:center;white-space:nowrap;
}
figure span ruby.below rt
{font-style:initial;font-family:AN,sans-serif;}

label 
{
    position:absolute;top:-1.3em;font-size:2.5em;
    color:hsl(var(--c),80%,50%);text-shadow:0.1em -0.1em 0.15em hsla(0,0%,0%,0.4);
}
label:last-of-type
{right:0.2em;}
label:nth-last-of-type(2)
{right:1em;}
label:nth-last-of-type(3)
{right:1.8em;}
section div>*
{transition:transform 0.5s,opacity 0.5s;}
label[for^=layer][data-move=null],input:checked+label {
    pointer-events:none;
    color:hsl(var(--c),30%,80%);
}

#diskR:checked~div a:nth-of-type(1),
#diskR:not(:checked)~div a:nth-of-type(4)
{opacity:0;}
#diskR:checked~div a
{transform:translate(-7em,0);}
.layer a:first-of-type::before 
{font-size:5em;}
.layer a:first-of-type
{min-width:6em;}
</style>

<?php nav(['/','/prize.php'],['home','<i class="fas fa-gift"></i>']) ?>
<main>
    <div class='tips'>除「重量」外，其餘數據及簡介都是直接由官網引用／翻譯，請自行判斷現實情況！</div>
    <section class='layer'>
        <figure></figure>
        <div>
            <label for='layerL' data-move=null><i class="fas fa-caret-left"></i></label>
            <label for='layerR' data-move=><i class="fas fa-caret-right"></i></label>
            <div class='window'>
                <a href='layer7s.php' title='Chassis'></a>
                <svg viewBox='0 0 15 60'><path d='M 0,0 l 15,30 l -15,30'/></svg>
                <a href='layer7r.php' title='Ring'></a>
                <svg viewBox='0 0 15 60'><path d='M 0,0 l 15,30 l -15,30'/></svg>
                <a href='layer7c.php' title='Chip'></a>
                <a href='layer6.php'></a>
                <a href='layer5b.php' title='Base'></a>
                <svg viewBox='0 0 15 60'><path d='M 0,0 l 15,30 l -15,30'/></svg>
                <a href='layer5w.php' title='Weight'></a>
                <svg viewBox='0 0 15 60'><path d='M 0,0 l 15,30 l -15,30'/></svg>
                <a href='layer5c.php' title='Chip'></a>
                <a href='layer4.php'></a>
                <a href='layer3.php'></a>
                <a href='layer2.php'></a>
                <a href='layer1.php'></a>
            </div>
        </div>
    </section>

    <section class='disk'>
        <figure><span><?php echo count($disks).'・'.(count($frames)) ?></span></figure>
        <div>
            <input type='radio' name='disk' id='diskL' checked>
            <label for='diskL'><i class="fas fa-caret-left"></i></label>
            <input type='radio' name='disk' id='diskR' >
            <label for='diskR'><i class="fas fa-caret-right"></i></label>
            <div class='window'>
                <a href='/parts/disk3.php'>
                    <svg viewBox='0 0 60 22'><rect x='0' y='0' width='60' height='22' rx='11' ry='11' /></svg>Disk 3
                </a>
                <a href='/parts/disk2.php'>
                    <svg viewBox='0 0 60 22'><path d='M 11,0 a 11,11,0,0,0,0,22 h 46 l 11,-11 l -11,-11 Z'/></svg>Core Disk
                </a>
                <a href='/parts/frame.php'>
                    <svg viewBox='0 0 60 22'><path d='M 49,0 a 11,11,0,0,1,0,22 h -51 l 11,-11 l -11,-11 Z'/></svg>Frame
                </a>
                <a href='/parts/disk1.php'>
                    <svg viewBox='0 0 60 22'><rect x='0' y='0' width='60' height='22' rx='11' ry='11' /></svg>Disk 1
                </a>
            </div>
        </div>
    </section>

    <section class='driver'>
        <figure>
            <span><?php echo count($drivers)-4 ?>＋<ruby><rb>2</rb><rt class="fas fa-bolt" style="font-size:.7em"></rt></ruby><br>
            －<ruby class="below"><rb>2</rb><rt style="margin:0 -.7em .7em -.7em">只有′</rt></ruby>＋<ruby class="below"><rb><?php echo count($dash) ?></rb><rt>&prime;</rt></span>
        </figure>
        <div>
            <a href='/parts/driver3.php'>Driver 3</a>
            <a href='/parts/driver2.php'>Driver 2</a>
            <a href='/parts/driver1.php'>Driver 1</a>
        </div>
    </section>

    <section class='other'>
        <figure></figure>
        <div>
            <a href='/parts/other.php'>Others</a>
            <a href='/parts/remake.php' class='layer'>Remake</a>
            <a href='/parts/reinforced.php' class='driver'>Driver′</a>
        </div>
    </section>
    <?php foreach ($layers as $layer) echo "<h6>$layer[2]</h6>"; foreach ($layer5b as $layer) echo "<h6>$layer[2]</h6>"; ?>
</main>

<script>
    $(document).ready(()=>$('input[name=mag],nav menu,h6').remove());
    const move=['0','-22.5','-35.5','-52.5'];
    Q('label[for=layerR').setAttribute('data-move',move[1]);
    Q('label[for^=layer]',label=>label.addEventListener('click',ev=>{
        const clicked=label.getAttribute('data-move');console.log(clicked);console.log(move.indexOf(clicked)+1);
        Q('.layer .window>*',a=>a.setAttribute('style',`transform:translate(${clicked}em)`));
        Q('label[for=layerL]').setAttribute('data-move',move[move.indexOf(clicked)-1]||null);
        Q('label[for=layerR]').setAttribute('data-move',move[move.indexOf(clicked)+1]||null);
    }));
</script>

<style>
.layer>div,.disk>div {
    padding-right:0;
}
.layer a {
    min-width:calc(3.2em/0.7);min-height:calc(3.2em/0.7);
    margin:0 0.55em;
}
.layer a[title]::before {
    content:attr(title);
    font-size:0.8rem;color:white;letter-spacing:-0.03em;
    -webkit-text-stroke:0.03em hsl(var(--c),var(--s),40%);font-weight:900;
    margin-right:.2em;
}
.layer a[title] {
    display:flex;align-items:flex-end;justify-content:flex-end;
}
.layer a[href^='layer7'] {
    background:url('/img/system-sparking.png') no-repeat center;
    background-size:contain;
    min-width:6.6em;
    margin:0 .3em 0 -.3em;
}
.layer a[href^='layer7']:first-of-type {
    margin:0 .3em 0 0;
}
.layer a[href^='layer6']
{background:url('/img/system-mugen.png') no-repeat center;background-size:contain;min-width:6.7em;}
.layer a[href^='layer5']
{background:url('/img/system-GT.png') no-repeat center;background-size:contain;min-width:5.5em;}
.layer a:nth-last-of-type(4)
{background:url('/img/system-Z.png') no-repeat center;background-size:contain;}
.layer a:nth-last-of-type(3)
{background:url('/img/system-god.png') no-repeat center;background-size:contain;}
.layer a:nth-last-of-type(2)
{background:url('/img/system-dual.png') no-repeat center;background-size:contain;}
.layer a:nth-last-of-type(1)
{background:url('/img/system-single.png') no-repeat center;background-size:contain;}

.layer>figure::after
{background:url('/parts/layer/光α.png') no-repeat center;background-size:70%;}
.disk>figure::after
{background:url('/parts/disk/Ar.png') no-repeat center;background-size:70%;}
.driver>figure::after
{background:url('/parts/driver/Ch.png') no-repeat center;background-size:70%;}
.other>figure::after
{background:url('/parts/driver/∞.png') no-repeat center;background-size:70%;}

.layer svg
{
    height:3.5em;
    overflow:visible;
    font-size:0.7em;
    margin:0 0.1em;
}
.layer path
{
    stroke-width:0.3em;stroke:hsl(var(--c),var(--s),40%);
    stroke-linecap:round;
    fill:transparent;
}
.disk a[href]
{
    min-width:6.25em;
    margin:0 0.5em;
    background:none;border:none;
}
.disk svg
{
    overflow:visible;
    position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
    width:100%;
    z-index:-1;
}
.disk path,.disk rect
{
    stroke:hsl(var(--c),var(--s),50%);stroke-width:0.1em;
    fill:hsl(var(--c),var(--s),75%);
}
</style>