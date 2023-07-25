<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail reset</title>
</head>
<body>
Hello,<br><br>
You have reset your password and an email has been sent to you to reset it. Click the button below to complete resetting your password.<br>

<a target="_blank" href="{{ route('civilian.auth.reset-password', 'key='.$key) }}">Reset Password</a>

If you have not requested password reset, please ignore and delete this email.<br><br>


</body>
</html>
