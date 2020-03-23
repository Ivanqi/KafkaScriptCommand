<?php declare(strict_types=1);
namespace KafkaScriptCommand;

class TopicCommand
{
    public static $createTopicDesc = [
        '使用语法: create_topic topic名称 paritions数量 备份个数 脚本路径 zookeeper地址',
        'usage: create_topic test 1 1 bin/kafka-topics.sh localhost:2181'
    ];
    
    /**
     * 创建topic
     * @param $topicName topic名称
     * @param $partions partitions个数
     * @param $replication 备份个数
     * @param $scriptPath 脚本地址
     * @param $zkAddr zookeeper 地址
     */
    public static function createTopic(string $topicName, int $partitions , int $replication = 1, string $scriptPath, string $zkAddr): string
    {
        $execTemp = "%s --create --zookeeper %s --replication-factor %d --partitions %d --topic %s";
        $execCommand = sprintf($execTemp, $scriptPath, $zkAddr, $replication, $partitions, $topicName);
        $ret = shell_exec($execCommand);
        return $ret;
    }

    public static $alterTopicDesc = [
        '使用语法: alter_topic topic名称 paritions数量 脚本路径 zookeeper地址',
        'usage: alter_topic test 1 bin/kafka-topics.sh localhost:2181'
    ];

    /**
     * 修改topic
     * @param $topicName topic名称
     * @param $partions paritions个数
     * @param $scriptPath 脚本地址
     * @param $zkAddr zookeeper地址
     */
    public static function alterTopic(string $topicName, int $partions, string $scriptPath, string $zkAddr): string
    {
        $execTemp = "%s --alter --zookeeper %s --partitions %d --topic %s";
        $execCommand = sprintf($execTemp, $scriptPath, $zkAddr, $partions, $topicName);
        $ret = shell_exec($execCommand);
        return $ret;
    }

    public static $showTopicDesc = [
        '使用语法: show_topic topic名称 脚本路径 zookeeper地址',
        'usage: show_topic test[all] bin/kafka-topics.sh localhost:2181'
    ];

    /**
     * 查看topic
     * @param $topicName topic名称
     * @param $scriptPath 脚本地址
     * @param $zkAddr zookeeper地址
     */
    public static function showTopic(string $topicName, string $scriptPath, string $zkAddr): string
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