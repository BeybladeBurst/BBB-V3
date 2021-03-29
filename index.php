<!DOCTYPE HTML>
<?php require_once 'include/head.php'; head() ?>
<meta name="description" content="最新日本陀螺情報、所有部件（攻擊環 結晶盤 輪盤 軸心 底盤）圖鑑、限量產品，或是戰力儀／計分器使用、日本帳戶系統教學，都一應俱全。">
<meta name="og:description" content="最新日本陀螺情報、所有部件（攻擊環 結晶盤 輪盤 軸心 底盤）圖鑑、限量產品，或是戰力儀／計分器使用、日本帳戶系統教學，都一應俱全。">
<meta property="og:image" content="https://pbs.twimg.com/media/D3CS-QKU8AEQi7h.png">
<title>戰鬥陀螺 爆烈世代 ￭ Beyblade Burst ￭ 爆旋陀螺 擊爆戰魂 ￭ ベイブレードバースト</title>

<link rel="stylesheet" href="index.css?"/>
<style>
<?php $r=rand(0,359); echo "
menu>svg
{--r:$r;}
menu>svg:first-of-type
{filter:drop-shadow(0 0 0.1em hsl($r,100%,70%)) drop-shadow(0 0 0.2em hsl($r,100%,60%)) drop-shadow(0 0 0.45em hsl($r,100%,50%));}
menu>svg:last-of-type
{filter:drop-shadow(0 0 0.15em hsl($r,100%,90%)) drop-shadow(0 0 0.25em hsl($r,100%,80%)) drop-shadow(0 0 0.5em hsl($r,100%,70%));}
section,header
{border-bottom-color:hsl(".rand(0,359).",".rand(70,100)."%,".rand(55,80)."%);}
@keyframes movingR
{to {stroke-dashoffset:";echo $o=rand(400,500)/10; echo ";}}
@keyframes movingL
{from {stroke-dashoffset:$o;}
to {stroke-dashoffset:-".($o+rand(1000,1100)/10).";}}";
?>
.news img
{max-width:15em;width:49%;}
</style>

<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><article>
    <img alt='BBB' src='https://d25onbojj3hyk8.cloudfront.net/chozetsu/wp-content/uploads/2019/02/12133204/img_news_GT_logo.png'>
    <hgroup>
        <h1>戰鬥陀螺 爆烈世代｜爆旋陀螺 擊爆戰魂</h1>
        <h2>非官方資訊站</h2>
        <h1>Beyblade Burst</h1>
        <h2>Unofficial information Site</h2>
    </hgroup>
</article></header>

<section id='contents'>
    <svg style='display:none'>
        <defs>
            <polygon id='hexa' stroke-width='0.3' points='10,0 5,-8.66 -5,-8.66 -10,0 -5,8.66 5,8.66'/>
            <g id='gear' stroke-width='2'>
                <circle cx='0' cy='0' r='10' fill='hsla(0,0%,0%,0.2)'/>
                <circle cx='0' cy='0' r='50' fill='none'/>
            </g>
        </defs>
    </svg>
    <menu>
        <svg viewBox='-10 -10 20 20'><use xlink:href='#hexa'/></svg>
        <svg viewBox='-10 -10 20 20'><use xlink:href='#hexa'/></svg>
        <li><a href='guide.php'><span>教學<br>Guide</span></a></li>
        <li><a href='articles'><span>研究<br>Studies</span></a></li>
        <li><a href='gallery.php'><span>圖片<br>Images</span></a></li>
        <li><a href='parts'><span>部件<br>Parts</span></a></li>
        <li><a href='products'><span>商品<br>Products</span></a></li>
        <li><a href='prize.php'><span>景品<br>Prizes</span></a></li>
    </menu>
    <a href='https://beyblade.takaratomy.co.jp/' target='_blank'>往官方網站<br>To official site<br>(Takara Tomy)</a>
    <div class='fb'>
        <span>地區官方消息</span>
        <a href='https://www.facebook.com/tclubfanshk1/' target='_blank'>T CLUB<br>2020</a>
        <a href='https://www.facebook.com/Beyblade2016/' target='_blank'>戰鬥陀螺 TW</a>
    </div>
</section>

<section>
    <label for='popup' style='font-size:1.5em;font-family:MinchoC,Mincho;line-height:1.5em;color:green' onclick="gtag('event','1',{'event_category':'farewell'});">
        ❗ 網站結束公告 ❗<br>❗ Site closure announcement ❗
    </label>
</section>
<input type='checkbox' id='popup' hidden>
<label for='popup'>
    <div style='text-align:justify'>
        <h6>網站結束公告</h6>
        <p>每次邂逅意味著某天的道別；每個創造都會有相應的毀滅。現在此不可迴避的命運已來臨：本網將於<strong>3月29日關閉</strong>，屆時所有內容都會被移除。感謝各位於過去三年來的支持及愛戴。願於過去數年間，陀螺曾帶給各位歡樂、美好及珍貴的回憶和經歷。</p>
        <h6>Site closure announcement</h6>
        <p>Every encounter implies an eventual farewell; every creation corresponds to an ultimate destruction. 
    Now this inevitable fate has come to this site, which is <strong>closing on 29th March</strong>, when all contents will be removed.
    Thank you for your support in these 3 years. Wish you all have had an amusing, wonderful and precious moments and memory of Beyblading.</p>
        <h6>サイトサービス終了のお知らせ</h6>
        <p>平素より、本サイトをご覧いただきありがとうございます。さて、2017年春より開設以来本サイトは、多くの皆様にご利用いただきましたが、3月29日をもちまして閉鎖させていただきます。</p>
    </div>
</label>

<?php
function youtube($id)
{
    echo "<iframe src='https://www.youtube.com/embed/$id' allowfullscreen></iframe>";
}
function newBey($date,$title,$name,$desc,$videos,$v1,$v=true)
{
    echo "
    <article>
        <time>$date</time>
        <h5>$title</h5>
        <h4>$name</h4>
        <div>$desc";if ($v==true) echo "
            <a href='https://www.youtube.com/results?q=$videos' target='_blank' onclick=\"gtag('event',this.href,{'event_category':'utube'});\">
                <i class='fab fa-youtube'></i>
            </a>"; echo "
        </div>";
        $v1? youtube($v1):null;echo "
    </article>";
} ?>

<section class='news' id='now'>
    <fieldset>
        <h3><a>最</a><a>新</a><a>商</a><a>品</a></h3>
        <article>
            <time>2020-03-28</time>
            <h4 style='font-family:MinchoC,Mincho'>新系列開始：《ベイブレードバースト<ruby style='margin:0 -.5em'><rb>超王</rb><rt>スパーキング</rt></ruby>》</h4>
            <ul>
                <li>超王 ⟵ <ruby><rb>Super King</rb><rt>スーパーキング</rt></ruby> ⟺ <ruby><rb>Sparking</rb><rt>スパーキング</rt></ruby></li>
                <li>Sparking 特效：新發射器拉動時擦出火花！官方聲稱：是低温火花，不會有安全問題。發射力量過去最強級別！內部結構有所改良</li>
                <li>超王 Layer 分為四部分：<ruby class='below'><rb>リング</rb><rt>Ring</rt></ruby>、<ruby class='below'><rb>チップ</rb><rt>Chip</rt></ruby>、<ruby class='below'><rb>チップコア</rb><rt>Chip Core</rt></ruby>、<ruby class='below'><rb>シャーシ</rb><rt>Chassis</rt></ruby></li>
                <ul><li>Chip：帶有 Driver 承托位（相當於 GT Base 中央部），迴轉方向限定。Chip Core：將會有金屬版（年中以景品推出 — 年底才商品化？）</li>
                    <li>Ring：Layer 主體上層，迴轉方向限定</li>
                    <li>Chassis（讀 <a href='https://lex-audio.useremarkable.com/mp3/chassis_us_1.mp3' target=_blank style='font-style:italic'>shasi</a>；意思：車輛底盤）
                    ：Layer 主體下層，帶有 Lock 齒位。分為 Double Chassis — 與 Disk 一體化，不能再裝上 Disk；及 Single Chassis — 仍可使用以往的 Disk。又有分單迴轉及雙迴轉</li></ul>
                <li>超王系列起商品不能再登錄至官網 Garage（庫存圖鑑），現有的仍可繼續使用</li>
            </ul>
            <?php newBey('','B-159 攻擊型陀螺 Booster',
            "スーパーハイペリオン・Xc 1A　Super <a href='https://zh.wikipedia.org/wiki/%E8%AE%B8%E7%8F%80%E9%87%8C%E7%BF%81_(%E7%A5%9E%E8%AF%9D)' target=_blank>Hyperion</a>・Xc 1A",'
            <ul><li>第一新主角使用陀螺；右迴轉</li>
                <li>Super Ring：尖銳大型 Upper 刃把對手撞飛至空中、並以連打刃切裂</li>
                <li>1A Chassis：厚又突出的大型打擊刃給予對手強烈一擊。右迴轉 Double Chassis</li>
                <li>Xceed Driver：橡膠平軸加自由迴轉外環</li></ul>','スーパーハイペリオン','aBn0UmxjlNg?start=20');
            newBey('','B-160 平衡型陀螺 Booster',
            "キングヘリオス・Zn 1B　King <a href='https://zh.wikipedia.org/wiki/%E8%B5%AB%E5%88%A9%E4%BF%84%E6%96%AF' target=_blank>Helios</a>・Zn 1B",'
            <ul><li>第二新主角使用陀螺；左迴轉</li>
                <li>King Ring：Upper 形狀五枚刃兼備連續攻擊及化解能力</li>
                <li>1B Chassis：重量分佈良好的五枚刃擁有連續攻擊力及持久力。雙迴轉 Double Chassis</li>
                <li>把上兩者旋轉 180 度再組合，切換五枚刃攻擊或十枚刃防禦模式</li>
                <li>Zone Driver：尖軸加自由迴轉外環，有持久型及攻擊型的動態</li></ul>','キングヘリオス','HWz9CIwKbQQ?start=20');
            newBey('','B-161 持久型陀螺 Booster',
            '<h4>グライドラグナルク・Wh・R 1S　Glide Ragnaruk・Wh・R 1S</h4>','
            <ul><li>Glide Ring：圓滑形狀的刃躲避對手攻擊；能開閉的三個 Stamina Wing 超強化離心力</li>
                <li>1S Chassis：巨大正圓加上外重心的形狀產生強離心力。雙迴轉 Single Chassis</li></ul>','グライドラグナルク','rKuP0Cynves?start=20'); ?>
            <h5>B-162 對戰盤組合 Battle Set：異色 B-159 及 160、兩輕便發射器、一對戰盤</h5>
            <h5>B-165 右迴轉火花發射器 Sparking Bey Launcher (R)</h5>
        </article>
    </fieldset>
</section>

<section class='news' id='future'>
    <fieldset>
        <h3><a>未</a><a>來</a><a>商</a><a>品</a></h3>
        <article>
            <time>2020-04-25</time>
            <h5>B-163 攻擊型陀螺 Booster：ブレイブヴァルキリー　Brave Valkyrie</h5>
            <h5>B-164 隨機抽包 Random Booster Vol.20：新 Satan</h5>
            <ul><li>其餘內容：異色籤王、EA、FS、GH1D<sup>?</sup>、NB滅、US斬、TDb幻</li></ul>
            <img src='https://pbs.twimg.com/media/ES-f7yWUMAEaZNR.jpg'>
            <img src='https://pbs.twimg.com/media/ES-f_HIUcAA9cqO.jpg'>
            <img src='https://pbs.twimg.com/media/ES_5_rAUcAIm5xe.jpg'>
            <h5>B-166 左迴轉火花發射器 Sparking Bey Launcher (L)</h5>
            <ul><li>提早發售</li></ul>
            <img src='https://dmwysfovhyfx3.cloudfront.net/img/goods/5/4904810157267_70006522d7e94fed945f814f5634f655.jpg'>
        </article>
        <article>
            <time>2020-05</time>
            <h5>B-167 持久型陀螺 Booster：新 Fafnir</h5>
            <img src='https://pbs.twimg.com/media/ES5FlmPUUAU7hUo.jpg'>
        </article>
        <article>
            <time>2020-06</time>
            <h5>B-168 攻擊型陀螺 Booster：新 Longinus</h5>
            <img src='https://pbs.twimg.com/media/ES5CgfRUMAAwOdz.jpg'>
        </article>
        <article>
            <time>2020-07</time><br>
            <h5>陀螺 L</h5>
            <img src='https://pbs.twimg.com/media/ES5P2UyU0AA59FS.jpg' style='width:66%'>
            <img src='https://pbs.twimg.com/media/ES5QuZ4U8AA9WVY.jpg' style='width:32%'>
        </article>
        <!--br><hr>
        <article style='text-align:center'>
            <h4>新登錄商標</h4>
            <h5>ツヴァイロンギヌス　Zwei Longinus</h5>
        </article-->
    </fieldset>
</section>

<section id='message'>
    <input type=checkbox id=open>
    <label for=open onclick="Message.load();gtag('event','1',{'event_category':'board'});">▼ 道別棧 Farewell board ▼</label>
    <fieldset>
        <input type=radio name=time id=this checked>
        <label for=this>本周</label>
        <input type=radio name=time id=past>
        <label for=past>上周</label>
        <h3><a>道</a><a>別</a><a>棧</a></h3>
        <div></div>
        
        <input type=radio name=visibility id=public checked>
        <label for=public>公開 Public</label>
        <input type=radio name=visibility id=private>
        <label for=private>私下 Private</label>
        <input type=text maxlength='200'>
        <button onclick='Message.process()' class='fas fa-paper-plane'></button>
    </fieldset>
</section>

<footer>
    對於本網所載資料的準確性或完整性，製作者不會作任何保證或聲明，或因提供或使用此網資料而直接或間接引致的任何損失、損壞或傷害，負上任何責任。
    <br>Developed and Designed by Veiga (MKK). 2017-2020.
</footer>

<script>
Q('a[href^=https]:not([href*=youtube])', a=>a.addEventListener('click',ev=>gtag('event',ev.target.href,{'event_category':'links'})));
const gears=g=>{
    const polar=(m,angle)=>[m*Math.cos(angle),m*Math.sin(angle)];
    const [l,s,t]=[3.5*g,3.4*g-8,Math.PI/(50+2.5*g)];
    for (let i=1;i<=g;i++) 
    {
        [lx,ly]  =polar(l,Math.PI/g*(2*i-1)+t);
        [lxn,lyn]=polar(l,Math.PI/g*2*i-t);
        [sx,sy]  =polar(s,Math.PI/g*(2*i)+t/2);
        [sxn,syn]=polar(s,Math.PI/g*(2*i+1)-t/2);	
        
        if (i==1) points="M "; else points+=" L "; 
        points+=`${lx},${ly} A ${l},${l},0,0,1,${lxn},${lyn}
               L ${sx},${sy} A ${s},${s},0,0,1,${sxn},${syn}`; 
    }
    let gear=document.createElementNS('http://www.w3.org/2000/svg',"path");
    gear.setAttribute("d",points+'Z');
    return gear;
}
(()=>{
    Q("#gear").appendChild(gears(20));
    Q('menu a', link=>link.insertAdjacentHTML('afterbegin',"<svg viewBox='-65 -65 130 130'><use xlink:href='#gear'/></svg>"));
    
    [315,15,255,135,195,75].forEach((color,i)=>{
        let link=Q(`menu li:nth-of-type(${i+1})`);
        link.style.left=(50*Math.cos(Math.PI/3*i)+50)+'%';
        link.style.top=(50*Math.sin(Math.PI/3*i)+50)+'%';
        link.style.setProperty('--c',color); 
        
        let gear=Q(`menu li:nth-of-type(${i+1}) svg`);
        gear.style.filter=`drop-shadow(0 0 0.1em hsl(${color},100%,70%)) drop-shadow(0 0 0.2em hsl(${color},100%,60%)) drop-shadow(0 0 0.4em hsl(${color},100%,50%))`;
    })
})();
</script>
<script>
let input=Q('#message input[type=text]');
input.addEventListener('keypress',e=>e.keyCode===13? Message.process():null);
class Message {
    constructor() {
        Q('#message input[type=radio]', r=>r.addEventListener('change',()=>{
            if (r.id=='this') Message.load();
            if (r.id=='past') Message.load(true);
            if (Q('#past').checked)
                Message.toggle(true);
            else
                Message.toggle(false);
        }));
    }
    static toggle(off) {
        Q('#message input[type=text],#message button', e=>e.disabled=off? true:false);
    }
    static load(past=false) {
        gtag('event','',{'event_category':'message-load'});
        Q('#message div').innerHTML='';
        let api=past? '/message/?prev':'/message/';
        fetch(api).then(r=>r.json()).then(messages=>messages.forEach((m,i)=>Message.display(...m)));
    }
    static process() {
        if (Q('#message button').disabled)
            return;
        if (!input.value.match(/^[ ]*$/) && !input.value.match(/^[0-9A-Za-z\-\=\[\]\;\'\,\.\/]*[ ]?$/) && input.value.length>3) {
            Message.record(input.value,Q('#private').checked).then(r=>r.text()).then(m=>{
                input.value='';
                input.placeholder=m? `The IP you are using ${m} has been banned`:'成功！多謝！ Successful! Thank you!';
                Q('#message button').setAttribute('disabled',true);
            });
            return Q('#private').checked? null:Message.display(null,null,input.value,'');
        }
        input.placeholder='請不要胡亂留言！No spam please!';
        input.value='';
    }
    static record(message,priv=false) {
        return fetch('/message/',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'message='+message+(priv? '&private=':'')});
    }
    static display(stamp,ip,message,reply) {
        input.value='';
        if (reply=='d' || reply=='D') return;
        let bq=document.createElement('blockquote');
        let time= !stamp? new Date():new Date(parseInt(stamp)*1000);
        bq.setAttribute('data-time',time.toLocaleDateString('zh').match(/\/(.+)$/)[1]+' '+time.toLocaleTimeString('zh',{hour12:false}).match(/^(.*):/)[1]);
        let q=document.createElement('q');
        q.innerHTML=message;
        bq.appendChild(q);
        let div=Q('#message div');
        div.appendChild(bq);
        if (reply)
            div.insertAdjacentHTML('beforeend',`<blockquote class='reply'><q>${reply}</q></blockquote>`);
        div.scrollTo(0,div.scrollHeight);
    }
}
new Message();
</script>
<style>
#contents
{background-image:linear-gradient(hsla(0,0%,0%,0.2),hsla(0,0%,0%,0.2)),url('https://beyblade.jp/campaign/5th/img/story_bg_pc.jpg');background-size:cover;background-position:0% 0%;}
#now
{background-image:url('http://www.cs.furyu.jp/beyblade2018/assets/img/home/bg.jpg');}
#message
{background-image:url('https://www.beyblade.jp/campaign/summerquiz/img/main/bg_header.jpg');background-position:100% 0%;}
#future
{background-image:url('https://beyblade.jp/campaign/5th/img/rt-campaign_bg_pc.jpg');}
</style>