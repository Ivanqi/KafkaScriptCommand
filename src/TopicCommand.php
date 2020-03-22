<?php declare(strict_types=1);
namespace KafkaScriptCommand;

class TopicCommand
{
    public static $createTopicDesc = [
        '使用语法: create_topic 脚本路径 zookeeper地址 paritions数量 topic名称 备份个数',
        'usage: create_topic bin/kafka-topics.sh localhost:2181 1 test 1'
    ];
    
    /**
     * 创建topic
     * @param $scriptPath 脚本地址
     * @param $zkAddr zookeeper 地址
     * @param $partions partitions个数
     * @param $topicName topic名称
     * @param $replication 备份个数
     */
    public static function createTopic(string $scriptPath, string $zkAddr, int $partitions, string $topicName, int $replication = 1): string
    {
        $execTemp = "%s --create --zookeeper %s --replication-factor %d --partitions %d --topic %s";
        $execCommand = sprintf($execTemp, $scriptPath, $zkAddr, $replication, $partitions, $topicName);
        $ret = shell_exec($execCommand);
        return $ret;
    }

    public static $alterTopicDesc = [
        '使用语法: alter_topic 脚本路径 zookeeper地址 paritions数量 topic名称',
        'usage: alter_topic bin/kafka-topics.sh localhost:2181 1 test'
    ];

    /**
     * 修改topic
     * @param $scriptPath 脚本地址
     * @param $zkAddr zookeeper地址
     * @param $partions paritions个数
     * @param $topicName topic名称
     */
    public static function alterTopic(string $scriptPath, string $zkAddr, int $partions, string $topicName): string
    {
        $execTemp = "%s --alter --zookeeper %s --partitions %d --topic %s";
        $execCommand = sprintf($execTemp, $scriptPath, $zkAddr, $partions, $topicName);
        $ret = shell_exec($execCommand);
        return $ret;
    }

    public static $showTopicDesc = [
        '使用语法: show_topic 脚本路径 zookeeper地址 topic名称',
        'usage: show_topic bin/kafka-topics.sh localhost:2181 test[all]'
    ];

    /**
     * 查看topic
     * @param $scriptPath 脚本地址
     * @param $zkAddr zookeeper地址
     * @param $topicName topic名称
     */
    public static function showTopic(string $scriptPath, string $zkAddr, string $topicName): string
    {
        $execTemp = "%s --describe --zookeeper %s";
        if ($topicName != 'all') {
            $execTemp .= ' --topic %s';
            $execCommand = sprintf($execTemp, $scriptPath, $zkAddr, $topicName);
        } else {
            $execCommand = sprintf($execTemp, $scriptPath, $zkAddr);
        }
        $ret = shell_exec($execCommand);

        return $ret;
    }
}