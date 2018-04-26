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
        </div>
    </body>
    
</html>
