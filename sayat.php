<?php 

ob_start();
define('API_KEY','691247105:AAGqfwPzONgXk-hSRUsdgOoScSVP4MGoLo8');
$admin = "325394922";
function bot($method,$datas=[]){
	$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($CH,CURLOPT_POSTFIELDS,$datas);
	$res = curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;

if($text){
	bot('snedMessage',[
	'chat_id'=>$chat_id,
	'text'=>'hello'
	]);
}

?>
