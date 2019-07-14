<?php

require 'vendor/autoload.php';

$token = 'GfU8F9KoNTxMIMa7oZ2ZR/MLdWQ6JqmgW+JC+18STtapNz3hlczHz7MFH65y/cigdqm+lYHAR6LBsUeyHgkhnuaCdc/iSeMAz8DMmh7YG8QABiVBidCEd1tqdyp5Y7xG2SmUjgNxD1ZXmicmJKb06AdB04t89/1O/w1cDnyilFU=';
$ln = new KS\Line\LineNotify('7nVEjAM8Cv5nIJWGwGYFYDhffReNi3rg0CsnuBinGiP');

$text = 'Hello Line Notify';
$ln->send($text);

?>
