<!doctype html>
<meta charset='utf-8'>
<?php
class SelectorDOM {
  public function __construct($data) {
    if ($data instanceof DOMDocument) {
        $this->xpath = new DOMXpath($data);
    } else {
        $dom = new DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($data, 'HTML-ENTITIES', "UTF-8"));
        $this->xpath = new DOMXpath($dom);
    }
  }
  
  public function select($selector, $as_array = true) {
    $elements = $this->xpath->evaluate($selector);
    return $as_array ? elements_to_array($elements) : $elements;
  }
}
function select_elements($selector, $html, $as_array = true) {
  $dom = new SelectorDOM($html);
  return $dom->select($selector, $as_array);
}
function elements_to_array($elements) {
  $array = array();
  for ($i = 0, $length = $elements->length; $i < $length; ++$i)
    if ($elements->item($i)->nodeType == XML_ELEMENT_NODE)
      array_push($array, element_to_array($elements->item($i)));
  return $array;
}
function element_to_array($element) {
  if ($element->tagName=='style')
    return;
  $array = array(
    'html' => $element->nodeValue,
    'name' => $element->nodeName,
    'attributes' => array(),
    'children' =>elements_to_array($element->childNodes)
    );
  if ($element->attributes->length)
    foreach($element->attributes as $key => $attr)
      $array['attributes'][$key] = $attr->value;
  if ($element->tagName=='img') 
    echo '<img src="'.str_replace('beyblade-burst.takaratomy.co.jp.qb','beyblade-burst.takaratomy.co.jp',str_replace('beyblade-burst.localdev','beyblade-burst.takaratomy.co.jp',$element->attributes['src']->value)).'">';
  return $array;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.0; ja-JP; rv:1.7.12) Gecko/20050915 Firefox/1.0.7)');
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');


if (isset($_GET['korea']))
    for ($id=$_GET['from'];$id<=$_GET['from']+5;$id++)
        try {
            $url="https://www.beybladeburst.co.kr/product/product_view?id=$id";
            curl_setopt($ch, CURLOPT_URL, $url);
            $h=curl_exec($ch);
            echo "<a href=$url>".select_elements('//figcaption//cite//span',$h)[0]['html'].'</a><img style="max-width:500px;" src="'.str_replace('http','https',select_elements('.//figure//span//img',$h)[0]['attributes']['src']).'">';
        } catch(Exception $e) {}
else {
    $from=$_GET['from'] ?? $_COOKIE['frontier'];
    for ($id=$from;$id<=$from+10;$id++) {
        $url="https://beyblade-burst.takaratomy.co.jp/info_detail?myPost=$id";
        curl_setopt($ch, CURLOPT_URL, $url);
        $h=curl_exec($ch);

        echo "<br><a href='$url' target=blank>$id</a><br>";
        $h1=select_elements('//div[@class="inner infoDtl"]//h1',$h)[0]['html'];
        echo $h1.'<br>';
        $content=select_elements('//div[@class="inner infoDtl"]//h1/following-sibling::*[1]/self::div/*',$h);
        foreach ($content as $el)
            echo $el['html'].'<br>';
        if (!$h1 || $id==$from+10) {
            echo "<script>document.cookie=`frontier=$id;max-age=22222222;path=/`</script>";
            if (!$h1) exit();
        }
    }
}
