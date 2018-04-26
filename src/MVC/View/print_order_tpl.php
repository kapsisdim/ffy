<!DOCTYPE html>

<html>    
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>
    </head>
    <body>
        <div class="header">
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
        </form>       
    </body>    
</html>


