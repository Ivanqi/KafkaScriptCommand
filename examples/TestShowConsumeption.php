<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\ConsumerGroupCommand;


$opt = getopt("s:k:g:");
if (empty($opt) || count($opt) < 3) {
    print_r(ConsumerGroupCommand::$showConsumeptionpDesc);
    exit;
}
$ret = ConsumerGroupCommand::showConsumeption($opt['s'], $opt['k'], $opt['g']);
print_r($ret);