<!DOCTYPE html>

<html> 
    
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>
    </head>
    
    <body>
         <div class="page-header" style="background-color:#DEB887; margin-top: 0; padding-top: 10px">
            <h1><a href="/" id="title">Food For You</a></h1>
        </div>

        <div class ="container">

            <div class ="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="panel-heading">
                        <h2>Pick Your Order</h2>
                    </div>
                </div>

                <div class="col-md-1 col-md-offset-1">
                    <form method="post" action="/logout">
                        <input type="submit" value="Log out" name="logout" class="btn btn-danger">
                    </form>                    
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12 col-md-offset-2">     
                    <form method="post" action="/yourorder">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="panel-heading" style="color:#D2691E; background-color:#DEB887">
                                    <h4>Burgers</h4>
                                </div>
                                <div class="panel-body">
                                    <?php foreach($burgers as $burger): ?>
                                        <input type="checkbox" name="checklist[]" value="<?= $burger->getName();?>"><?= $burger->getName().'...........................................'.$burger->getPrice().'€';?><br>

                                    <?php endforeach ?>

                                </div>                                
                            </div>

                            <div class="col-md-4">
                                <div class="panel-heading" style="color:#D2691E; background-color:#DEB887">
                                        <h4>Pizza</h4>
                                </div>
                                <div class="panel-body">
                                    <?php foreach($pizzas as $pizza): ?>
                                        <input type="checkbox" name="checklist[]" value="<?= $pizza->getName();?>"><?= $pizza->getName().'...........................................'.$pizza->getPrice().'€';?><br>

                                    <?php endforeach ?>

                                </div>                                
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel-heading" style="color:#D2691E; background-color:#DEB887">
                                        <h4>Pasta</h4>
                                </div>
                                <div class="panel-body">
                                    <?php foreach($pastas as $pasta): ?>
                                        <input type="checkbox" name="checklist[]" value="<?= $pasta->getName();?>"><?= $pasta->getName().'...........................................'.$pasta->getPrice().'€';?><br>

                                    <?php endforeach ?>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="panel-heading" style="color:#D2691E; background-color:#DEB887">
                                    <h4>Drinks</h4>
                                </div>
                                <div class="panel-body">
                                    <?php foreach($drinks as $drink): ?>
                                        <input type="checkbox" name="checklist[]" value="<?= $drink->getName();?>"><?= $drink->getName().'...........................................'.$drink->getPrice().'€';?><br>

                                    <?php endforeach ?>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <input type="submit" value="Submit" name="submit" class="btn btn-success">

                            </div>

                            <div class="col-md-4 col-md-offset-4">

                                <a href="/" class="btn btn-danger">Cancel</a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div> 


        <!-- <div class="header">
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
        </form> -->  
    <script src="/js/bootsrap.min.js"></script>
    </body>    
</html>
