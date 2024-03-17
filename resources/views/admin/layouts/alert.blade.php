@if (Session::has('error'))
    <div class="alert alert-danger" id="success-danger">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            $('#success-danger').fadeOut('fast');
        }, 2000);
    </script>
@endif


@if (Session::has('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
<script>
    setTimeout(function() {
        $('#success-alert').fadeOut('fast');
    }, 2000);
</script>
@endif
