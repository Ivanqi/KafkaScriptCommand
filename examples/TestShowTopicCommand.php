<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\TopicCommand;


$opt = getopt("s:z:t:");
if (empty($opt) || count($opt) < 3) {
    print_r(TopicCommand::$showTopicDesc);
    exit;
}
$ret = TopicCommand::showTopic($opt['s'], $opt['z'], $opt['t']);
print_r($ret);