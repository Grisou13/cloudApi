<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 22.03.2016
 * Time: 14:45
 */
$post = array("email"=>"thomas.ricci@cpnv.ch","password"=>"Password");
$target_url = "http://localhost:8000/api/auth/jwt/get_token";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=json_decode(@curl_exec ($ch),true);
curl_close ($ch);

echo PHP_EOL;var_dump($result["payload"]);echo PHP_EOL;

$target_url = "http://localhost:8000/api/v1/file";
var_dump($target_url);
$file_name_with_full_path = realpath('./storage/seeding/fixtures/image.jpg');
$cfile = new CURLFile(realpath('./storage/seeding/fixtures/image.jpg'),'image/jpeg','upload'); // uncomment and use if the upper procedural method
$post = array('filepath' => "/some/image.jpg",'upload'=>$cfile);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer '.$result["payload"]["token"]
));
$result=json_decode(curl_exec ($ch),true);
curl_close ($ch);
var_dump($result);