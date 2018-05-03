<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
        <title></title>
    </head>
    
    <body>
        <div class="page-header" style="background-color:#DEB887; margin-top: 0; padding-top: 10px">
            <h1><a href="/" id="title">Food For You</a></h1>
        </div>

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color:#31708f; background-color:#d9edf7"><strong>Sign In</strong></div>
                        <div class="panel-body">

                            <form class="form" method="post" action="/signin">

                                <div class="form-group">
                                    <span><i class="glyphicon glyphicon-user"></i></span>
                                    <label for="username">Username</label>                               
                                    <input id="username" type="text" name="username" placeholder="Enter your Username" required class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <span>
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                    <label for="password">Password</label>
                                    <input id="password" type="password" name="password" placeholder="Enter your Password" required class="form-control"/>
                                </div>
                                
                                <input class="btn btn-success" type="submit" value="Sign in" style="margin-bottom:20px;">

                                <div style="border-top:1px solid#888; padding-top:15px font-size:85%;"> 
                                    <p style="font-size: large"><br><strong>Not a member? </strong><a href="/register">Sign up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>


            </div>

        </div>
    <!--
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
     -->   
    <script src="/js/bootsrap.min.js"></script>
    </body>
</html>