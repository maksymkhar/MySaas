//Initialitze library requirements: express, socket.io and ioredires
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');

http.listen(4000, function() {
    console.log('Server is running!');
});

//Create new Redis instance
var redis = new Redis();

//Subscribe to all Redis Channels
redis.psubscribe('*', function(err, count) {
    //Nothing to do here?
    console.log('Errors subscribing to channel');
});

//Broadcast message when recieved from Redis on all channels
redis.on('pmessage', function(subscribed,channel, message) {

    console.log('Message Recieved at channel(' + channel + '): ' + message);

    message = JSON.parse(message);

    io.emit(channel, message.data);
});
