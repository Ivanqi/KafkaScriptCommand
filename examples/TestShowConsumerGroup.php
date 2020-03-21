<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\ConsumerGroupCommand;


$opt = getopt("s:k:");
if (empty($opt) || count($opt) < 2) {
    print_r(ConsumerGroupCommand::$showConsumerGroupDesc);
    exit;
}
$ret = ConsumerGroupCommand::showConsumerGroup($opt['s'], $opt['k']);
print_r($ret);