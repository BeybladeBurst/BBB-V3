<?php
require '/home/beyblade/public_html/articles/RBGB/include.php';
for ($id=$_GET['from'];$id<=$_GET['from']+20;$id++) {
    try {
        curl_setopt($ch, CURLOPT_URL, "https://www.beybladeburst.co.kr/product/product_view?id=$id");
        $h=curl_exec($ch);
        echo '<img style="max-width:500px;" src="'.select_elements('.//figure//span//img',$h)[0]['attributes']['src'].'">';
    } catch(Exception $e) {
        echo $e;
    }
}