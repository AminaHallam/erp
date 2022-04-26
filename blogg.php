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

                $postBild = file_get_contents("./JSON/postMedia.json");  
                $postBild = json_decode($postBild, false);


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
            
            $postData = file_get_contents("./JSON/posts.json");  
            $postData = json_decode($postData, false);
                
    
                ?>
    
                <div class="litleDiv">
                    <div class="postsInfo">
        
                        <?php 
        
                        for ($p=0; $p < count($postData); $p++) { 
                            $post = $postData[$p]; 
        
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


