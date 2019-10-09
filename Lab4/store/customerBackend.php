<?php
    define("HELMETCOST", 500);
    define("ARMORCOST", 700);
    define("SHIELDCOST", 250);
    define("SANDALSCOST", 100);
    define("SPATHACOST", 1200);
    define("RUSTYSWOARDCOST", 200);
    define("TRIDENTCOST", 4000);
    define("MACECOST", 950);
    define("NUMITEMS", 8);

    $GladiiatorName = $_POST["gladiatorName"];
    $Password = $_POST["Password"];

    echo "WELCOME, " . $GladiiatorName . " <br> Password: " . $Password . "<br><br>";
    $ShippingMethod = $_POST["shippingMethod"];
    $ShippingCost = 0;
    $Total = 0;
    switch ($ShippingMethod)
    {
        case "Free":
            $ShippingCost = 0;
            break;
        case "OverNight":
            $ShippingCost = 50;
            break;
        case "ThreeDay":
            $ShippingCost = 5;
            break;
        default:
            echo "No shipping method selected.";
    }
    $Quantity = array($_POST["item1"], $_POST["item2"],
                      $_POST["item3"], $_POST["item4"], 
                      $_POST["item5"], $_POST["item6"], 
                      $_POST["item7"], $_POST["item8"]);
    $Items = array("Helmet", "Armor", 
                   "Shield", "Sandals", 
                   "Spatha", "Rusty Sword", 
                   "Trident", "Mace");
    $Costs = array(($Quantity[0] * HELMETCOST),
                   ($Quantity[1] * ARMORCOST),
                   ($Quantity[2] * SHIELDCOST),
                   ($Quantity[3] * SANDALSCOST),
                   ($Quantity[4] * SPATHACOST),
                   ($Quantity[5] * RUSTYSWOARDCOST),
                   ($Quantity[6] * TRIDENTCOST),
                   ($Quantity[7] * MACECOST),
                    $ShippingCost);
    $SumOfCosts = array_sum($Costs) - $ShippingCost;
    if($SumOfCosts == 0)
    {
        echo "No items selected for purchase. Buy something or GIT!!!<br><br>";
    }
    else
    {
        for($i = 0; $i < NUMITEMS; $i++)
        {            
            $Total = $Total + $Costs[$i];
        }
        $Total = $Total + $ShippingCost; 

    }
    
    

    echo "<table class='multTable' cellpadding = '20' border = \"10\" style = border-collapse: 'collapse'>";
    echo "<tr>";
    echo "<td> ITEM </td>" . "<td> QTY </td>" . "<td> COST </td>";
    for ($row = 0; $row < NUMITEMS; $row++)
    {
        echo "<tr>" . "<td>$Items[$row]</td>" . "<td>$Quantity[$row]</td>" . "<td>$$Costs[$row]</td>" . "</tr>";        
    }
    echo "<tr>" . "<td> Shipping </td>" . "<td>$ShippingMethod</td>" . "<td>$$ShippingCost</td>" . "<tr>";
    echo "<td> TOTAL </td>" . "<td>$$Total</td>";

    echo "</table>";
    echo "<br><br><a href=\"javascript:history.go(-1)\">GO BACK</a>";

    echo "<style type= 'text/css'> 
         .multTable 
         {
            background: #552222;
            color: #ffffff;
            font-family: consolas;
            font-size: 22;
            font-weight: bolder;
            border-color: #dddddd;
         }
        </style>";
?>