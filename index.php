<?php

require("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
  
 
  <link rel="stylesheet" href="style.css">
 
  <title>Theetshi Silks.com</title>
</head>
<body>
   
<div class="theetshiMartPla">
        <div class="plaTheetshiMart" id="plaTheetshiMart">
            <div class="plaSlideShowDiv">  
                <div class="plaSlideInner1">
                    <h1 id="plaSlideTxt">Buy Natural Products</h1>
                    <button id="plaBtn" class="plaSlideScrollBtn"><a href="./products.php">  Shop Now  </a> </button>
                </div>

                <div class="plaSlideInner2" id="plaSlideImg1"  >
                  
                </div>
            </div>
        </div>
    </div>


<script>
   let valid=1;

let products_slide_obj=[

    {
        src:"./Assets/PlaAssets/platop.jpg",
        Name:"Food Crops Sales"
    },
    {
        src:"./Assets/PlaAssets/plapf.jpg",
        Name:"All Premium Fruits"
    },
    {
        src:"./Assets/PlaAssets/plaveg.jpg",
        Name:"Fresh Farm Vegetables"
    },
    {
        src:"./Assets/PlaAssets/pladod.jpg",
        Name:"Deal of the Day"
    },
    {
        src:"./Assets/PlaAssets/plat3.jpg",
        Name:"Ornamental Crops Sales"
    },
    {
        src:"./Assets/PlaAssets/platop2.jpg",
        Name:"Seasonal Special"
    },
    {
        src:"./Assets/PlaAssets/plat7.jpg",
        Name:"Dry Fruits And Nuts"
    },
    {
        src:"./Assets/PlaAssets/platop6.jpg",
        Name:"Buy Natural Products"
    }
]

var b1=document.getElementById('plaSlideBtn1');
var b2=document.getElementById('plaSlideBtn2');
var img1=document.getElementById('plaSlideImg1');

pladisplayImages();

function pladisplayImages() {
    if (valid >= products_slide_obj.length) {
        valid = 0;
    }
    img1.style.backgroundImage = `url(${products_slide_obj[valid].src})`;
    // img1.src = products_slide_obj[valid].src;
    document.getElementById('plaSlideTxt').innerHTML = products_slide_obj[valid].Name;
    valid++;

    setTimeout(pladisplayImages, 2000);
}
</script>

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
     // output data of each row
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
</body>
</html>

