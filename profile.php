<?php


$access_token = 'OYm/oMDP/y/rwNpxD0LqfbImJ8VzWgjkiO0LgK3bueLCMkCdipHBZxn1XZg9hN6hBZt+tqXn5O2BHeYJ+lZVQZGOvGOHIxTH4jTf8rXICcic/CsYIKxGtQBYmgi/du/cmzl3602tpyf3Pmph3ImRywdB04t89/1O/w1cDnyilFU=';

if(isset($_POST['userid'])){
  $userId = $_POST['userid'];
}else{
  $userId = 'U1c5dc7c1232c2412eeef8c1a04d60c9a';
}


$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

