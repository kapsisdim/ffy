<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title></title>
    </head>
    
    <body>
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
            <a href="/signin" class="btnsignin" style="text-decoration: none; margin-right:10%;"> Sign in </a>
            <?php endif ?>
        </div>
        <div class="menu" style="text-align: center;">
            <a href="/products/Burgers"><img class="images" alt="burger" src="/img/burgers.jpg" style="text-align: left; "></a>
            <a href="/products/Pizzas"><img class="images" alt="pizza" src="/img/pizza.jpg" style="text-align: right; margin-right: -100px;"><br></a>
            <a href="/products/Pasta"><img class="images" alt="pasta" src="/img/pasta.jpg" style="text-align: left; margin-left: 62px;"></a>
            <a href="/products/Drinks"><img class="images" alt="drinks" src="/img/drinks.jpg" style="text-align: right; margin-right: -100px;"></a>
        </div>
    </body>
</html>