<?php  
  include_once '../include/head.php';  
  $raw=array(  
      array('12-21',1466+1413+1246+1222+1118,133815+132576+130125+130454+130842),  
      array('12-28',1467+1414+1245+1223+1121,134421+132964+130987+131010+132021),
      array('01-05',1468+1417+1248+1228+1119,136884+135080+132844+133673+134576),  
      array('01-12',1469+1417+1249+1228+1121,138038+135689+133679+134452+135429),
      array('01-19',1469+1418+1249+1229+1121,138346+135997+134049+134847+135669),  
      array('01-26',1470+1418+1250+1230+1121,138714+136219+134309+135125+135959),  
      array('02-02',1471+1418+1250+1230+1122,139455+136900+134971+135882+136898),  
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
<title>研究｜Beyblade Burst ベイブレードバースト</title> 

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
</style>  
 
<?php nav(['/articles','/'],['back','home']) ?>
<main>  
    <h1>レアベイゲットバトル<br>機率追蹤２</h1>  
    <aside>2017-12-28</aside><br><br>  
    <article>  
        <p>今次改為追蹤ID是100000至300000、較新的而又有至少三萬分的約二萬位陀螺手。</p>  
    </article>  
    <div id="chart">  
        <div id="chart_title"></div>  
        <div id="chart_div"></div>  
    </div>  
</main>  