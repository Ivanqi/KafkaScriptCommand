<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\TopicCommand;


$opt = getopt("t:p:r:s:z:");
if (empty($opt) || count($opt) < 5) {
    print_r(TopicCommand::$createTopicDesc);
    exit;
}
$ret = TopicCommand::createTopic($opt['t'], (int )$opt['p'], (int) $opt['r'], $opt['s'], $opt['z']);
print_r($ret);