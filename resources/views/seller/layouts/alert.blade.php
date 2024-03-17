@if (Session::has('error'))
    <div class="alert alert-danger" id="alert-danger">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            $('#alert-danger').fadeOut('fast');
        }, 2000);
    </script>
@endif


@if (Session::has('success'))
<div class="alert alert-success" id="alert-success">
    {{ session('success') }}
</div>
<script>
    setTimeout(function() {
        $('#alert-success').fadeOut('fast');
    }, 2000);
</script>
@endif
