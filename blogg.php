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

    <h1 class="rubrik">Posts</h1>



    <div class="bigContainer">

        <div class="litleContainer">

            <div class="imgDiv">

             <!-- Hämtar in blogens bilder  -->

            <?php

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3000/labb2-AH/wp-json/wp/v2/media?page=1&per_page=2&oauth_consumer_key=ck_61b87dc73ff2e829f4447ab57c3ea638a5a97d54&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650699806&oauth_nonce=lgi6aMSJFOv&oauth_version=1.0&oauth_signature=PqNBoceN8poRMKq8aUut29JsLkQ%253D',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: mailpoet_page_view=%7B%22timestamp%22%3A1650638600%7D'
            ),
            ));

            $pictureResponse = curl_exec($curl);

            curl_close($curl);
            
            $postBild = json_decode($pictureResponse); 


            for ($i=0; $i < count($postBild); $i++) { 
                $bilder = $postBild[$i]; 

                $media = $bilder->guid->rendered; ?>

            

                <img class="postBild" src=" <?php echo $media ?> " alt="Media Galleri">
               
                

            <?php
            }
            ?>
            
            
            
            </div>


            <!-- Hämtar in blogens information  -->

            <?php
            
            

                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://localhost:3000/labb2-AH/wp-json/wp/v2/posts?oauth_consumer_key=ck_61b87dc73ff2e829f4447ab57c3ea638a5a97d54&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650709547&oauth_nonce=qZAGZM101Oe&oauth_version=1.0&oauth_signature=KqBAP%252B58UpivwiJYxcV9Ilewq8M%253D',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: mailpoet_page_view=%7B%22timestamp%22%3A1650714466%7D'
                ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
            
                

    
                $post_list = json_decode($response); 
    
                ?>
    
    
                <div class="litleDiv">
    
               
    
                    <div class="postsInfo">
        
                        <?php 
        
                        for ($i=0; $i < count($post_list); $i++) { 
                            $post = $post_list[$i]; 
        
                            $titel = $post->title->rendered; 

                            $postLink = $post->link; ?>

                            <h3 class="blogTitel">Postens titel: <a href=" <?php echo $postLink ?> "><?php echo $titel ?></a><br></h3><br>
                            <br>
                            <br>

                        <?php }
                        ?>
        
                    </div>

                </div>

        </div>



            

    </div>


    
</body>
</html>


