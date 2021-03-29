<?php
  include_once '../include/head.php';
  $raw=array(
      array('08-23',2872+1454+1438+1428+312,193491+85278+93310+98032+40802),
      array('08-30',2875+1454+1442+1428+313,196960+86190+94779+99450+43532),
      array('09-06',2877+1455+1443+1428+315,199956+86765+95851+100550+45792),
      array('09-13',2878+1458+1444+1428+315,201938+87244+96631+101220+46640),
      array('09-20',2880+1459+1444+1431+317,208734+88413+98059+36+102296+355+49989),
      array('09-27',2886+1461+1445+1431+320,212669+89184+99807+103341+52574),
      array('10-04',2887+1461+1445+1432+320,218489+89763+100978+104516+54288),
      array('10-11',2888+1461+1448+1433+323,222891+90186+102558+104925+57782),
      array('10-18',2890+1462+1448+1433+325,227690+90930+103194+105272+61120),
      array('10-25',2897+1465+1450+1433+326,231140+91854+105418+106128+63591),
      array('11-01',2897+1465+1450+1435+326,238530+92231+106559+106918+64724),
      array('11-08',2897+1465+1450+1436+327,240456+92644+107174+107857+65968),
      array('11-15',2899+1466+1451+1437+327,242806+93291+108086+109063+67029),
      array('11-22',2900+1466+1451+1437+327,244438+93733+109054+110055+68205),
      array('11-29',2901+1466+1451+1437+329,245774+94170+109938+111576+70108),
      array('12-06',2903+1467+1452+1438+328,247565+94565+110708+113209+70606),
      array('12-13',2904+1468+1452+1438+328,248813+94782+111105+113571+70998),
      array('12-20',2904+1468+1452+1438+328,249798+94930+111461+114031+71571),
  );
  $data="['Date','',{role: 'annotation'}],";
  for ($i=1;$i<count($raw);$i++)
  {
    $dR=$raw[$i][1]-$raw[$i-1][1];$dC=$raw[$i][2]-$raw[$i-1][2];
    $data.="['".$raw[$i][0]."',".($dR/$dC*100).",'$dR/$dC'],";
  }
?>
<!DOCTYPE HTML>
<?php head() ?>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(draw);
function draw()
{
  var data = google.visualization.arrayToDataTable
  ([<?php echo $data ?>]);
  var options =
  {
    chartArea: {left:60,top:20,'width':'100%','height':'80%'},
    legend: {'position': 'bottom'},
    legend: 'none',
    backgroundColor: "transparent",
    vAxis:{format: '#.####'},
    title:'過去一周確率%（ΔRB/ΔC）',
  };
  var chart = new google.visualization.LineChart(document.getElementById('chart'));
  var formatter = new google.visualization.NumberFormat(
      {suffix: '%',fractionDigits:'4'});
  formatter.format(data, 1);    
  chart.draw(data, options);
}
</script>
<style>
#chart
{
  height:500px; width:100%; 
  margin-top:70px; font-size:30px;
}
ol
{padding-left:20px;}
</style>

<?php nav(['/articles','/'],['back','home']) ?>
<main>
    <h1>レアベイゲットバトル<br>機率追蹤</h1>
    <aside>2017-11-03</aside><br><br>
    <article>
        <ol>
        方法：
          <li>追蹤約二萬個最舊，又至少有九千「トータルベイポイント」（總累積分數）的帳戶</li>
          <li>每星期進行統計，加總他們的「トータルベイポイント」(TBP) 、「ベイポイント」(BP) 以及「伝説ベイバッジ」(RB) 的數量</li>
          <li>與一星期前的數據比較，得出差異</li>
          <li>計算該星期的概率＝Δ(RB)÷[Δ(TBP)-Δ(BP)]×3000</li>
        </ol>
    </article>
    <div id="chart">
        <div id="chart_title"></div>
        <div id="chart_div"></div>
    </div>
</main>