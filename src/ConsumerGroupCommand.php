<?php declare(strict_types=1);
namespace KafkaScriptCommand;
class ConsumerGroupCommand {
    
    public static $showConsumerGroupDesc = [
        '使用语法: show_consumer_group 脚本路径 kafka地址',
        'usage: show_consumer_group bin/kafka-consumer-groups.sh localhost:9092'
    ];
    /**
     * 获取消费组
     * @param $scriptPath 脚本地址
     * @param $kafkaAddr kafka地址
     */
    public static function showConsumerGroup(string $scriptPath, string $kafkaAddr): string
    {
        $execTemp = '%s --bootstrap-server %s --list';
        $execCommand = sprintf($execTemp, $scriptPath, $kafkaAddr);
        $ret = shell_exec($execCommand);
        return $ret;
    }

    
    public static $showConsumeptionpDesc = [
        '使用语法: show_consumeption 组名 脚本路径 kafka地址',
        'usage: show_consumeption test bin/kafka-consumer-groups.sh localhost:9092'
    ];
    /**
     * 查看消费组消费情况
     * @param $scriptPath 脚本地址
     * @param $kafkaAddr kafka地址
     */
    public static function showConsumeption(string $groupName, string $scriptPath, string $kafkaAddr): string
    {
        $execTemp = '%s --bootstrap-server %s --describe --group %s';
        $execCommand = sprintf($execTemp, $scriptPath, $kafkaAddr, $groupName);
        $ret = shell_exec($execCommand);

        $search = ['CURRENT-OFFSET', 'LOG-END-OFFSET', 'LAG'];
        $replace = ['当前消费的条数', '总条数', '未消费的条数'];
        $ret = str_replace($search, $replace, $ret);
        return $ret;
    }
}