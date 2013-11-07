#!/usr/bin/php
<?php
// $fd = fopen("php://stdin", "r");
// $email = "";
// while (!feof($fd)) {
//     $email .= fread($fd, 1024);
// }
// fclose($fd);

// unlink('/Users/dougmclean/www/mail_eater/email.txt');
// $fh = fopen('/Users/dougmclean/www/mail_eater/email.txt','a');
// fwrite($fh, $email);
// fclose($fh);
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once("php-mime-mail-parser-read-only/MimeMailParser.class.php");
$Parser = new MimeMailParser();
$Parser->setStream(fopen("php://stdin","r"));
//$Parser->setPath("/Users/dougmclean/www/mail_eater/email.txt");
$html = $Parser->getMessageBody('html');
$text = $Parser->getMessageBody('text');

unlink('/Users/dougmclean/www/mail_eater/html.html');
$fh = fopen('/Users/dougmclean/www/mail_eater/html.html','a');
fwrite($fh, $html);
unlink('/Users/dougmclean/www/mail_eater/text.txt');
$fh = fopen('/Users/dougmclean/www/mail_eater/text.txt','a');
fwrite($fh, $text);

die("\nfinished\n");