<h2 align="center">
 Kafka with Kotlin producer and Php consumer 📤️📥
</h2>

## Techs
- [Docker](https://www.docker.com/)
- [Traefik](https://doc.traefik.io/traefik/)
- [Kafka](https://kafka.apache.org/intro)
- [Socket.io](https://socket.io/)

## Summary

- [Overview](#overview)
- [Usage](#usage)
- [API](#api)

## Overview

### 1. Explanation
The project consist in one API rest made using Kotlin with quarkus framework and one small process in php that listsen an script with (while true) to consume kafka messages.
Basically, when we made a call in POST, a new user will be create and it will emit a message to Kafka test topic, and PHP script will consume that message creating a new bank account:

![Flow diagram example](https://raw.githubusercontent.com/pedroamaral91/kafka-kotlin-php/main/kafka-example.png)


## Usage

### 1. Clone repository:

```bash
$ git clone https://github.com/pedroamaral91/kafka-kotlin-php.git
```

### 2. Build quarkus package
```bash
$ cd kotlin-producer
$ ./mvnw package
```

### 3. Create a external network
```bash
$ docker network create kafkaexternal
```
### 3. Build images and up containers
```bash
$ docker-compose up
```

### 4. Access frontend to register a user
`http://web.kafka.localhost`

## API

Kotlin API REST has two routes.

### Users

```
POST /users
```

Saves a user in database 

**Parameters**

| Name  | Type | Description                    |
|--------|------|:-------------------------------|
| `name` | `string` |Username (e.g. Pedro Teste). |
| `email` | `string` |User email (e.g. pedro@pedro.com). |
| `password` | `string` |Password |

**Response**
- SUCCESS **204**


- FAILURE
  **400**
```json
 "error": "Invalid param error: email"
```
---
```
GET /users
```

Retrieve a list of users

**Response**
- SUCCESS **200**
```json
 "name": "Pedro Teste",
 "email": "pedro@pedro.com"
```


