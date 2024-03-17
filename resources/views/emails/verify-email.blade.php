<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực email</title>
</head>

<body>
    <h2>Xác thực email</h2>

    @if (session('success'))
        <div>{!! session('success') !!}</div>
    @endif

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

</body>

</html>
