<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Labb-2</title>
</head>
<body>

    <header>
    <h1 class="rubrik"><a href="./index.php">ERP System</a></h1>
        <div class="divContainer">

            <a class="menu" href="./produkter.php">Produkter</a>
            <a class="menu" href="./blogg.php">Blogginlägg</a>
            <a class="menu" href="./ordrar.php">Beställningar</a>
            <a class="menu" href="./media.php">Media</a>

        </div>
        <hr style="width:70%;margin: auto;">


    </header>

    <h1 class="rubrik">Produktlista</h1>

    <div class="bigContainer">

        <div class="litleContainer">
                
                <?php 
            
                $productList = file_get_contents("./JSON/products.json");  
                $productList = json_decode($productList, false);
                             
                ?>

            <div class="productImg">

                <!-- Hämtar in produktens bilder  -->

                    <?php

                    for ($i=0; $i < count($productList); $i++) { 
                        $productPicture = $productList[$i]->images; 

                            for ($p=0; $p < count($productPicture); $p++) { 
                                $img = $productPicture[$p]; 
                                $media = $img->src; ?>
                                
                                <img class="postBild" src=" <?php echo $media ?> " alt="ProduktBild">

                            <?php 
                            }
                            ?>

                    <?php
                    }
                    ?>
            </div>

            <div class="litleDiv">
                               
                <div class="produktContainer">

                    <!-- Hämtar in produktens information  -->

                    <?php 

                    for ($i=0; $i < count($productList); $i++) { 
                        $product = $productList[$i]; 

                        echo "<table>"; 

                            $link = $product->permalink;
                            $productName = $product->name; 
                            
                            ?>

                            <h3>Produkt: <a href=" <?php echo $link ?> "><?php echo $productName ?></a></h3>

                            <?php
                            echo "<tr><td><b>Produktens pris: </b></td><td><b> $product->price kr</b></td></tr>";   
                            
                            $kategory = $product->categories;

                            for ($a=0; $a < count($kategory); $a++) { 
                                $productCategory = $kategory[$a]; 
                                $categories = $productCategory->name; 

                                if($categories == 'Sportutrustning') {
                                
                                    echo "<tr><td><b>Kategori: </b></td><td><p style='background-color:#673ab773;'> $categories </p></td></tr>"; 
                                } else {
                                    echo "<tr><td><b>Kategori: </b></td><td><p style='background-color:#a4dba478;'> $categories </p></td></tr>";
                                }

                            }

                        echo "</table>"; 
                    }
                    
                    ?> 
                </div>
                    
            </div>

        </div>

    </div>

</body>
</html>


