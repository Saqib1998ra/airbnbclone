<?php
include("connect_db.php");
if($_GET["id"]){
    $id = $_GET['id'];
    $sql ="SELECT * FROM listing WHERE id=$id";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $image = $row["image"];
            $address = $row["address"];
            $price = $row["price"];
            echo "<div class='grid grid-cols-2 ' >";
            echo "<div  class='text-gray-400 w-[95.4%] flex space-x-4'>";
            echo "<img class='rounded' src='$image' alt='House image' />";
            echo "</div>";
            echo "<div id='other-imgs' class='grid grid-cols-2 grid-rows-2'>";
            echo "</div>";
            echo "<div class='flex justify-between mt-[1rem]'>";
            echo "<h1 class='ffont-bold text-black text-2xl'>$address</h1>";
            echo "</div>";
            echo "</div>";
            echo "<div class='inline-block'>";
            echo "<div class='mx-auto w-full max-w-[550px]'>";
            echo "<form action='reserveFormAction.php?id=$id&price=$price' method='POST'>";
            echo "<div class='mb-5'>";
            echo "<div name='price' id='get-price' class='font-bold text-2xl'>";
            echo "Rs $price";
            echo "</div>";
            echo "<label
            for='guest'
            class='mb-3 block text-base font-medium text-[#07074D]'
            >
            How many guest are you bringing?
            </label>";
            echo "<input
            type='number'
            name='guest'
            id='guest'
            placeholder='5'
            min='0'
            class='w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md'
            />";
            echo "</div>";
            echo "<div class='-mx-3 flex flex-wrap'>";
            echo "<div class='w-full px-3 sm:w-1/2'>";
            echo "<div class='mb-5'>";
            echo "<label
            for='date'
            class='mb-3 block text-base font-medium text-[#07074D]'
           >
            Check In
            </label>";
            echo "<input
            type='date'
            name='chk-in'
            id='date'
            class='w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md'
            />";
            echo "</div>";
            echo "</div>";
            echo "<div class='w-full px-3 sm:w-1/2'>";
            echo "<div class='mb-5'>";
            echo "<label
            for='time'
            class='mb-3 block text-base font-medium text-[#07074D]'
            >
            Check Out
            </label>";
            echo "<input
            type='date'
            name='chk-out'
            id='date'
            class='w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md'
            />";
            echo "</div>";
            echo "</div>";
            echo "<div class='w-full px-3 sm:w-1/2'>";
            echo "<div class='mb-5'>";
            echo "<div>";
            echo "<button type='submit' name='submit'
            class='hover:shadow-form rounded-md bg-[red] py-3 px-8 text-center text-base font-semibold text-white outline-none'
            >
            Reserve
            </button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";

            
            
        }
    }
}
?>