<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Airbnb Clone Booking</title>
    <link rel="icon" type="image/x-icon" href="./assets/airbnb.png">
  </head>
  <body>
    <section id="navbar" class="sticky px-[5rem]">
      <div class="flex py-3 justify-between">
        <div class="flex items-center gap-2 h-[50px]">
          <img class="h-full" src="./assets/airbnb.png" alt="" />
          <p onclick="window.location.href='airbnb.php'" class="cursor-pointer text-red-500 text-[1.2rem] font-bold">airbnb</p>
        </div>
        <div class="flex p-3 h-[50px] border-2 border-inherit rounded-full">
          <input class="font-semibold px-3 text-gray-400 outline-none placeholder-gray-900 placeholder-opacity-100 ..." placeholder="Start yout search">
          <div class="h-full">
            <img
              class="h-[100%] bg-red-500 p-1 rounded-full"
              src="./assets/magnifying-glass.png"
              alt=""
            />
          </div>
        </div>
        <div class="flex gap-[2rem] items-center h-[50px]">
          <button onclick="window.location.href = 'bookingForm.html';"><p>Airbnb your home</p></button>

          <div class="h-full items-center flex">
            <img class="h-[40%]" src="./assets/globe.png" alt="" />
          </div>
          <div
            class="border-2 rounded-full gap-2 border-inheret p-3 h-full items-center flex"
          >
            <img class="h-[70%]" src="./assets/hamburger.png" alt="" />
            <img class="h-[100%]" src="./assets/profile.png" alt="" />
          </div>
        </div>
      </div>

      <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-200"
      >
        <ul class="flex flex-wrap -mb-px">
          <li class="me-2">
          </li>
        </ul>
      </div>
    </section>
    <section id="rooms" class="mx-[5rem] mt-[2rem]">
    <div class="flex flex-wrap gap-4">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "airdb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $stmt = $conn->prepare("SELECT * FROM listing WHERE id = ?");
            $stmt->bind_param("i", $id); // 'i' represents an integer, assuming ID is an integer
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $image = htmlspecialchars($row['image']);
                $city = htmlspecialchars($row['city']);
                $address = htmlspecialchars($row['address']);
                $price = htmlspecialchars($row['price']);

                echo "<div class='grid grid-cols-2'>";
                echo "<div class='rounded'>";
                echo "<img class='rounded w-[90%]' src='$image' alt='' />";
                echo "</div>";
                echo "<div class='grid grid-cols-2 grid-rows-2'>";

                for ($i = 0; $i < 4; $i++) {
                    echo "<img class='rounded w-[90%] p-[2%]' src='$image' alt='' />";
                }

                echo "</div>";
                echo "<div class='flex justify-between mt-[1rem]'>";
                echo "<h1 class='font-bold text-black text-2xl'>$address</h1>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "Listing not found.";
            }

            $stmt->close();
        } else {
            echo "No ID parameter provided.";
        }

        $conn->close();
        ?>
    </div>
</section>




<script>
    // JavaScript function to redirect to booking.php with the selected ID and city
    function redirectToBooking(id, city) {
        window.location.href = 'booking.php?id=' + id + '&city=' + encodeURIComponent(city);
    }
</script>





    <section id="rooms" class="mx-[5rem] mt-[2rem]">
        <div class="flex flex-wrap gap-4"></div>
<div class="flex justify-between">
<div class="font-bold mb-5 p-4 text-right">
    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-200"
      >
      </div>
</div>
<?php
echo '<div class="inline-block shadow-inner shadow-xl p-6 ">';
echo '<div class="mx-auto w-full max-w-[550px]">';
echo '<form action="reserve.php" method="POST">';

echo '<div class="mb-5">';
echo '<div class="font-bold text-black text-2xl">';
echo "<h1 class='font-bold text-[#07074D]'>Price: $price</h1>";
echo '</div>';
?>
<input type="hidden" name="price" value="<?php echo $price; ?>">
<label
  for="guest"
  class="mb-3 block text-base font-medium text-[#07074D]"
>
  How many guests are you bringing?
</label>
<input
  type="number"
  name="guest"
  id="guest"
  placeholder="0"
  min="0"
  class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
/>
</div>

<div class="-mx-3 flex flex-wrap">
  <div class="w-full px-3 sm:w-1/2">
    <div class="mb-5">
      <label
        for="date"
        class="mb-3 block text-base font-medium text-[#07074D]"
      >
        Check In
      </label>
      <input
        type="date"
        name="check_in" 
        id="date"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
      />
    </div>
  </div>
  <div class="w-full px-3 sm:w-1/2">
    <div class="mb-5">
      <label
        for="time"
        class="mb-3 block text-base font-medium text-[#07074D]"
      >
        Check Out
      </label>
      <input
        type="date"
        name="check_out"
        id="date"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
      />
    </div>
  </div>
  <div class="w-full px-3 sm:w-1/2">
        <button
          type="submit"
          name="reserve_button" 
          class="hover:shadow-form rounded-md bg-[crimson] py-3 px-8 text-center text-base font-semibold text-white outline-none"
        >
          Reserve
        </button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</div>
</section>

<section id="footer" class="px-[5rem] py-[2rem] mt-[3rem] bg-gray-100">
  <div class="flex justify-between py-[2rem] border-y-2 border-inherit">
    <div>
      <h1 class="font-bold">Support</h1>
      <ul class="mt-[1rem]">
        <li>Help Center</li>
        <li>AirCover</li>
        <li>Anti-discrimination</li>
        <li>Disability Support</li>
        <li>Cancelation Options</li>
        <li>Report Neighborhood concerns</li>
      </ul>
    </div>
    <div>
      <h1 class="font-bold">Hosting</h1>
      <ul class="mt-[1rem]">
        <li>Help Center</li>
        <li>AirCover</li>
        <li>Anti-discrimination</li>
        <li>Disability Support</li>
        <li>Cancelation Options</li>
        <li>Report Neighborhood concerns</li>
      </ul>
    </div>
    <div>
      <h1 class="font-bold">Airbnb</h1>
      <ul class="mt-[1rem]">
        <li>Help Center</li>
        <li>AirCover</li>
        <li>Anti-discrimination</li>
        <li>Disability Support</li>
        <li>Cancelation Options</li>
        <li>Report Neighborhood concerns</li>
      </ul>
  </div>
  </div>
</section>
  </body>
</html>
