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
            <h1><a href="/" style="color:black; text-decoration: none;text-decoration: none;">Food For You </a></h1>            
        </div>

        <form class="btnform" method ='post'action="/logout" style="margin-right: 20%;">
            <input type="submit" value="Log out" name="logout" class="btnsignin" style="width: 70px; margin-right: 40%">
        </form>        
             
        <form method="post" action="/yourorder">        
            <table style="margin-left:35%">
                <tr>
                    <th><h2 style="width: 90%;">Pick Your Order</h2></th>
                </tr>
                                
                <?php foreach($menu as $product): ?>
                <tr>                    
                    <td><input type="checkbox" name="checklist[]" value="<?= $product['product'];?>" ><?= ' '. $product['product'].'...................................  '.$product['price'].'€';?></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td><input type="submit" value="Submit" name="submit" class="btnsignin">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="/" class="btnsignin" style="text-decoration: none;margin-right: 0">Cancel</a></td>                    
                </tr>          
            </table>       
        </form>        
    </body>    
</html>
