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

    <h1 class="rubrik">Beställningar</h1>

    <div class="bigContainer">

        <div class="litleContainer">

            <!-- Hämtar alla ordrar & dess info -->

            <?php


                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://localhost:3000/labb2-AH/wp-json/wc/v3/orders?oauth_consumer_key=ck_61b87dc73ff2e829f4447ab57c3ea638a5a97d54&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1650728686&oauth_nonce=nehKzAOOI09&oauth_version=1.0&oauth_signature=melbwk8HZGssXbC3gd4lDo3VagA%253D',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: mailpoet_page_view=%7B%22timestamp%22%3A1650735885%7D'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);



                $orderList = json_decode($response);
            ?> 



                <div class="litleDiv">
                    

                    <?php

                    for ($i=0; $i < count($orderList); $i++) { 
                        $order = $orderList[$i]; 

                        echo "<table>"; 
                            echo "<tr><td><b>OrderID:</b></td><td>$order->id</td></tr>"; 

                            $orderStatus = $order->status; 
                            if($orderStatus == 'cancelled') {
                                
                                echo "<tr><td><b>Status:</b></td><td><p style='background-color:#f56a6a; border: 1px solid black;'> $orderStatus </p></td></tr>"; 
                            } else {
                                echo "<tr><td><b>Status:</b></td><td><p style='background-color:#a4dba4; border: 1px solid black;'> $orderStatus </p></td></tr>";
                            }


                            echo "<tr><td><b>Totalbelopp:</b></td><td><p> $order->total kr</p></td></tr>";
                            echo "<tr><td><b>Datum:</b></td><td>$order->date_created</td></tr><br>"; 
                        echo "</table>"; 
                    }

                    ?> 
                </div>
        </div>

    </div>
                        
</body>
</html>

