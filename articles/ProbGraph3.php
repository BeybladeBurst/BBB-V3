<!DOCTYPE HTML>
<?php include_once '../include/head.php';head() ?>
<title>研究｜Beyblade Burst ベイブレードバースト</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
let data=[['Date','',{role: 'annotation'}]];
fetch('RBGB/-sum.txt').then(res=>res.text()).then(raw=>{
    raw.split(/\n/).forEach((week,i,raw)=>{
        if (i==0 || week==='') return;
        let now=week.split(/,/);
        let prev=raw[i-1].split(',');
        let dR=parseInt(now[3])-parseInt(prev[3]);
        let dC=(parseInt(now[1])-parseInt(prev[1])-parseInt(now[2])+parseInt(prev[2]))/3000;
        data.push([now[0],dR/dC*100,`${dR}/${dC}`]);
    });
    google.charts.setOnLoadCallback(()=>draw(data));
});
</script>
<script>
google.charts.load('current',{packages:['corechart','line']});
function draw(raw)
{
    var data=google.visualization.arrayToDataTable(raw);
    var options=
    {
      chartArea:{left:35,top:20,'width':'110%','height':'80%',},
      legend:{'position': 'bottom'},
      legend:'none',
      backgroundColor: "transparent",
      vAxis:{format:'#.####', viewWindow:{min:0}, gridlines:{count:5}},
      title:'過去一周確率%（ΔRB/ΔC）',
    };
    (new google.visualization.NumberFormat({suffix:'%',fractionDigits:'4'})).format(data, 1);
    (new google.visualization.LineChart(document.getElementById('chart'))).draw(data,options);
}
</script>

<style>
#chart
{
    height:500px; width:100%;
    margin-top:70px; font-size:30px;
}
</style>

<?php nav(['/articles','/'],['back','home']) ?>
<main>
    <h1>レアベイゲットバトル<br>機率追蹤３</h1>
    <aside>2019-09-02</aside><br><br>
    <article>
        <p>闊別兩年，機率追蹤回來了！<br>剛過去的八月，又有估計是最後一次的 Beypoint 十倍活動。活動過後，在人人也能挑戰 Rare Bey Get Battle 上百甚至數千回時，官方會把機率調至多低呢？</p>
        <p>本次以排行榜總積分最高 500 位（八月十八日時間點）陀螺手為對象，追蹤他們每周挑戰了多少次（ΔC），又成功多少次（ΔRB）。</p>
        <p>現在每周一能自動更新！（已停止）</p>
    </article>
    <div id="chart">
        <div id="chart_title"></div>
        <div id="chart_div"></div>
    </div>
</main>