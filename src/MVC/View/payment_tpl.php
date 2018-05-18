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
            <div class="page-header col-md-12 page-header-style">
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
                            <ul class="nav navbar-nav navbar-right" style="margin-top:5px;">
                                <li class="dropdown">
                                    <a href=""class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 0px;padding-bottom: 0px;"><h5 style="color:#9d9d9d;">
                                        <span class="glyphicon glyphicon-user"> Welcome <strong><?= $username; ?></strong></span><span class="caret pull-right"></span></h5>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>  Account Settings</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>  Orders</a></li>
                                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        
                    </div>
                </nav>

            </div>

        </div>

        <div class="row order-container">
            <div class="col-md-12">
                <div class="col-md-8">

                    <form method="post" id="payment-form" action="/confirm">

                        <div class="row">
                            
                            <?php if( strcmp($paymentMethod, 'Credit Card') == 0 ): ?>
                                <!-- CHECKOUT PAYMENT -->
                                <span class="trw-button"
                                    data-key ="pk_vF54YsH5CeCztu7s7SQwtgTGwd8u3Ele"
                                    data-amount= "<?= $sum * 100 ?>"
                                    data-name ="Food4U"
                                    data-description ="The Beef company"
                                    data-image="https://i0.wp.com/www.grillingoutdoorrecipes.com/wp-content/uploads/2016/05/gorgeous-bridalbouquet-ideasfor-your.jpg?resize=150%2C150"
                                    data-locale = "en"
                                    data-callback="yourCallbackFunction"
                                    data-card = "true">
                                </span>

                                <script>
                                    function yourCallbackFunction(token) {
                                        alert('Do something with token: ', token);
                                        $.ajax({
                                        type: "POST",
                                        url: "/checkout",
                                        data: { "checkout-token": token},
                                        success: function(res){
                                            console.log('res:', res);
                                        }
                                    });
                                    }

                                    function yourErrorCallbackFunction(error_code, error_message) {
                                        console.log(error_message);
                                    }
                                </script>

                               
                                <div class="col-md-6">
                                    <div class="panel-heading panel-heading-color"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                                    <div class="panel-body panel-body-style">
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12"><label for="card_type"><strong><span class="text-danger">* </span>Card Type:</strong></label></div>
                                            <div class="col-md-12">
                                                <select id="CreditCardType" name="CreditCardType" class="form-control">
                                                    <option value="5">Visa</option>
                                                    <option value="6">MasterCard</option>
                                                    <option value="7">American Express</option>
                                                    <option value="8">Discover</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12"><label for="credit_card_number"><strong><span class="text-danger">* </span>Credit Card Number:</strong></label></div>
                                            <div class="col-md-12"><input placeholder="XXXX XXXX XXXX XXXX" type="text" class="form-control" name="car_number" value="" required/></div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12"><strong><span class="text-danger">* </span>Card CVV:</strong></div>
                                            <div class="col-md-12"><input placeholder="xxx" type="text" class="form-control" name="car_code" value="" required/></div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong><span class="text-danger">* </span>Expiration Date</strong>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="" required>
                                                    <option value="">Month</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                            </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="" required>
                                                    <option value="">Year</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                            </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>Pay secure using your credit card.</span>
                                            </div>
                                            <div class="col-md-12">
                                            <img src="http://i76.imgup.net/accepted_c22e0.png">
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><br><small><strong>inputs with (<span class="text-danger"> * </span>) are required!</strong></small></div>
                                            </div>           
                                        </div> 
                                    </div><script src="https://button.torawallet.gr/tora/checkout.js"></script>
                                    <!--CREDIT CART PAYMENT END -->
                                </div>
                            <?php endif ?>

                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/yourorder" class="btn btn-danger pull-left">Back</a>
                                <button type="submit" class="btn btn-success pull-right">Checkout</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-md-2 col-md-offset-1">
                            
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
                                        <li class="list-group-item" style="border-radius:0px;">(Basket empty)</li>
                                    <?php endif ?>
                                </ul> 
                            </div>
                        </div>

                        <div class="row">
                            <form method="post" action="/cancel">
                                <input type="submit" class="btn btn-danger" value="Cancel">
                            </form>
                        </div>

                    <?php endif ?>

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
        <script src="https://button.preprod.torawallet.gr/tora/checkout.js"></script>

    </body>

</html>