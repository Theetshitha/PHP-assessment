
<?php

require("header.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <br>

    
</body>
</html>


<?php
   $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Ecommerce");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Product_details WHERE Category ='Vegetables'";
    $result = $conn->query($sql);

    if ($result-> num_rows > 0) {
        echo "<br>";
        echo "<br>";
        echo "<center><h1 class='text-3xl font-bold text-blue-800'>Deal of the Day || All Vegetables </h1></center>";
        echo "<br>";
        echo "<br>";

        echo "<div style='display:flex;justify-content:centre;align-item:center;' class='grid grid-cols-4 gap-2'>";
      
        while($row = $result->fetch_assoc()) {
            echo " <div class='bg-gray-200 p-4 card'><img src=". $row["Image"] ."alt='' style='height:100px; width:100px; border-radius:20px;'><h3>". $row["Product_Name"] ."</h3><h3>". $row["Price"] ."</h3><h4>". $row["Description"] ."</h4></div>";
          
            echo " <br><br>"; 

        }
        echo "</div>";
        echo "<br><br>"; 
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
<?php
   $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Ecommerce");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Product_details WHERE Category ='Fruits'";
    $result = $conn->query($sql);

    if ($result-> num_rows > 0) {
        echo "<br>";
        echo "<br>";
        echo "<center><h1 class='text-3xl font-bold text-blue-800'> Seasonal Special || All Fruits </h1></center>";
        echo "<br>";
        echo "<br>";

        echo "<div style='display:flex;justify-content:centre;align-item:center;' class='grid grid-cols-4 gap-2'>";
     
        while($row = $result->fetch_assoc()) {
            echo " <div class='bg-gray-200 p-4 card'><img src=". $row["Image"] ."alt='' style='height:100px; width:100px; border-radius:20px;'><h3>". $row["Product_Name"] ."</h3><h3>". $row["Price"] ."</h3><h4>". $row["Description"] ."</h4></div>";
          
            echo " <br><br>"; 

        }
        echo "</div>";
        echo "<br><br>"; 
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
<?php
   $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Ecommerce");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Product_details WHERE Category ='Grains'";
    $result = $conn->query($sql);

    if ($result-> num_rows > 0) {
        echo "<br>";
        echo "<br>";
        echo "<center><h1 class='text-3xl font-bold text-blue-800'> Today's Deal || All Grains </h1></center>";
        echo "<br>";
        echo "<br>";

        echo "<div style='display:flex;justify-content:centre;align-item:center;' class='grid grid-cols-4 gap-2'>";
   
        while($row = $result->fetch_assoc()) {
            echo " <div class='bg-gray-200 p-4 card'><img src=". $row["Image"] ."alt='' style='height:100px; width:100px; border-radius:20px;'><h3>". $row["Product_Name"] ."</h3><h3>". $row["Price"] ."</h3><h4>". $row["Description"] ."</h4></div>";
          
            echo " <br><br>"; 

        }
        echo "</div>";
        echo "<br><br>"; 
    } else {
        echo "0 results";
    }

    $conn->close();
 
echo "<br><br>"; 

 ?>


<?php

require("footer.php");

?>