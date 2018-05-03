<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">        
        <title></title>
    </head>
    
    <body>

        <div class="page-header" style="background-color:#DEB887; margin-top: 0; padding-top: 10px">
            <h1><a href="/" id="title">Food For You</a></h1>
        </div>   

        <div class ="container">

            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="panel-heading">
                        <h2>Menu</h2>
                    </div>
                </div>
            
            </div>

            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    
                    <div class="panel-heading" style="color:#D2691E; background-color:#DEB887;">
                        <h4><?= $products[0]->getType();?></h4>
                    </div>

                    <div class="panel-body">
                        <?php foreach($products as $product): ?>
                            <?= $product->getName().'...................................................'.$product->getPrice().'€';?><br>
                        <?php endforeach ?>
                    </div>

                </div>

            </div>

        </div>


       <!--  <div class="header">
            <h1><a href="/" style="color:black;text-decoration: none;">Food For You </a></h1>            
        </div>

        <?php if ($loggedin): ?>
            <p>Welcome <strong><?php echo ($username); ?></strong></p>           
                <form method="post" action="/logout">
                    <input type="submit" value="Log out" name="logout" class="btn" style="width:70px; border-radius: 5px; padding: 10px;">                    
                </form>

            <br><a href = "/products" class = "btnsignin" style = "text-decoration: none; width:70px; border-radius: 5px; padding: 10px;"> Order </a></td>
        <?php else: ?>

            <form id="form" action="/signin" method="get">
                <input type="submit" value="Sign in" name="signin" class="btnsignin" style="float:right; margin-right: ">
            </form>
        <?php endif ?>

        <div class="form" style="margin-top:5%; border: none; padding-left:0px; padding-right:0px;">        
            <table style='margin-top:-17.6%;'>
                <tr>
                    <th><h2 style="width: 90%;"><?= $type ?></h2></th>
                </tr>
                <?php foreach($products as $product): ?>
                <tr>
                    <td><?= $product->getName().'.....................................'.$product->getPrice().'€';?></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div> -->

    <script src="/js/bootsrap.min.js"></script>    
    </body>
    
</html>
