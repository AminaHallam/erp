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

                $mediaList = file_get_contents("./JSON/allMedia.json");  
                $mediaList = json_decode($mediaList, false);

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