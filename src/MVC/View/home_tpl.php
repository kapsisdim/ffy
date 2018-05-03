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
        <div class="page-header"  style="background-color:#DEB887; margin-top: 0; padding-top: 10px">
            <h1><a href="/" id="title" >Food For You</a></h1>
        </div>
        <div class="container">

            <div class="row">

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/products/Burgers"><img class="images" alt="burger" src="/img/burgers.jpg"></a>
                        </div>

                        <div class="col-md-6">
                            <a href="/products/Pizzas"><img class="images" alt="pizza" src="/img/pizza.jpg"><br></a>
                        </div>
                    </div>

                    <div class="row">                
                        <div class="col-md-6">
                            <a href="/products/Pasta"><img class="images" alt="pasta" src="/img/pasta.jpg"></a>
                        </div>

                        <div class="col-md-6">
                            <a href="/products/Drinks"><img class="images" alt="drinks" src="/img/drinks.jpg"></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">

                    <?php if ($loggedin): ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Welcome <strong><?php echo ($username); ?></strong></h4>
                            </div>
                        </div>

                        <?php if (!empty($products)): ?>
                            <div class="row">
                                <div class="col-md-12" style="color:#D2691E; background-color:#DEB887">
                                    <h4><strong>BASKET</strong></h4>
                                </div>
                            </div>
                            
                            <div class="row" style="background-color: #DCDCDC;">
                                <div class="col-md-12">
                                    <?php foreach($products as $product): ?>                         
                                        <?= $product['product'].'...  '.$product['price'].'€';?><br>
                                    <?php endforeach ?>
                                    
                                    <br>total: <?= $sum.'€'; ?>
                                </div>
                            </div>

                        <?php endif ?>

                        <div class="row">

                            <div class="col-md-6">
                                <form method="get" action="/products">
                                    <input type="submit" class="btn btn-primary" value="Order">
                                </form>
                            </div>

                                                    
                            <div class="col-md-6">
                                <form method="post" action="/logout">
                                    <input class="btn btn-danger" type="submit" value="Log out">
                                </form>
                            </div>
                            
                        </div>

                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/signin" class="btn btn-success">Sign in</a>
                            </div>
                            <div class="col-md-6">
                                <a href="/register" class="btn btn-success">Sign up</a>
                            </div>
                        </div>
                        <?php endif ?> 
                    </div>                       
                    </div>
                </div>
                
            </div>




        </div>

        <!--
        <div class="header">
            <h1><a href="/" style="color:black; text-decoration: none;">Food For You</a></h1>
        </div>
        <div id="welcomeuser">
            <?php if ($loggedin): ?>
            <p>Welcome <strong><?php echo ($username); ?></strong></p>           
                <form method="post" action="/logout">
                    <input type="submit" value="Log out" name="logout" class="btn" style="width:70px; border-radius: 5px; padding: 10px;">                    
                </form>
                <?php if (!empty($products)): ?>
                    <table style="float: left;">
                        <tr>
                            <th><h2 style="width: 30%;">Your Order</h2></th>
                        </tr>
                        <?php foreach($products as $product): ?>              
                        <tr>                        
                            <td><?= $product['product'].'...  '.$product['price'].'€';?></td>                    
                        </tr>
                        <?php endforeach ?>                   
                        <tr>
                            <br><td><br>total: <?= $sum.'€'; ?></td>
                        </tr>
                    </table>                    
                <?php endif ?>
                <td><br><a href = "/products" class = "btnsignin" style = "text-decoration: none; width:70px; border-radius: 5px; padding: 10px;"> Order </a></td>
            <?php else: ?>
                <a href="/signin" class="btnsignin" style="text-decoration: none; margin-right:10%;"> Sign in </a><br>
                <br><a href ="/register" class="btnsignin" style="text-decoration: none; margin-right:10%; margin-top"> Sign up </a>
            <?php endif ?>
        </div>
        <div class="menu" style="text-align: center;">
            <a href="/products/Burgers"><img class="images" alt="burger" src="/img/burgers.jpg" style="text-align: left; "></a>
            <a href="/products/Pizzas"><img class="images" alt="pizza" src="/img/pizza.jpg" style="text-align: right; margin-right: -100px;"><br></a>
            <a href="/products/Pasta"><img class="images" alt="pasta" src="/img/pasta.jpg" style="text-align: left; margin-left: 62px;"></a>
            <a href="/products/Drinks"><img class="images" alt="drinks" src="/img/drinks.jpg" style="text-align: right; margin-right: -100px;"></a>
        </div>
        -->
        <script src="/js/bootsrap.min.js"></script>
    </body>
</html>