<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\ConsumerGroupCommand;


$opt = getopt("g:s:k:");
if (empty($opt) || count($opt) < 3) {
    print_r(ConsumerGroupCommand::$showConsumeptionpDesc);
    exit;
}
$ret = ConsumerGroupCommand::showConsumeption($opt['g'], $opt['s'], $opt['k']);
print_r($ret);