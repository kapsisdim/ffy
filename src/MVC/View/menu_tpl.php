<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
        <title></title>
    </head>
    
    <body>

        <div class ="row">

            <div class="page-header col-md-12 page-header-style">
                <div class="col-md-12">
                    <h1><a href="/" id="title" >Food For You</a></h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-inverse border-radius-zero">
                    <div class="container-fluid ">

                        <div class="col-md-8">
                            <ul class="nav navbar-nav">

                                <li class="active"><a href="/">Home</a></li>

                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Menu
                                <span class="caret"></span></a>
                    
                                    <ul class="dropdown-menu">
                                        <li><a href="/products/Burgers">Burgers</a></li>
                                        <li><a href="/products/Pizzas">Pizzas</a></li>
                                        <li><a href="/products/Pasta">Pasta</a></li>
                                        <li><a href="/products/Drinks">Drinks</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Info</a></li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <?php if ($member): ?>
                                <ul class="nav navbar-nav navbar-right" style="margin-top:5px;">
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle padding-top-zero padding-bottom-zero" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h5 style="color:#9d9d9d;">
                                        <span class="glyphicon glyphicon-user"> Welcome <strong><?= $member->getUsername(); ?></strong></span><span class="caret pull-right"></span></h5>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/settings"><span class="glyphicon glyphicon-cog"></span>  Account Settings</a></li>
                                            <li><a href="/orders"><span class="glyphicon glyphicon-shopping-cart"></span>  Orders</a></li>
                                            <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            <?php else: ?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                    <li><a href="/signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                </ul>
                            <?php endif ?>
                        </div>
                        
                    </div>
                </nav>

            </div>

        </div>

        <div class ="row">

            <div class="row">
                <div class="container">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="panel-heading">
                            <h2>Menu</h2>
                        </div>
                    </div>
                
                </div>
            </div>

            <div class="row menu-container">

                <div class="container">
                    <div class = "row">
                        <div class="col-md-4 col-md-offset-2">
                                
                            <div class="panel-heading panel-heading-color">
                                <h4><?= $type;?></h4>
                            </div>

                            <div class="panel-body padding-zero">
                                <?php foreach($products as $product): ?>
                                    <li class="list-group-item" style="border-radius:0px;"><?= $product->getName()?><span class="badge"><?=$product->getPrice().'€';?></span>
                                    </li>
                                <?php endforeach ?>
                            </div>

                        </div>
                                    
                        <div class="col-md-2 col-md-offset-4 padding-left-zero padding-right-zero">
                            
                            <?php if ($member): ?>
                                <div class="row">
                                    <div class="panel-heading panel-heading-color">
                                        <h4><span class="fa fa-shopping-basket"></span>  Basket</h4>
                                    </div>

                                    <div class="panel-body padding-zero">
                                        <ul class="list-group">
                                            <?php if (!empty($basket)): ?>
                                                <?php foreach($basket as $product): ?>   
                                                    <li class="list-group-item">                      
                                                        <?= $product['product'].' '.'(x'.$product['quantity'].')';?><span class="badge"><?=$product['price'].'€';?></span>
                                                    </li>
                                                <?php endforeach ?>
                                            <br><p class="total-border"><strong>total: <?= $sum->getSum().'€'; ?></strong></p>
                                        
                                            <?php else: ?>
                                                <li class="list-group-item">(Basket empty)</li>
                                            <?php endif ?>
                                        </ul> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 padding-left-zero">
                                        <form method="get" action="/products">
                                            <input type="submit" class="btn btn-primary" value="Order" style="background-color:#3d6c8a">
                                        </form>
                                    </div>
                                </div>

                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">

            <div class="col-md-12">
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
