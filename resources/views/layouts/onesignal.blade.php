@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div id="app">

                    <div class="hello">
                        <h1>@{{ msg }}</h1>

                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Direct Chat</h3>

                                <div class="box-tools pull-right">
                                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-green">@{{total}}</span>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg" v-for="notification in notifications">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">Pushwoosh</span>
                                            <span class="direct-chat-timestamp pull-right">@{{ notification.date }}</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            @{{ notification.message }}
                                            <span class="pull-right">
                                <button v-on:click="removeNotification(notification)" type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                            </span>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                </div>
                                <!--/.direct-chat-messages-->


                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="input-group">
                                    <input id="message" type="text" name="message" placeholder="Type Message ..." class="form-control"
                                           v-model="notificationMessage"
                                           @keyup.enter="addNotification">
                              <span class="input-group-btn">
                                  <button v-on:click="addNotification" type="button" class="btn btn-success btn-flat">Send</button>
                                  <button v-on:click="clear" type="button" class="btn btn-danger btn-flat">Clear</button>
                              </span>
                                </div>
                            </div>
                            <!-- /.box-footer-->
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/vue/latest/vue.js"></script>

        <script>
            //import Vue from 'vue'
            //import moment from 'moment';

            (function (exports) {

                'use strict';

                var STORAGE_KEY = 'PUSHWOOSH_NOTIFICATIONS';

                exports.notificationStorage = {
                    fetch: function () {
                        return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
                    },
                    save: function (todos) {
                        localStorage.setItem(STORAGE_KEY, JSON.stringify(todos));
                    }
                };

            })(window);

            new Vue({
                el: 'body',
                components: { app },
                data () {
                    return {
                        msg: 'Hello World!',
                        notificationMessage: '',
                        notifications: notificationStorage.fetch()
                    }
                },
                computed: {
                    total: function () {
                        return this.notifications.length;
                    }
                },
                watch: {
                    notifications: {
                        handler: function (notifications) {
                            notificationStorage.save(notifications);
                        },
                        deep: true
                    }
                },
                methods: {
                    addNotification: function() {
                        var value = this.notificationMessage && this.notificationMessage.trim();
                        if (!value) { return; }
                        this.notifications.push({ message: value, date: "moment"});
                        this.notifyWithAjax();
                        this.notificationMessage = '';
                    },
                    removeNotification: function (notification) {
                        this.notifications.$remove(notification);
                    },
                    clear: function () {
                        this.notifications = [];
                        notificationStorage.save([]);
                    },
                    notifyWithAjax: function() {
                        //var notification = {message:$('#message').val(), date:"Now"};
                        //this.notifications.push(notification);
                        //notificationStorage.save(this.notifications);
                        //Pushwoosh
//                $.ajax({
//                    type: "POST",
//                    url: "https://cp.pushwoosh.com/json/1.3/createMessage",
//                    data: JSON.stringify({
//                        "request": {
//                            "application": "4FC89B6D14A655.46488481",
//                            "auth": "mTdns0j6qLYPa/A5htmD46xVyoxdVQfPBz7NRqYYHz9PhvKXgJtOkAY+yo0YTXDEoztQAJFY0JmXnd89tf59",
//                            "notifications": [{
//                                "send_date": "now",
//                                "ignore_user_timezone": true,
//                                "content": this.notificationMessage
//                            }]
//                        }
//                    }),
//                    dataType: "json"
//                }).done(function(data) {
//                    console.log(data);
//                });
                        // OneSignal
                        $.ajax({
                            type: "POST",
                            url: "https://onesignal.com/api/v1/notifications",
                            headers: {
                                "Authorization": "Basic OWI2OGE1MDctYWFlZC00ZGYwLTkxOTMtZDAyOWJhNWIwYjFk",
                                "Content-Type": "application/json"
                            },
                            data: JSON.stringify({
                                "app_id": "1612eca0-0bab-4126-bbfa-bcc8c341c036",
                                "included_segments": ["All"],
                                "data": {"foo": "bar"},
                                "isAndroid":true,
                                "contents": {"en": this.notificationMessage,"es": this.notificationMessage},
                                "headings": {"en": "Wake up!","es": "Despierta!"}
                            })
                        }).done(function(data) {
                            console.log(data);
                        });
                    }
                }
            });

        </script>

@endsection
