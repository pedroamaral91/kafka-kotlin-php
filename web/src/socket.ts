import {io, Socket} from "socket.io-client";

export class SocketService {
    private socket: Socket
    public constructor() {
        console.log("entrouihasduidhuias")
        this.socket = io('ws://0.0.0.0:3001')
    }

    public listen(channel: string, callback: any) {
        this.socket.on(channel, (acc) => callback(acc))
    }

    public disconnect() {
        console.log("desconectou")
        this.socket.disconnect()
    }
}
