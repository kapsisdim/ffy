<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
    </head>

    <body>
        <div class ="row">

            <div class="page-header col-md-12" style="background-color:#DEB887; margin-top: 0px; margin-bottom:0px; padding-bottom:0px; border-bottom-width:0px;">
                <div class="col-md-12">
                    <h1><a href="/" id="title" >Food For You</a></h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-inverse" style="border-radius:0px;">
                    <div class="container-fluid ">

                        <div class="col-md-8">
                            <ul class="nav navbar-nav">

                                <li class="active"><a href="/">Home</a></li>

                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Menu
                                <span class="caret"></span></a>
                    
                                    <ul class="dropdown-menu">
                                        <li><a href="/products/Burgers">Burgers</a></li>
                                        <li><a href="/products/Pizzas">Pizza</a></li>
                                        <li><a href="/products/Pasta">Pasta</a></li>
                                        <li><a href="/products/Drinks">Drinks</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Info</a></li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="/signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </nav>
            </div>

        </div>

        <div class="container" style="margin-bottom:50px;">

            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="panel-heading panel-heading-color"><label>Sign Up</label></div>
                    <div class="panel-body panel-body-style">

                        <form class="form" method="post" action="/register">

                            <div class="form-group">
                                <span><i class="glyphicon glyphicon-user"></i></span>
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" placeholder="Enter your Username" required class="form-control"/>
                            </div>

                            <div class="form-group">
                                <span><i class="glyphicon glyphicon-envelope"></i></span>
                                <label for"email">Email</label>
                                <input id="email" class="form-control" name="email" type="text" placeholder="Enter your Email" requied/>
                            </div>

                            <div class="form-group">
                                <span><i class="glyphicon glyphicon-lock"></i></span>
                                <label for "password">Password</label>
                                <input id="password" type="password" name="password_1" placeholder="Enter you Password" required class="form-control"/>
                            </div>

                            <div class="form-group">
                                <span><i class="glyphicon glyphicon-lock"></i></span>
                                <label for="password">Confirm Password</label>
                                <input id="password" type="password" name="password_2" placeholder="Confirm your Password" required class="form-control"/>
                            </div>

                            <input class="btn btn-success" type="submit" value="Sign up" style="margin-bottom:20px;">

                            <div style="border-top:1px solid#888; padding-top:15px font-size:85%;"> 
                                <p><br><strong>Already a member? </strong><a href="/signin">Sign in</a></p>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>             

        <div class="row">

            <div class="col-md-12" style="margin-top:-50px;">
                <div class="search-text "> 
                    <div class="container">
                        <div class="row text-center">
                        
                        <div class="form">
                            <h5>SIGN UP TO OUR NEWSLETTER</h5>
                                <form id="search-form" class="form-search form-horizontal">
                                    <input type="text" class="input-search" placeholder="Email Address">
                                    <button type="submit" class="btn-search">SUBMIT</button>
                                </form>
                            </div>
                        
                        </div>         
                    </div>     
                </div>
            </div>

            <footer>

                <div class="container">
                    <div class="row text-center">
                            
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="menu">
                                <span>Blogs</span>    
                                <li>
                                    <a href="#">Blog 1</a>
                                </li>
                                    
                                <li>
                                    <a href="#">Blog 2</a>
                                </li>
                                    
                                <li>
                                <a href="#">Blog 3</a>
                                </li>
                                
                                <li>
                                <a href="#">Blog 4</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="menu">
                                <span>Menu</span>    
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                    
                                <li>
                                    <a href="#">About</a>
                                </li>
                                    
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                                    
                                <li>
                                    <a href="#">Gallery </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="adress">
                                <span>LINKS</span>       
                                <li>
                                    <a href="#">Gallery 1</a>
                                </li>
                                    
                                <li>
                                    <a href="#">Gallery 2</a>
                                </li>
                                    
                                <li>
                                <a href="#">Gallery 3</a>
                                </li>
                                
                                <li>
                                <a href="#">Gallery 4</a>
                                </li>
                            </ul>
                        </div>
                    
                    
                        <div class="col-lg-8 col-lg-offset-2" id="icons">
                            <div class="col-lg-2">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#"><i class="fa fa-github"></i></a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#"><i class="fa fa-tumblr"></i></a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="col-lg-2">
                                <a href="#"><i class="fa fa-dropbox"></i></a>
                            </div>
                        </div>                        
                    
                    </div> 
                </div>

            </footer>

        </div>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    </body>
</html>

