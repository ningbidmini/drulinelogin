<?php



require "vendor/autoload.php";

$access_token = 'OYm/oMDP/y/rwNpxD0LqfbImJ8VzWgjkiO0LgK3bueLCMkCdipHBZxn1XZg9hN6hBZt+tqXn5O2BHeYJ+lZVQZGOvGOHIxTH4jTf8rXICcic/CsYIKxGtQBYmgi/du/cmzl3602tpyf3Pmph3ImRywdB04t89/1O/w1cDnyilFU=';

$channelSecret = '69666571f9392e51b6a41fd69628d8d0';

$pushID = 'U1c5dc7c1232c2412eeef8c1a04d60c9a';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







