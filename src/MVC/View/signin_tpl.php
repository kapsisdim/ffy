<!DOCTYPE html>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">    
        <title></title>
    </head>
    <body>
        <h1><a href="/" style="color:black; text-decoration: none;">Food For You </a></h1>
        
        <div class="header">
            <h2>Sign in</h2>
        </div>
        
        <form class="form" method="post" action="/signin">
            <div class="input">
                <label>Username</label>                               
                <input type="text" name="username" required/>
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password" required/>
            </div>
            
            <div class="input">
                <input type="submit" value="Sign in" name="signin" class="btn" style="width:70px;">
            </div>
            <br><p style="font-size: small">Not a member? <a href="/register">Sign up</a></p>
        </form>
        
    </body>
</html>