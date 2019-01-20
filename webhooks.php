<?php 

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = "";

$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {
	
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$text = $event['message']['text'];
			$replyToken = $event['replyToken'];
			$messages = setText($text);
			sentToLine( $replyToken , $access_token  , $messages );
		}
	}
}

function setText( $text){
	$messages = [
		'type' => 'text',
		'text' => $text
	];
	return $messages;
}

function sentToLine($replyToken , $access_token  , $messages ){
	$url = 'https://api.line.me/v2/bot/message/reply';
	$data = [
		'replyToken' => $replyToken,
		'messages' => [$messages],
	];
	$post = json_encode($data);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";
}
