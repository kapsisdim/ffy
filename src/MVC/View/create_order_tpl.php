<!DOCTYPE html>

<html> 
    
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="style.css">
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
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Menu
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
                            <ul class="nav navbar-nav navbar-right" style="margin-top:5px;">
                                <li class="dropdown">
                                    <a href=""class="dropdown-toggle padding-top-zero padding-bottom-zero" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h5 style="color:#9d9d9d;">
                                        <span class="glyphicon glyphicon-user"> Welcome <strong><?= $username; ?></strong></span><span class="caret pull-right"></span></h5>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/settings"><span class="glyphicon glyphicon-cog"></span>  Account Settings</a></li>
                                        <li><a href="/orders"><span class="glyphicon glyphicon-shopping-cart"></span>  Orders</a></li>
                                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </nav>

            </div>

        </div>

        <div class="row">
            <div class ="container order-container">

                <div class="row">

                    <div class="col-md-10">
                        <div class ="row">

                            <div class="col-md-12">
                                <div class="panel-heading">
                                    <h2>Pick Your Order</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">

                                <form method="post" action="/addproduct">

                                    <div class="row" style="padding-bottom:30px;">
                                        <div class="col-md-4">
                                            <div class="panel-heading panel-heading-color">
                                                <h4>Burgers</h4>
                                            </div>
                                            <div class="panel-body padding-zero" style="padding:0px;">
                                                <?php foreach($burgers as $burger): ?>
                                                    <li class="list-group-item">
                                                        <input type="checkbox" name="checklist[]" value="<?= $burger->getName();?>">
                                                        <span class="pull-right">
                                                            <select name="quantity[<?= $burger->getName();?>]">
                                                                <option value="1">x1</option>
                                                                <option value="2">x2</option>
                                                                <option value="3">x3</option>
                                                                <option value="4">x4</option>
                                                                <option value="5">x5</option>
                                                                <option value="6">x6</option>
                                                                <option value="7">x7</option>
                                                                <option value="8">x8</option>
                                                                <option value="9">x9</option>
                                                                <option value="10">x10</option>
                                                                <option value="11">x11</option>
                                                                <option value="12">x12</option>
                                                                <option value="13">x13</option>
                                                                <option value="14">x14</option>
                                                                <option value="15">x15</option>
                                                                <option value="16">x16</option>
                                                                <option value="17">x17</option>
                                                                <option value="18">x18</option>
                                                                <option value="19">x19</option>
                                                                <option value="20">x20</option>
                                                            </select>
                                                        </span>
                                                        <?= $burger->getName()?>

                                                        <span class="badge" style="margin-top:5px; margin-right:10px"><?=$burger->getPrice().'€';?></span>                                                        
                                                    </li>

                                                <?php endforeach ?>
                                            </div>                                
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel-heading panel-heading-color">
                                                    <h4>Pizza</h4>
                                            </div>
                                            <div class="panel-body padding-zero">
                                                <?php foreach($pizzas as $pizza): ?>
                                                    <li class="list-group-item">
                                                        <input type="checkbox" name="checklist[]" value="<?= $pizza->getName();?>">
                                                        <span class="pull-right">
                                                            <select name="quantity[<?= $pizza->getName();?>]">
                                                                <option value="1">x1</option>
                                                                <option value="2">x2</option>
                                                                <option value="3">x3</option>
                                                                <option value="4">x4</option>
                                                                <option value="5">x5</option>
                                                                <option value="6">x6</option>
                                                                <option value="7">x7</option>
                                                                <option value="8">x8</option>
                                                                <option value="9">x9</option>
                                                                <option value="10">x10</option>
                                                                <option value="11">x11</option>
                                                                <option value="12">x12</option>
                                                                <option value="13">x13</option>
                                                                <option value="14">x14</option>
                                                                <option value="15">x15</option>
                                                                <option value="16">x16</option>
                                                                <option value="17">x17</option>
                                                                <option value="18">x18</option>
                                                                <option value="19">x19</option>
                                                                <option value="20">x20</option>
                                                            </select>
                                                        </span>
                                                        <?= $pizza->getName()?>

                                                        <span class="badge" style="margin-top:5px; margin-right:10px"><?= $pizza->getPrice().'€';?></span>
                                                    </li>
                                                <?php endforeach ?>
                                            </div>                                
                                        </div>

                                    </div>

                                    <div class="row" style="padding-bottom:30px;">
                                        <div class="col-md-4">
                                            <div class="panel-heading panel-heading-color">
                                                    <h4>Pasta</h4>
                                            </div>
                                            <div class="panel-body padding-zero">
                                                <?php foreach($pastas as $pasta): ?>
                                                    <li class="list-group-item" style="border-radius:0px;">
                                                        <input type="checkbox" name="checklist[]" value="<?= $pasta->getName();?>">
                                                        <span class="pull-right">
                                                            <select name="quantity[<?= $pasta->getName();?>]">
                                                                <option value="1">x1</option>
                                                                <option value="2">x2</option>
                                                                <option value="3">x3</option>
                                                                <option value="4">x4</option>
                                                                <option value="5">x5</option>
                                                                <option value="6">x6</option>
                                                                <option value="7">x7</option>
                                                                <option value="8">x8</option>
                                                                <option value="9">x9</option>
                                                                <option value="10">x10</option>
                                                                <option value="11">x11</option>
                                                                <option value="12">x12</option>
                                                                <option value="13">x13</option>
                                                                <option value="14">x14</option>
                                                                <option value="15">x15</option>
                                                                <option value="16">x16</option>
                                                                <option value="17">x17</option>
                                                                <option value="18">x18</option>
                                                                <option value="19">x19</option>
                                                                <option value="20">x20</option>
                                                            </select>
                                                        </span>
                                                        <?= $pasta->getName()?>

                                                        <span class="badge" style="margin-top:5px; margin-right:10px"><?= $pasta->getPrice().'€';?></span>
                                                    </li>
                                                <?php endforeach ?>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel-heading panel-heading-color">
                                                <h4>Drinks</h4>
                                            </div>
                                            <div class="panel-body padding-zero">
                                                <?php foreach($drinks as $drink): ?>
                                                    <li class="list-group-item" style="border-radius:0px">
                                                        <input type="checkbox" name="checklist[]" value="<?= $drink->getName();?>">
                                                        <span class="pull-right">
                                                            <select name="quantity[<?= $drink->getName();?>]">
                                                                <option value="1">x1</option>
                                                                <option value="2">x2</option>
                                                                <option value="3">x3</option>
                                                                <option value="4">x4</option>
                                                                <option value="5">x5</option>
                                                                <option value="6">x6</option>
                                                                <option value="7">x7</option>
                                                                <option value="8">x8</option>
                                                                <option value="9">x9</option>
                                                                <option value="10">x10</option>
                                                                <option value="11">x11</option>
                                                                <option value="12">x12</option>
                                                                <option value="13">x13</option>
                                                                <option value="14">x14</option>
                                                                <option value="15">x15</option>
                                                                <option value="16">x16</option>
                                                                <option value="17">x17</option>
                                                                <option value="18">x18</option>
                                                                <option value="19">x19</option>
                                                                <option value="20">x20</option>
                                                            </select>
                                                        </span>
                                                        <?= $drink->getName()?>

                                                        <span class="badge" style="margin-top:5px; margin-right:10px"><?=$drink->getPrice().'€';?></span>
                                                    </li>
                                                <?php endforeach ?>

                                            </div>
                                        </div>

                                    </div>
                                    
                                    <!-- btn form -->
                                    <div class="row">
                                        <div class="col-md-1">                                
                                            <a href="/" class="btn btn-danger">Cancel</a>
                                        </div>

                                        <div class="col-md-2 col-md-offset-5">
                                            <input type="submit" value="Confirm" name="submit" class="btn btn-success">

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-2 padding-left-zero padding-right-zero">
                        
                        <?php if ($loggedin): ?>
                            <div class="row">
                                <div class="panel-heading panel-heading-color">
                                    <h4><span class="fa fa-shopping-basket"></span>  Basket</h4>
                                </div>

                                <div class="panel-body padding-zero">
                                    <ul class="list-group">
                                        <?php if (!empty($products)): ?>
                                            <?php foreach($products as $product): ?>   
                                                <li class="list-group-item">                      
                                                <?= $product['product'].' '.'(x'.$product['quantity'].')';?><span class="badge"><?=$product['price'].'€';?></span>
                                                </li>
                                            <?php endforeach ?>
                                        <br><p class="total-border"><strong>total: <?= $sum.'€'; ?></strong></p>
                                    
                                        <?php else: ?>
                                            <li class="list-group-item" >(Basket empty)</li>
                                        <?php endif ?>
                                    </ul> 
                                </div>
                            </div>

                        <?php endif ?>

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
