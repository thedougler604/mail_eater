#!/usr/bin/php
<?php

$path = dirname(__FILE__) . '/';

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once("php-mime-mail-parser-read-only/MimeMailParser.class.php");
$Parser = new MimeMailParser();
$Parser->setStream(fopen("php://stdin","r"));
$html = $Parser->getMessageBody('html');
$text = $Parser->getMessageBody('text');

unlink($path . 'html.html');
$fh = fopen($path . 'html.html','a');
fwrite($fh, $html);
unlink($path . 'text.txt');
$fh = fopen($path . 'text.txt','a');
fwrite($fh, $text);

die("\nfinished\n");