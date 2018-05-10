<?php
$access_token = 'F91qn9+cosBSeiXmO5rTLn1pAU+yUw1AxXvGDPRtlL4IO8GgIwwdXIVb/HgPkoAcQh1InmIbH1kOl8OI5DkoM3vw3gejfxXL5iyn5OJ+dQTQ6VRd7QMk555tNZQOY7uQf6B5sH6tBusMXtpaeRyFaAdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;