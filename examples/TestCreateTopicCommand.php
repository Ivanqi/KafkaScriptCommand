<?php declare(strict_types=1);
require_once "../vendor/autoload.php";

use KafkaScriptCommand\TopicCommand;


$opt = getopt("s:z:p:t:r:");
if (empty($opt) || count($opt) < 5) {
    print_r(TopicCommand::$createTopicDesc);
    exit;
}
$ret = TopicCommand::createTopic($opt['s'], $opt['z'], (int) $opt['p'], $opt['t'], (int) $opt['r']);
print_r($ret);