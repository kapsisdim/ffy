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

        <div class="container menu-container">
  
                <div class="stepwizard col-md-offset-3">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Shipping</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Payment</p>
                        </div>
                    </div>
                </div>
                    
                <form role="form" action="/confirm" method="post">

                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <div class="panel-heading panel-heading-color">
                                    <h3>Shipping</h3>
                                </div>

                                <div class="panel-body panel-body-style">
                                    <div class="form-group">
                                        <br><label style="text-decoration:underline;">Delivery Method</label>

                                        <div class="form-check radio-pink-gap ">
                                            <input name="delivery_method" type="radio" class="with-gap" value="Delivery" onclick="toggle('delivery')" checked> Delivery
                                        </div>

                                        <div class="form-check radio-pink-gap ">
                                            <input name="delivery_method" type="radio" class="with-gap" value="From Store" onclick="toggle('store')"> From Store
                                        </div>
                                    </div>

                                    <div id="address-info">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="first_name"><strong><span class="text-danger"> * </span>First Name:</strong></label>
                                                    <input id="first-name" type="text" name="first_name" class="form-control" placeholder="Enter your first name"/>
                                                </div>
                                                <div class="span1"></div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="sir_name"><strong><span class="text-danger"> * </span>Sir Name:</strong></label>
                                                    <input id="sir-name" type="text" name="sir_name" placeholder="Enter your sir name" class="form-control" required/>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="address"><strong><span class="text-danger"> * </span>Address:</strong></label></div>
                                                <div class="col-md-12">
                                                    <input id="address" type="text" name="address" placeholder="Enter your Address" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="city"><strong><span class="text-danger"> * </span>City:</strong></div>
                                                <div class="col-md-12">
                                                    <input id="city" type="text" name="city" placeholder="Enter your city" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="state"><strong><span class="text-danger"> * </span>State:</strong></label></div>
                                                <div class="col-md-12">
                                                    <input id="state" type="text" name="state" placeholder="Enter your state" class="form-control" value="" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="zip_code"><strong><span class="text-danger"> * </span>Zip / Postal Code:</strong></label></div>
                                                <div class="col-md-12">
                                                    <input id="zip" type="text" name="zip_code" placeholder="Enter your zip / postal code" class="form-control" value="" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="phone_number"><strong><span class="text-danger"> * </span>Phone Number:</strong></label></div>
                                                <div class="col-md-12"><input id="phone" type="text" name="phone_number" placeholder="Enter your phone number" class="form-control" value="" required/></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="email"><strong>Email Address:</strong></label></div>
                                                <div class="col-md-12"><input type="text" placeholder="Enter your e-mail address" name="email_address" class="form-control" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><label for="comments"><strong>Comments:</strong></label></div>
                                                <div class="col-md-12"><input type="text" name="comments" placeholder="Something you need to mention?" name="comment" class="form-control" value=""/></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12"><br><small><strong>inputs with (<span class="text-danger"> * </span>) are required!</strong></small></div>
                                            </div>           
                                        </div>
                                    </div>
                                    <button class="btn btn-primary nextBtn pull-right testbtn" type="button" >Next</button>                                    
                                </div>
                                <a href="/yourorder" class="btn btn-danger nextBtn pull-left" type="button">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <div class="panel-heading panel-heading-color">
                                    <h3>Payment</h3>
                                </div>

                                <div class="panel-body panel-body-style">
                                    <br><label style="text-decoration:underline;">Payment Method</label>
                                    <div class="form-check radio-pink-gap">
                                        <input name="payment_method" type="radio" class="with-gap" value="Credit Card" onclick="toggle('credit')" checked> Credit Card 

                                    </div>
                                    <div class="form-check radio-pink-gap">
                                        <input name="payment_method" type="radio" class="with-gap" value="Cash" onclick="toggle('cash')"> Cash
                                    </div>

                                    <div class="row">
                                        <div class="panel-body">

                                            <div id="payment-info" class="pull-left">

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
                                                        document.getElementById('card-token').value = token;

                                                    }

                                                    function yourErrorCallbackFunction(error_code, error_message) {
                                                        console.log(error_message);
                                                    }
                                                </script>

                                            </div>
                                            <input type="submit" class="btn btn-success pull-right" value="Finish">

                                        </div>
                                    </div>
                                </div>
                                <a href="/products" class="btn btn-danger pull-left">Back</a>
                            </div>
                        </div>
                    </div>

                    
                    <input type="hidden" name="card_token" id="card-token" value="" />
                </form>
                
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
        <script src="/js/scripts.js"></script>

    </body>
</html>