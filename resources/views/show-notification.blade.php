@extends('layout')
@section('main-section')
    <h1>Pusher Test with Icons</h1>
    <p>
        Try publishing an event to channel <code>notification</code>
        with event name <code>test.notification</code>.
    </p>
@endsection

@section('script')
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f5ee27e92f362ea7c29b', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('push-notification');
        channel.bind('test.push-notification', function(data) {
            console.log("Received Data", data);

            // Display Toastr notification with icons and inline content
            if (data.author && data.title) {
                toastr.info(
                    `<div class="notification-content">
                        <i class="fas fa-user"></i> <span>   ${data.author}</span>
                        <i class="fas fa-book" style="margin-left: 20px;"></i> <span>  ${data.title}</span>
                    </div>`,
                    'New Post Notification', {
                        closeButton: true,
                        progressBar: true,
                        timeOut: 0, // Set timeOut to 0 to make it persist until closed
                        extendedTimeOut: 0, // Ensure the notification stays open
                        positionClass: 'toast-top-right',
                        enableHtml: true
                    }
                );
            } else {
                console.error('Invalid data received:', data);
            }
        });
    </script>
@endsection 



