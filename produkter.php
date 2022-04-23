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

            <div class="productImg">

                <!-- Hämtar in produktens bilder  -->

                    <?php

                    

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://localhost:3000/labb2-AH/wp-json/wp/v2/media?page=2&per_page=5&oauth_consumer_key=ck_61b87dc73ff2e829f4447ab57c3ea638a5a97d54&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650725948&oauth_nonce=GJ2Ct7TTyPE&oauth_version=1.0&oauth_signature=MHuCkWQ77OiIE3Oe0d0cAKgohk4%253D',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Cookie: mailpoet_page_view=%7B%22timestamp%22%3A1650733052%7D'
                    ),
                    ));

                    $pictureResponse = curl_exec($curl);

                    curl_close($curl);



                    $produktBild = json_decode($pictureResponse); 


                    for ($i=0; $i < count($produktBild); $i++) { 
                    $bilder = $produktBild[$i]; 

                    $media = $bilder->guid->rendered;
                    
                    ?>



                    <img class="postBild" src=" <?php echo $media ?> " alt="ProduktBild">
                    
                    

                    <?php
                    }
                    ?>



            </div>

            <!-- Hämtar in produktens information  -->

            <?php 



                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://localhost:3000/labb2-AH/wp-json/wc/v3/products?oauth_consumer_key=ck_61b87dc73ff2e829f4447ab57c3ea638a5a97d54&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650725908&oauth_nonce=4qVsVMkuXAa&oauth_version=1.0&oauth_signature=4LPs9fa4SgZuQd8pWqkcUBUml6c%253D',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: mailpoet_page_view=%7B%22timestamp%22%3A1650733052%7D'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);


                

                $productList = json_decode($response); 


            ?>

            <div class="litleDiv">
                
                        
                
                <div class="produktContainer">

                    <?php 

                    for ($i=0; $i < count($productList); $i++) { 
                        $product = $productList[$i]; 

                        echo "<table>"; 

                            $link = $product->permalink;
                            $productName = $product->name; 

                            ?>

                            <h3>Produkt: <a href=" <?php echo $link ?> "><?php echo $productName ?></a></h3>

                            <?php

                            /* OBS!! Fixa categories -- Ej lyckats få ut det */
                            /* echo "<tr><td>Kategori:</td><td>$product->categories</td></tr>"; */

                            echo "<tr><td><b>Produktens pris: </b></td><td>$product->price kr</td></tr>"; 



                        echo "</table>"; 
                    }
                    

                    ?> 
                </div>
                    
            </div>

        </div>

    </div>


</body>
</html>


