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

                $orderList = file_get_contents("./JSON/orders.json");  
                $orderList = json_decode($orderList, false);

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
                            echo "<tr><td><b>Totalbelopp:</b></td><td><p><b> $order->total kr</b></p></td></tr>";
                            echo "<tr><td><b>Datum:</b></td><td>$order->date_created</td></tr><br>"; 
                        echo "</table>"; 
                    }

                    ?> 
                </div>
        </div>

    </div>
                        
</body>
</html>

