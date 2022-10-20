<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="styleFirst.css" type="text/css">
    <meta charset="utf-8">
    <title>It's my first page</title>
</head>
<br>
<h2> Registration </h2>
<form method="post" action="../index.php/registration">
    <div><label for= "login">
            Login <input type="text" name= "login"
                         required placeholder="Choose your Login"></label>
    </div><br>
    <div><label for= "password">
            Password <input type= "password" name= "password"
                            required placeholder="Think the password" > </label>
    </div><br>
    <div><label for= "confirm your password">
            Password <input type= "password" name= "confirm_password"
                            required placeholder="Confirm the password" > </label>
    </div><br>
    <div><label for= "name">
            Username <input type= "text" name= "username"
                            required placeholder="Type your name"> </label>
    </div><br>
    <div><label for= "age">
            Age <input type= "number" name= "age"
                       required placeholder="How old are you?"> </label>
    </div><br>
    <div><label for="sex"> Choose your sex </label>
      <select name="sex">
        <option> Your sex </option>
        <option value="Male"> Male </option> 
        <option value="Female"> Female </option> 
	    <option value="Other"> Other </option>
      </select> 
      <div class="select-arrow"></div> 
    </div><br>
<button type="submit"> Send </button>
</form>
</html>