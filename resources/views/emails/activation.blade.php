

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to Adnexio {{$name}}</h2>
<br/>
Your registered email address is {{$email}}.<br><br>Please click on the below link to verify your email account.
<br/><br>
<a href="{{url('user/activation', $link)}}">Verify Email</a>
</body>

</html>