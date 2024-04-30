

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="navBarCheckout">
      <div class="navCheckoutInner" style="width: 90%; justify-content: space-between; gap: 100px; ">
            <div class="navCheckoutLeft"  style="width: 25%; gap: 40px;">
              <a href="index.php"><h3>Theetshi's Mart</h3></a> 
            </div>
            <div class="navCheckoutRight" style="width: 70%;  ">
              <form class="navSearch" method="get" style="width: 90%;justify-content: center; " >
                <input id="navSearchBox" name="query" type="text" placeholder="search products..." style="box-shadow: 0px 2px 5px rgb(156, 156, 156); border: none; outline: none; height: 35px; width: 85%; padding: 0px 10px; border-radius: 17px 0px 0px 17px;" />
                <div id="navSearchIcon" style="width: 8%; justify-content: center; height: 36px; text-align: center; background-color: #153c2e; border-radius: 0px 17px 17px 0px; box-shadow: 2px 2px 5px rgb(156, 156, 156);">
                  <i class="fa-solid fa-magnifying-glass" style="color: white; font-size: 16px;"></i>
                </div>
              </form>
              
            </div>

            <div class="cartProfileIcon" style="width: 25%;justify-content: space-between; gap: 10px;">
              
              <button id="plaBtn" class="plaLoginBtn"><a href="index.php">Login</a></button>    
             
            
            <i id="navProfileIcon" class="fa-solid fa-user" style="font-size: 20px;" > </i>
          
      </div>
      </div>
         
    </div>
    
    <div class="navbar" >
        <div style="margin-left:55px;">
        <div class="dropdown">
            <button class="dropbtn" >Products <i class="fa fa-caret-down"></i> </button>
            <div class="dropdown-content">
            <a href="./products.php">Vegetables</a>
            <a href="./products.php">Fruits</a>
            <a href="./products.php">Grains</a>
            </div>
        </div> 
        <div class="dropdown">
            <button class="dropbtn"><a href="./blog.php">Review Blogs</a></button>
            
        </div> 
        </div>
  
</div>
<script>
    document.getElementById("navSearchIcon").onclick = function() {
        var searchQuery = document.getElementById("navSearchBox").value;
        window.location.href = "header.php?query=" + searchQuery;
    };
</script>
</body>
</html>

<?php

$conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Ecommerce");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  
if (isset($_GET['query'])) {
    $search = $_GET['query'];
    
  
    $sql = "SELECT * FROM Product_details WHERE Product_Name LIKE '%$search%'";
    $sql1 = "SELECT * FROM blogs WHERE title LIKE '%$search%'";

    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);

    if ($result->num_rows > 0) {
            echo " <br><br>"; 
            echo "<div style='display:flex;justify-content:centre;align-item:center;' class='grid grid-cols-4 gap-2'>";
         
            while($row = $result->fetch_assoc()) {
                echo " <div class='bg-gray-200 p-4 card'><img src=". $row["Image"] ."alt='' style='height:100px; width:100px; border-radius:20px;'><h3>". $row["Product_Name"] ."</h3><h3>". $row["Price"] ."</h3><h4>". $row["Description"] ."</h4></div>";
              
                echo " <br><br>"; 
    
            }
            echo "</div>";
            echo "<br><br><br><br><br><br>";
          
            require("footer.php");

        
    }
    else if ($result1-> num_rows > 0) {
        echo "<br>";
        echo "<br>";
        echo "<center><h1 class='text-3xl font-bold text-blue-800'>Welcome to Review Blog Page</h1></center>";
        echo "<br>";
        echo "<br>";
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            echo " <div class='max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg'>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><h1 class='text-3xl font-bold text-gray-800'>Title:" ." ". $row["title"] ."</h1></div>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><p class='text-base text-gray-900'>Content:"." " . $row["content"] . "</p></div>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><h2 class='text-base text-gray-600'>Created At:"." ". $row["createdAt"] . "</h2></div>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><h4 class='text-base text-gray-800'>Customer Name:"." " . $row["name"] . "</h4></div>";
            
            echo " </div>";
            echo " <br><br><br><br>"; 
    
            require("footer.php");
        }

        echo "<br><br>"; 
    }
    
    else {
        echo "<br><br>"; 
        echo "No results found!";
        echo "<br><br><br><br><br><br>";  
        require("footer.php");
    }
}

$conn->close();
?>
