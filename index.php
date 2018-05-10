<?php

require 'vendor/autoload.php';

$token = 'YOUR LINE NOTIFY TOKEN';
$ln = new KS\Line\LineNotify('7nVEjAM8Cv5nIJWGwGYFYDhffReNi3rg0CsnuBinGiP');

$text = 'Hello Line Notify';
$ln->send($text);

?>