<?php // callback.php
//require "vendor/autoload.php";
//require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
//$access_token = 'F91qn9+cosBSeiXmO5rTLn1pAU+yUw1AxXvGDPRtlL4IO8GgIwwdXIVb/HgPkoAcQh1InmIbH1kOl8OI5DkoM3vw3gejfxXL5iyn5OJ+dQTQ6VRd7QMk555tNZQOY7uQf6B5sH6tBusMXtpaeRyFaAdB04t89/1O/w1cDnyilFU=';
//
//// Get POST body content
//$content = file_get_contents('php://input');
//// Parse JSON
//$events = json_decode($content, true);
//// Validate parsed JSON data
//if (!is_null($events['events'])) {
//// Loop through each event
//    foreach ($events['events'] as $event) {
//// Reply only when message sent is in 'text' format
//        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
//// Get text sent
//            $text = setMessage($events);
//// Get replyToken
//            $replyToken = $event['replyToken'];
//// Build message to reply back
//            $messages = [
//                'type' => 'text',
//                'text' => $text
//            ];
//// Make a POST Request to Messaging API to reply to sender
//
//        }
//
//        $url = 'https://api.line.me/v2/bot/message/reply';
//        $data = [
//            'replyToken' => $replyToken,
//            'messages' => [$messages],
//        ];
//
//        $post = json_encode($data);
//        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//        $result = curl_exec($ch);
//        curl_close($ch);
//        echo $result . "\r\n" . $replyToken;
//    }
//}
//
//function setMessage($event) {
//    return 'testtttt'.$event['events']['source']['type']['userId'];
//}
    $accessToken = "F91qn9+cosBSeiXmO5rTLn1pAU+yUw1AxXvGDPRtlL4IO8GgIwwdXIVb/HgPkoAcQh1InmIbH1kOl8OI5DkoM3vw3gejfxXL5iyn5OJ+dQTQ6VRd7QMk555tNZQOY7uQf6B5sH6tBusMXtpaeRyFaAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);

    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";

    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
}
   exit;
?>