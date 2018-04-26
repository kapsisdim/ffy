<!DOCTYPE html>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title></title>
    </head>
    <body>
        <h1><a href="/" style="color:black;text-decoration: none;">Food For You</a></h1>
        
        <div class="header">
            <h2>Sign up</h2>
        </div>
        
        <form class="form" method="post" action="/register">            
            <div class="input">
                <label>Username</label>
                <input type="text" name="username" required/>
            </div>
            <div class="input">
                <label>Email</label>
                <input type="text" name="email" required/>
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password_1" required/>
            </div>
            <div class="input">
                <label>Confirm Password</label>
                <input type="password" name="password_2" required/>
            </div>
            <div class="input">
                <input type="submit" value="Regiser" name="register" class="btn" style="width:70px;">
            </div>
            <br><p style="font-size: small">Already a member? <a href="/signin">Sign in</a></p>
        </form>
        
    </body>
</html>

