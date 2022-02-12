<?php
header('Access-Control-Allow-Origin: *');


require "vendor/autoload.php";

$access_token = 'OYm/oMDP/y/rwNpxD0LqfbImJ8VzWgjkiO0LgK3bueLCMkCdipHBZxn1XZg9hN6hBZt+tqXn5O2BHeYJ+lZVQZGOvGOHIxTH4jTf8rXICcic/CsYIKxGtQBYmgi/du/cmzl3602tpyf3Pmph3ImRywdB04t89/1O/w1cDnyilFU=';

$channelSecret = '69666571f9392e51b6a41fd69628d8d0';

if(isset($_POST['userid'])){ 
$pushID = $_POST['userid'];
}else{
$pushID = 'U1c5dc7c1232c2412eeef8c1a04d60c9a';
}

// $pushID = 'U3a1bd70fc420890bda59a10ca4bd5e66';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world Test Systems Fuck!!!');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo json_encode($response->getHTTPStatus());
// echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







