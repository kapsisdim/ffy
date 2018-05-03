<!DOCTYPE html>

<html>    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>
    </head>
    <body>
        <div class="page-header" style="background-color:#DEB887; margin-top: 0; padding-top: 10px">
            <h1><a href="/" id="title">Food For You</a></h1>
        </div> 

        <div class="container">
            
            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    
                    <form method="post" action="/confirm">
                        <div class="row">
                            <div class="panel-heading" style="color:#D2691E; background-color:#DEB887">
                                <h3>Your Order</h3>
                            </div>

                            <div class="panel-body">
                                <?php foreach($products as $product): ?>
                                    <?= $product['product'].'.............................................  '.$product['price'].'€';?><br>

                                <?php endforeach ?>

                                <br><p>total: <?= $sum.'€'; ?></p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-2">
                                <input type="submit" value="Confirm" name="confirm" class="btn btn-success">
                            </div>
                            <div class="col-md-3 col-md-offset-7">
                                <a href="/" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
            </div>

        </div> 

        <!-- <div class="header">
            <h1><a href="/" style="color:black;text-decoration: none">Food For You </a></h1>            
        </div>
        <form class="btnform" method= "post" action="/logout" style="margin-right: 20%;">
            <input type="submit" value="Log out" name="logout" class="btnsignin" style="width: 70px; margin-right: 40%">
        </form>
        
        <form method="post" action="/confirm" style="width:400px; margin: auto;">
            <div>
                <table>
                    <tr>
                        <th><h2 style="width: 90%;">Your Order</h2></th>
                    </tr>
                    <?php foreach($products as $product): ?>              
                    <tr>                        
                        <td><?= $product['product'].'.................................  '.$product['price'].'€';?><br></td>                        
                    </tr>
                    <?php endforeach ?>                   
                    <tr>
                        <br><td>total: <?= $sum.'€'; ?></td>
                    </tr>
                    <tr>
                </table>
                <div>
                    <input type="submit" value="Confirm" name="confirm" class="btnsignin" style="width: 80px; float: left;">
                    <a href="/products" class="btnsignin" style="text-decoration: none;margin-right: 0; float: right;">Cancel</a>
                </div>
            </div>
        </form>        -->

    <script src="/js/bootsrap.min.js"></script>
    </body>   

</html>


