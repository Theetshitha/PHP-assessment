<?php

require("header.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
</body>
</html>
<?php
   $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Ecommerce");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT b.author_id, b.title, b.content, b.createdAt, u.name FROM blogs b JOIN users u ON b.author_id = u.id WHERE b.status = 'published';";
    $result = $conn->query($sql);

    if ($result-> num_rows > 0) {
        echo "<br>";
        echo "<br>";
        echo "<center><h1 class='text-3xl font-bold text-blue-800'>Welcome to Review Blog Page</h1></center>";
        echo "<br>";
        echo "<br>";
        while($row = $result->fetch_assoc()) {
            echo " <div class='max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg'>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><h1 class='text-3xl font-bold text-gray-800'>Title:" ." ". $row["title"] ."</h1></div>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><p class='text-base text-gray-900'>Content:"." " . $row["content"] . "</p></div>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><h2 class='text-base text-gray-600'>Created At:"." ". $row["createdAt"] . "</h2></div>";
            echo " <div class='mb-4 border-b border-gray-300 pb-4'><h4 class='text-base text-gray-800'>Customer Name:"." " . $row["name"] . "</h4></div>";
            
            echo " </div>";
            echo " <br><br>"; 

        }

        echo "<br><br>"; 
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

<?php
require('footer.php')
?>