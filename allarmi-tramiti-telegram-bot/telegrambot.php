#!/usr/bin/php

<?php
$telegrambot='000000000:***********************************'; //qui occorre inserire le credenziali rilasciati da BotFather

function telegram($msg) {
  global $telegrambot,$argv;
  $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data=array('chat_id'=>$argv[1],'text'=>$msg);
  $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
  $context=stream_context_create($options);
  $result=file_get_contents($url,false,$context);
  return $result;
}

$MEX = '';
$MEX .= isset($argv[2]) && strlen($argv[2])>0 ? $argv[2] : '';
$MEX .= isset($argv[3]) && strlen($argv[3])>0 ? "\n".$argv[3] : '';

telegram($MEX);
?>
