<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\TopicCommand;


$opt = getopt("t:s:z:");
if (empty($opt) || count($opt) < 3) {
    print_r(TopicCommand::$showTopicDesc);
    exit;
}
$ret = TopicCommand::showTopic($opt['t'], $opt['s'], $opt['z']);
print_r($ret);