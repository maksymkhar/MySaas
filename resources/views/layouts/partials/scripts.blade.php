<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/main.js') }}" type="text/javascript"></script>

<!-- script src="{{ asset('/js/notificateShotOut.js') }}" type="text/javascript"></script-->

<script src="https://js.pusher.com/3.0/pusher.min.js"></script>


<script>

    var notifyUser = function (data) {

        if (!('Notification' in window)) {
            alert('Web Notification is not supported');
            return;
        }

        Notification.requestPermission(function(permission){

            var notification = new Notification(data.shoutOut.user.email +' said:', {
                body: data.shoutOut.content,
                icon: data.shoutOut.user.avatar
            });
        });
    };

    Pusher.log = function(message) {
        if (window.console && window.console.log) {
            window.console.log(message);
        }
    };

    var pusher = new Pusher('3b45f2461bd87c9abfff', {
        encrypted: true
    });

    var channel = pusher.subscribe('shoutout-added');
    channel.bind("App\\Events\\ShoutOutAdded", notifyUser);

</script>

@yield('custom_scripts', '')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->