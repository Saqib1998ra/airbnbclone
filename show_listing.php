<?php
include("connect_db.php");

$sql = "SELECT * FROM listing";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $id = $row["id"];
        $image = $row["image"];
        $city = $row["city"];
        $address = $row["address"];
        $date = $row["date"];
        $price = $row["price"];

        
        echo "<div class='text-gray-400 w-[23%]'>";   
        echo "<a href= 'booking.html?id=$id' >";     
        echo "<img class='rounded' src='$image' alt='' />";
        echo "<div class='flex justify-between mt-[1rem]'>";
        echo "<h1 class='font-bold text-black'>$city</h1>";
        echo "<div>⭐ 4.89</div>";
        echo "</div>";
        echo "<p>$address</p>";
        echo "<p>$date</p>";
        echo "<div class='flex gap-3'>";
        echo "<h1 class='text-black font-bold'>Rs $price</h1>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        
    }
}

mysqli_close($conn);
?>