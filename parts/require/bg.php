<?php header('Content-Type: image/svg+xml');
$stats=['att','def','sta','wei','mec','bur'];
?>
<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox="0 0 150 150">
    <defs>
        <style>
            linearGradient,.box {--c:<?= $_GET['hue'] ?>;}
            linearGradient,radialGradient,#dl use {--s:80%;}
            .att {--c:200;}
            .def {--c:130;}
            .sta {--c:60;}
            .mec {--c:280;}
            .bur {--c:30;}
            .wei {--c:0;--s:0% !important;}
        </style>
        
        <linearGradient id='top' x1='0%' y1='100%' x2='100%' y2='0%'>
            <stop offset='0%' stop-color="hsl(var(--c),70%,80%)"/>
            <stop offset='50%' stop-color="hsl(var(--c),70%,90%)"/>
            <stop offset='100%' stop-color="hsl(var(--c),70%,75%)"/>
        </linearGradient>
        <linearGradient id='bot' x1='0%' y1='100%' x2='100%' y2='0%'>
            <stop offset='0%' stop-color="hsl(var(--c),70%,90%)"/>
            <stop offset='100%' stop-color="hsl(var(--c),70%,80%)"/>
        </linearGradient>

        <linearGradient id='bg' x1='0' y1='100%' x2='100%' y2='0'>
            <stop offset='0%' stop-color='hsl(0,0%,80%)' />
            <stop offset='50%' stop-color='hsl(0,0%,90%)' />
            <stop offset='100%' stop-color='hsl(0,0%,70%)' />
        </linearGradient>
        <linearGradient id='sym' x1='50%' y1='0%' x2='50%' y2='100%'>
            <stop offset='0%' stop-color='hsl(0,0%,80%)' />
            <stop offset='100%' stop-color='white' />
        </linearGradient>
    <?php
    foreach ($stats as $stat) {
        $light='hsl(0,0%,'.((isset($_GET['heavy']) and $stat=='wei')? 70:100).'%)';
        $dark='hsl(var(--c),var(--s),'.((isset($_GET['heavy']) and $stat=='wei')? 40:70).'%)'; 
        switch ($_GET['stat']) {case 5:
    ?>
        <linearGradient id='<?= $stat ?>' class='<?= $stat ?>' x1='50%' y1='0%' x2='50%' y2='100%'>
            <stop offset='0%' stop-color='<?= $dark ?>' />
            <stop offset='100%' stop-color='<?= $light ?>' />
        </linearGradient>
    <?php break; case 6: ?>
        <radialGradient id='<?= $stat ?>' class='<?= $stat ?>' fx='30%' fy='70%'>
            <stop offset='0%' stop-color='<?= $light ?>' />
            <stop offset='100%' stop-color='<?= $dark ?>' />
        </radialGradient>
    <?php } } 
    
    switch ($_GET['stat']) {case 5: ?>
        <g class='dd' id='dd'>
            <path d='M 123.2,36.9 h -36.8 l -6,6 l 6,6 h 36.8'/>
            <path d='M 123.2,36.9 l -6,6 l 6,6 h 15.6 a 6,6,0,0,0,0,-12 Z'/>
        </g>
        <g class='dd' id='grams'>
            <path d='M 115.2,36.9 h -28.8 l -6,6 l 6,6 h 28.8'/>
            <path d='M 115.2,36.9 l -6,6 l 6,6 h 23.6 a 6,6,0,0,0,0,-12 Z'/>
        </g>
    <?php break; case 6: ?>
        <marker id='cc'>
            <circle r='1.3' fill='grey'/>
        </marker>
        <g class='dd' id='odd'>
            <line x2='133' y2='45' x1='111' y1='45'/>
            <circle r='6' cx='139' cy='45'/>
        </g>
        <g class='dd' id='even'>
            <line x2='121' y2='45' x1='111' y1='45'/>
            <circle r='6' cx='127' cy='45'/>
        </g>
        <g class='dd' id='grams'>
            <line x2='121' y2='45' x1='111' y1='45'/>
            <rect width='12' height='12' x='121' y='39' rx='1.5' ry='1.5'/>
        </g>
        <g id='holder'>
            <marker id='sq'>
                <polygon points='0,-2 -2,0 0,2 2,0' />
            </marker>
            <path d='M 111,37 h -24 a 7,7,0,0,0,-7,7 v 55 a 7,7,0,0,0,7,7 h 24' stroke='black' stroke-width='1' fill='transparent' marker-start='url(#sq)' marker-end='url(#sq)'/>
        </g>
    <?php } ?>
        <style>
            .dd line,.dd path:first-of-type {stroke:grey;fill:transparent;}
            marker {overflow:visible;}
            .dd line {marker-start:url(#cc);}
        </style>
        
        <g id='dl'>
        <?php $d=[6=>10.6,5=>14.3];
        foreach ($stats as $i=>$stat) {$g='dd';
            if ((isset($_GET['heavy']) and $_GET['heavy']=='grams' or isset($_GET['light'])) and $stat=='wei') 
                $g='grams';
            elseif ($_GET['stat']==6)
                $g=($i%2==0)? 'odd':'even';
            elseif ($i==5)
                break;
        ?>
            <use xlink:href='#<?= $g ?>' class='<?= $stat ?>' transform='translate(0,<?= $d[$_GET['stat']]*$i ?>)' />
        <?php } switch ($_GET['stat']) {case 6: ?>
            <use xlink:href='#holder' />
        <?php } ?>
        </g>
        
        <style>
            #dl use {stroke-width:0.8;stroke:hsl(var(--c),var(--s),30%);}
        <?php foreach ($stats as $i=>$stat) { ?>
            #dl use:nth-of-type(<?= $i+1 ?>) {fill:url(#<?= $stat ?>);}
        <?php } if (isset($_GET['heavy'])) { ?> 
            #dl use:nth-of-type(4) {stroke:black;}
        <?php } ?>
        </style>
        
        <polygon id='octa' points='7.314,12 12,7.314 12,-7.314 7.314,-12 -7.314,-12 -12,-7.314 -12,7.314 -7.314,12'/>
        
        <filter id='shadow' width='20' height='30' y='-50%'>
            <feDropShadow dx="1" dy="-1" stdDeviation="1" flood-color="black" flood-opacity='0.4'/>
        </filter>
    </defs>
    
    <g class='box'>
        <rect width='150' height='150' />
        <rect width='150' height='30' />
        <line y1='30.75' y2='30.75' x2='150' />
        <use xlink:href='#octa' transform='translate(15,15.3)' />
        <use xlink:href='#dl' />
        <rect width='140' height='33.5' x='5' y='111.5' rx='4' ry='4' />
    </g>

    <style>
        .box {overflow:hidden;}
        .box rect:nth-of-type(1) {fill:url(#bg);}
        .box rect:nth-of-type(2) {fill:url(#top);}
        .box rect:nth-of-type(3) {fill:url(#bot);}
        .box use {stroke-width:1;stroke:grey;fill:url(#sym);}
        .box line {stroke-width:1.5;stroke:hsl(var(--c),70%,55%);}
        .box rect:nth-of-type(3),.box use[*|href='#octa'],#dl use:not([*|href$='holder']) {filter:url(#shadow);}
    </style>
</svg>