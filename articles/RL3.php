<!DOCTYPE HTML>
<?php require_once '../include/head.php';head() ?>
<title>研究｜Beyblade Burst ベイブレードバースト</title>

<?php nav(['/articles','/'],['back','home']) ?>
<style>
    *::before,*::after,article span {vertical-align:middle;}
    mark {
        display:inline-block;
        background:none;
    }
    mark::before {content:'[';}
    mark::after {content:']';}
    mark::before,mark::after {
        font-size:2em;
        vertical-align:sub;
        font-weight:lighter;
    }
    article span {
        display:inline-block;
        position:relative;
        margin:0 .8em;
        text-align:center;font-size:.8em;
    }
    article span::before {content:'(';right:100%;}
    article span::after {content:')';left:100%;}
    article span::before,article span::after {
        position:absolute;bottom:0;
        font-size:2.4em;
        font-weight:lighter;
    }
    rt {font-style:initial !important;line-height:1.4em;text-align:center;}
    ul {padding-left:1em;}
    img {width:100%;max-width:40em;}
</style>
<main>
    <h1>Random Layer 3 機率研究</h1>
    <aside>2019-10-20</aside><br><br>
    <article>
        <p>最新的 Random Layer 3 改為邪惡抽法，不再是以往固定配置四抽一，而是散亂配置二十四抽一。官方介紹影片還說「是為了更多樂趣」，
        實際上「是為了公司有更多樂趣」，因為他們能賺更多錢！</p>
        <p>完全亂配的話有 4<sup>3</sup>＝64 種配置。一箱 48 盒有兩組，每箱每組或有不同，但相信新規部件數目也是一樣。</p>
        <img src='https://i.imgur.com/TtyOgCK.jpg'>
        <p>けんチャンネル的影片顯示，一組中只有三個新 K Base 及三個新 O Chip，官方竟然還把籤王配置比例由 1/4 下調到 1/8，太讓人無語了！
        可能（希望？）因為是最後的 RL，故官方有瘋狂的行為！<br>
        而且 K Base 必定配上幻 Weight，幻 Weight 必定配上 K Base，這是為了平衡各配置重量，以免被人用秤選擇。</p>
        <p>除了「一抽入魂」外，也能藉由抽到【KP幻】或【KH幻】，加上【VO斬】或【GO閃】（以上圖為例），以重組籤王。</p>
        <p>假設店員剛拆開一組 24 盒讓你抽：<br>
        一抽入魂機率：1/24＝4.17%<br>
        兩抽內組合出籤王機率：9.78%<br>
        三抽內組合出籤王機率：16.45%<br>
        四抽內組合出籤王機率：23.83%<br>
        五抽內組合出籤王機率：31.61%<br>
        六抽內組合出籤王機率：39.53%<br>
        七抽內組合出籤王機率：47.36%<br>
        八抽內組合出籤王機率：54.94%<br></p><br>
        <p>以下是高中數學時間！<br>
        先把籤王【KO幻】稱作「KO」、配置【KP幻】及【KH幻】稱作「K」、配置【VO斬】及【GO閃】稱作「O」。</p>
        <p>𝑥 抽內能組合出至少一隻籤王的機率＝
            <mark>
                <ruby class='below'><rb><span>1<br>1</span><span>23<br>𝑥-1</span></rb><rt>抽到KO</rt></ruby>+
                <ruby class='below'><rb><span>2<br>1</span><span>2<br>1</span><span>19<br>𝑥-2</span></rb><rt>抽不到KO<br>抽到K與O各一</rt></ruby>+
                <ruby class='below'><rb><span>4<br>3</span><span>19<br>𝑥-3</span></rb><rt>抽不到KO<br>抽到K與O共三</rt></ruby>+
                <ruby class='below'><rb><span>4<br>4</span><span>19<br>𝑥-4</span></rb><rt>抽不到KO<br>抽到K與O全四</rt></ruby>
            </mark>÷<span>24<br>𝑥</span>
            <ul>
                <li><span>𝑛<br>𝑟</span>即是組合 𝑛𝐂𝑟。在紅藍黃錄黑白六色中選四種顏色，共有<span>6<br>4</span>＝15 種組合。</li>
                <li><span>𝑛<br>𝑟</span>如遇上 𝑛&lt;𝑟 或 𝑟&lt;0，則該項<span>𝑛<br>𝑟</span>當作 0。</li>
            </ul>
            觀察：
            <ul>
                <li>24 抽 8 時，已有超過 50% 機會能組合出至少一隻籤王</li>
                <li>24 抽 21 時，只有兩種情況不能組合籤王：剩下 KO 及全部 K 抽不到、又或剩下 KO 及全部 O 抽不到</li>
                <li>24 抽 22 時，必定能組合出至少一隻籤王</li>
                <li>期望值：平均要抽多少盒才能組合出至少一隻籤王呢？把上術公式稱作 𝑓(𝑥)，<br>
                ∑𝑥[𝑓(𝑥)－𝑓(𝑥－1)]<br>
                ＝𝑓(1)＋2[𝑓(2)－𝑓(1)]＋3[𝑓(3)－𝑓(2)]＋...＋24[𝑓(24)－𝑓(23)]<br>
                ＝24𝑓(24)－𝑓(23)－𝑓(22)－...－𝑓(1)<br>
                ＝8⅓<br>故你如能於八抽以內組合出至少一隻籤王，就是運氣較好；否則就是運氣較差。</li>
            </ul>
            抽數x與機率y%的圖表：<br>
            <img src='RLgraph.JPG'>
        </p>
    </article>
</main>