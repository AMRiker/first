<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Sing in</title>
</head>
<body class="text-secondary">
    <form method="post" action="../index.php/enter">
    <div><label for= "login"> Login <input type="text" name= "login"
                                           required placeholder="Type your login"></label></div>
    <br>
    <div><label for= "password"> Password <input type= "password" name= "password"
                                                 required placeholder="Enter your password" ></label></div>
    <br>
    <button type="submit"> Sing in </button>
    </form>
</body>
</html>