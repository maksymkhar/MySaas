@if(session()->has('flash_message'))
    <script>
        swal({
            title: "CORRECT!",
            text: "All right! Closing..",
            timer: 2000,
            type: "success",
            confirmButtonText: "Close"
        });
    </script>
@endif