<?php
    require_once '../include/head.php';
    require_once '../update/product-list.php';
    require_once '../update/part-list.php';
    setcookie('history[products]',time(),time()+24*60*60*200,'/');
?>
<!DOCTYPE HTML>
<?php head(true) ?>
<title>陀螺商品 ￭ Products ｜ 戰鬥陀螺 爆烈世代 ￭ 爆旋陀螺 擊爆戰魂 ￭ Beyblade Burst ￭ ベイブレードバースト</title>
<?php parts_desc(true) ?>
<link rel="stylesheet" href="products.css"/>
<link rel="stylesheet" href="/include/fonts/fa.css"/>
<style>
.symbol
{font-family:'mono',monospace,"Microsoft Yahei",sans-serif;font-display:swap;}
</style>
<script>
function pic(href)
{
    $('#popup+label img').attr('src',href);
    $('#popup').click();
    gtag('event','1',{'event_category':'product-image'});
}

var i=["RBH","BH","SH","RLH","RL","L","jap"];
var hide=grey='';
i.forEach(l=>{
    hide+=`#${l}:checked~main table .${l},\n`;
    grey+=`#${l}:checked~main label[for="${l}"],\n`; });
$('head style').append(hide+'#nil\n{display:none;}\n'
+grey+'#nil\n{color:silver;background-color:initial;}');
  
$(document).ready(x=>{
    i.push('eng');
    i.forEach(l=>$('main').before(`<input type="checkbox" id="${l}" hidden ${(l=='jap'||l=='eng')? 'checked':''}>`));
})
</script>

<?php nav(['/','/parts'],['home','部件<br>Parts']) ?>
<main>
	<form>
		<svg style='display:none'>
			<radialGradient id='link-bg' fx='30%' fy='70%'>
				<stop offset='0%' stop-color='white' />
				<stop offset='100%' stop-color='hsl(130,80%,70%)' />
			</radialGradient>
			<polygon id='link' points='0,-100 -86.603,-50 -86.603,50 86.603,50 86.603,-50' stroke-width='4' stroke='hsl(230,50%,50%)' fill='hsl(230,70%,90%)'/>
		</svg>
		<div>
			<a href='https://beyblade.takaratomy.co.jp/products' target='_blank'>
				<svg viewBox='-86.603 -100 173.205 150'><use xlink:href='#link'/></svg>
				<span><i class="fas fa-external-link-alt"></i><br>官方<br>商品頁面</span>
			</a>
			<a href='promo.php'>
				<svg viewBox='-86.603 -100 173.205 150'><use xlink:href='#link' transform='rotate(180 0 -25)'/></svg>
				<span>官方<br>陀螺介紹<br><i class="fas fa-book-open"></i></span>
			</a>
		</div>
		<fieldset>
			<legend><i class="fas fa-search"></i>&nbsp;搜尋 Search</legend>
			<p class='layer'>
			    <select name='body'><option value='sp'>Ring<option value='gt'>Base</select>
			    <input type='text' placeholder='g/V/s'>
			    <select name='chip'><option value='sp'>SP Chip<option value='gt'>GT Chip</select>
				<input type='text' placeholder='g/V/s'>
			    <select name='key'><option value='sp'>Chassis<option value='gt'>Weight</select>
				<input type='text' placeholder='1a/1s/斬'>
		    </p>
			<p class='layer' name='layer'><a>Layer</a>
			<input type='text' placeholder='L2,GV,br'></p>
			<p class='disk' name='disk'><a>Disk</a>
			<input type='text' placeholder='G,4,2v'></p>
			<p class='disk' name='frame'><a>Frame</a>
			<input type='text' placeholder='g,V,s'></p>
			<p class='driver' name='driver'><a>Driver</a>
			<input type='text' placeholder='at,m,RB'></p>
			<i class="fas fa-arrow-alt-circle-right"></i>
		</fieldset>
		<div>
			<a href='launchers.php'>
				<svg viewBox='-86.603 -100 173.205 150'><use xlink:href='#link'/></svg>
				<span><i class="fas fa-toolbox"></i><br>發射器<br>及配件</span>
			</a>
			<a href='/articles/BBG.php'>
				<svg viewBox='-86.603 -100 173.205 150'><use xlink:href='#link' transform='rotate(180 0 -25)'/></svg>
				<span>更多<br>限定商品<br><i class="fas fa-calendar-alt"></i></span>
			</a>
		</div>
	</form>

	<menu>
		<p><i class="fas fa-eye-slash"></i>隱藏 Hide</p>
		<div>
			<label for='RL' class='RL'>隨機 Layer<br>Random Layer</label>
			<label for='L' class='L'>限定商品<br>Limited merchandise</label>
			<label for='jap' onclick="gtag('event','1',{'event_category':'product-language-jap'})">日文名稱<br>Japanese names</label>
			<label for='eng' onclick="gtag('event','1',{'event_category':'product-language-eng'})">英文名稱<br>English names</label>
		</div>
		<p><i class="fas fa-eye-slash"></i>隱藏異色版陀螺 Hide recoloured Beys in</p>
		<div>
			<label for='RBH' class='RBH'>隨機抽包<br>Random Boosters</label>
			<label for='BH' class='BH'>獨立陀螺<br>Boosters</label>
			<label for='SH' class='SH'>組合<br>Sets</label>
			<label for='RLH' class='RLH'>隨機 Layer<br>Random Layer</label>
		</div>
	</menu>
	<table id='myTable'>
		<caption class='tips'>
			<i class="far fa-hand-point-down"></i>&nbsp;點擊以排序 <i class="fas fa-sort"></i> Click to sort&nbsp;<i class="far fa-hand-point-down"></i>
		</caption>
		<thead>
		<tr>
			<th rowspan=2><a>No</a></th>
			<th colspan=4 class='layer'><a>L / B / R</a></th>
			<th colspan=4 class='layer'><a>Chip</a></th>
			<th class='layer'><a></a></th>
			<th colspan=4 class='disk'><a>Disk (＋Frame)</a></th>
			<th colspan=4 class='driver'><a>Driver</a></th>
		</tr>
		<tr>
			<th colspan=9>
				<mark>
		            <span><img src='chips.svg#MGC'>：使用 Metal God Chip
		            <br><img src='chips.svg#LC'>：附有 Level Chip</span>
				</mark>
			</th>
			<th colspan=4>
				<mark>「_」：不隨附、<br>但可裝上 Frame</mark>
			</th>
			<th colspan=4>
				<mark><ruby>「′」<rt>dash</rt></ruby>：使用強彈簧</mark>
			</th>
		</tr>
		</thead>
		<tbody></tbody>
	</table>
	<h2 style='font-size:1.2em;display:block'></h2>
	<button><i class="fas fa-backspace"></i>&nbsp;清除搜尋結果 Clear search results</button>

	<input type='checkbox' id='popup'>
	<label for='popup'><img></label>

	<?php foreach (array_merge($layers,$layer5b) as $layer) echo "<h6>$layer[2]</h6>"; ?>
</main>

<script src='row.js'></script>
<script src="/include/tablesort.js"></script>
<script>
let beys=[];
let names={};
$(document).ready(x=>{
    let search=new Search();
    $('h6').remove();
    $.ajax({url:"/update/part-list.php?json",beforeSend:x=>$('table+h2').text('Loading...')}).done(
        result=>{
            names=JSON.parse(result);
            beys=[<?php foreach ($products as $no=>$bey) echo "new bey('$no','{$bey[0]}','{$bey[1]}'),"; ?>]
            $("table").tablesorter({headers:{10:{sorter:"text"}}});
            
            if (search.read('url')!==false) return; 
            beys.forEach(b=>b.beyrow());
            Table.flush();
            $('table+h2').text(''); 
        }).fail(x=>$('table+h2').text('Please refresh!'));
      
    $('fieldset input').keypress(k=>k.which==13? search.read('form'):null);
    $('fieldset>i').click(x=>search.read('form'));
    
    $('table~button').click(x=>{
        $('tbody,table+h2').text('');
        beys.forEach(b=>b.beyrow());
        Table.flush();
    });
});
</script>

<script>
$(window).resize(x=>{
    if ($(window).width()>=700 || $(window).width()>$(window).height())
        $('#jap').is(':checked')? Table.column('both'):Table.column('jap');
    else {
        !$('#jap').is(':checked')? Table.column('jap') :
        $('#eng').is(':checked')? Table.column('chi'):Table.column('eng'); }
});
$('label[for="jap"]').on('click', x=>$('#jap').is(':checked')? 
    Table.column('jap'):
    ($(window).width()>=700 || $(window).width()>$(window).height())? Table.column('both'):Table.column('chi'));
    
$('label[for="eng"]').on('click',x=>$('#eng').is(':checked')? Table.column('eng'):Table.column('chi'));

class Table {
    static column(lang) {
        let colspan;
        if (lang=='eng') colspan=[6,1,1];
        else if (lang=='jap') colspan=[1,6,1];
        else if (lang=='chi') colspan=[1,1,6];
        else if (lang=='both') colspan=[3,1,4];
        colspan.forEach((c,i)=>$(`td[colspan]:nth-child(${i+3})`).attr('colspan',c));
    }
    static flush() {
        ($(window).width()>=700 || $(window).width()>$(window).height())? Table.column('both'):Table.column('chi'); 
        $("table").trigger('update');
    }
}
class Search {
    constructor() {
        this.inputs={};
    }
    read(place) {
        if (place=='form') {
            Search.parts.forEach(p=>this.inputs[p]=Search.esc($(`[name=${p}]`)[0].value));
            $('form')[0].reset();
            gtag('event','1',{'event_category':'part-search-typed'});
            return this.find();
        } 
        else if (place=='url') {
            gtag('event','1',{'event_category':'part-search-clicked'});
            let url=new URL(window.location.href);
            Search.parts.forEach(p=>this.inputs[p]=Search.esc(url.searchParams.get(p)));
            for (let parts in this.inputs) 
                if (this.inputs[parts])
                    return this.find();
            return false;
        }
    }
    find() {
        $('tbody').text('');
        beys.forEach(b=>b.regex.match(this.regex)? b.beyrow():null);
        Table.flush();
        let count=$('tbody tr').length;
        let rem=(count==0)? '<br>你所檢索的部件可能只在<a href="../prize.php">景品</a>附有':'';
        $('table+h2').html(`<small>Results: </small>${count}<small> 個項目${rem}</small>`);
        $('html,body').scrollTop($('tbody').offset().top);
        
        $.ajax({url:"/tools/index.php?"+$.param(this.inputs)});
    }
    get regex() {
        return new RegExp('^'+this.layer(this.inputs)+' '+this.disk(this.inputs)+' '+this.driver(this.inputs)+'$','i');
    }
    static get parts() {
        return [...$('form input[type=text],form select')].map(i=>i.name);
    }
    static esc(string) {
        return string? string.replace(/[’'ʼ´ˊ]/g,'′').replace(/[.*+?^${}()|[\]\\]/g,'\\$&'):undefined;
    }
    layer() {
        if (!this.inputs.layer5b && !this.inputs.layer5c && !this.inputs.layer5w)
            return this.inputs.layer || '.*?';
        let c=this.inputs.layer5c;
        if (c)
            this.inputs.layer5c=c.match(/^d$/i)? '[DΔ]': c.match(/^a$/i)? '[AⱯ]':c;
        return (this.inputs.layer5b||'.')+'\\.'+(this.inputs.layer5c||'.')+'\\.'+(this.inputs.layer5w||'.');
    }
    disk() {
        if (!this.inputs.disk && !this.inputs.frame)
            return '.*?';
        return (this.inputs.disk || (this.inputs.frame? '[_\\d′]+':'.*?'))+
            (this.inputs.disk && this.inputs.disk.match(/[A-z]$/)? '':this.inputs.frame||'.');
    }
    driver() {
        if (!this.inputs.driver)
            return '.*?';
        return this.inputs.driver+'′?';
    }
}
</script>