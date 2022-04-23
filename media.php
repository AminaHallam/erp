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

    <h1 class="rubrik">Media</h1>

    <div class="bigContainer">

        <div class="litleContainer">

           <!--  Hämtar all media  -->

            <?php

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://localhost:3000/labb2-AH/wp-json/wp/v2/media?oauth_consumer_key=ck_61b87dc73ff2e829f4447ab57c3ea638a5a97d54&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650629308&oauth_nonce=rbyZnh1L6Zw&oauth_version=1.0&oauth_signature=NpWKrhSkB8DmFBTPte9i9gjPBVQ%253D',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: mailpoet_page_view=%7B%22timestamp%22%3A1650628175%7D'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);

                $mediaList = json_decode($response);

                ?> 

                <div class="mediaDiv">
                    

                    <?php

                    for ($i=0; $i < count($mediaList); $i++) { 
                        $allMedia = $mediaList[$i]; 

                        $media = $allMedia->guid->rendered;

                        ?>

                            <img class="media" src=" <?php echo $media ?> " alt="Instruktions-Doc">
                            
                        
                    
                    <?php }

                    ?> 
                </div>
                    
        </div>

    </div>
</body>
</html>