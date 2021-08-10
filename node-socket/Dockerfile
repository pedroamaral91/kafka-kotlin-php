FROM node:lts-alpine

RUN mkdir /app

WORKDIR /app

COPY package.json package.json

COPY yarn.lock yarn.lock

RUN yarn install

COPY . .

CMD ["yarn", "dev"]
