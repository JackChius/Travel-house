<?php
header('Content-Type:text/html;charset= UTF-8');
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://apis.haoservice.com/lifeservice/travel/scenery?pid=3&page=4&key=3f288fee98d245329448f8a0ebe74d89",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}



//$myFile = fopen($name,"w");
//fwrite($myFile,$s);
//fclose($myFile);
//echo "我喜欢：";
//echo $name."<p>";
//echo $sex."<p>";
?>