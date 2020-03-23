<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\TopicCommand;


$opt = getopt("t:p:s:z:");
if (empty($opt) || count($opt) < 4) {
    print_r(TopicCommand::$alterTopicDesc);
    exit;
}
$ret = TopicCommand::alterTopic($opt['t'], (int) $opt['p'], $opt['s'], $opt['z']);
print_r($ret);