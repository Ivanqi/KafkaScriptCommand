<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\TopicCommand;


$opt = getopt("s:z:p:t:");
if (empty($opt) || count($opt) < 4) {
    print_r(TopicCommand::$alterTopicDesc);
    exit;
}
$ret = TopicCommand::alterTopic($opt['s'], $opt['z'], (int) $opt['p'], $opt['t']);
print_r($ret);