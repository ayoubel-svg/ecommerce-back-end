<!DOCTYPE html>
<html>

<head>
    <title>Forget Password</title>
</head>

<body>
    <p>Click the link below to reset your password:</p>
    <a href="{{ $resetLink . '?token=' . $resetToken }}">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
</body>

</html>
