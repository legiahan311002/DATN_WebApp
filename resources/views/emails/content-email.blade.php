<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực email</title>
</head>
<body>
    <h2>Xác thực email</h2>

    <p>Cảm ơn bạn đã đăng ký tại SEASIDE STORE! Để bắt đầu sử dụng tài khoản của bạn, bạn vui lòng xác thực địa chỉ email của mình bằng cách nhấp vào liên kết dưới đây:</p>
    <a href="{{ URL::to('/email/verify/' . $user->email_verification_token) }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none; border-radius: 5px;">
        Xác thực Email
    </a>
    <p>Nếu liên kết trên không hoạt động, bạn có thể copy và dán đường dẫn sau vào trình duyệt của bạn: <br>{{ URL::to('/email/verify/' . $user->email_verification_token) }}</p>

    <p>Cảm ơn bạn đã tham gia cùng chúng tôi!</p>
    <p>Trân trọng,</p>
    <p>SEASIDE STORE</p>
</body>
</html>
