const httpServer = require("http").createServer();
const io = require("socket.io")(httpServer, {
    cors: {
        origin: "*"
    },
    multiplex: false
})
const {Kafka} = require('kafkajs')

let hasConnectedOnKafka = false

const kafka = new Kafka({
    clientId: 'group.id',
    brokers: ['kafka:9092'],

})
const consumer = kafka.consumer({groupId: 'group.id'})
io.on("connection", async () => {
    const consumer = await run()
    await consumer.run({
        eachMessage: async ({topic, message, partition}) => {
            console.log({
                partition,
                offset: message.offset,
                value: JSON.parse(message.value.toString()),
            })
            io.emit("account", JSON.parse(message.value.toString()))
        },
    })
});

const run = async () => {
    if (hasConnectedOnKafka) return consumer
    await consumer.connect()
    hasConnectedOnKafka = true
    await consumer.subscribe({topic: 'account', fromBeginning: true})
    return consumer
}

httpServer.listen(3000);
