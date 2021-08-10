<?php

namespace PhpConsumer\Infra\Messaging\Kafka;

final class KafkaProducer
{
    public function sendMessage(string $message): void
    {
        $conf = new \RdKafka\Conf();
        $conf->set('log_level', (string) LOG_DEBUG);
        $conf->set('debug', 'all');
        $rk = new \RdKafka\Producer($conf);
        $rk->addBrokers("kafka:9092");
        $topic = $rk->newTopic("account");
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
        $rk->flush(3000);
    }
}
