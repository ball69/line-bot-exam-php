<?php



require "vendor/autoload.php";

$access_token = 'F91qn9+cosBSeiXmO5rTLn1pAU+yUw1AxXvGDPRtlL4IO8GgIwwdXIVb/HgPkoAcQh1InmIbH1kOl8OI5DkoM3vw3gejfxXL5iyn5OJ+dQTQ6VRd7QMk555tNZQOY7uQf6B5sH6tBusMXtpaeRyFaAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '1b33b8ecf28ddb587f0b7e15875ef701';

$pushID = 'U3751e9be717b7e8cc5b28e6fc22066aa';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







