<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Airbnb Clone Dashboard</title>
    <link rel="icon" type="image/x-icon" href="./assets/airbnb.png">
  </head>
  <body>
    <section
      id="guest"
      class="text-xl text-center font-semibold underline py-[1rem] bg-gray-100 border-inherit"
    >
      <div>Learn about Guest Favorites, the most loved homes on Airbnb</div>
    </section>
    <section id="navbar" class="sticky px-[5rem]">
      <div class="flex py-3 justify-between">
        <div class="flex items-center gap-2 h-[50px]">
          <img class="h-full" src="./assets/airbnb.png" alt="" />
          <p class="text-red-500 text-[1.2rem] font-bold">airbnb</p>
        </div>
        <div class="flex p-3 h-[50px] border-2 border-inherit rounded-full">
          <p class="px-3 text-black font-semibold">Anywhere</p>
          <p class="px-3 border-l-2 text-black font-semibold">Any week</p>
          <p class="px-3 border-l-2 text-gray-400">Add Guests</p>
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
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700"
      >
        <ul class="flex flex-wrap -mb-px">
          <li class="me-2">
            <a
              href="#"
              class="inline-block p-4 rounded-t-lg dark:text-blue-500 dark:border-blue-500"
              >Dashboard</a
            >
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

        $sql = "SELECT * FROM listing";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $image = htmlspecialchars($row['image']);
                $city = htmlspecialchars($row['city']);
                $address = htmlspecialchars($row['address']);
                $date = htmlspecialchars($row['date']);
                $price = htmlspecialchars($row['price']);
                $listingId = $row['id'];

                echo "<div class='text-gray-400 w-[23%]' onclick=\"redirectToBooking('$listingId', '$city')\" style='cursor: pointer;'>";
                echo "<img class='rounded' src='$image' alt='' style='width: 100%; height: 200px;' />";
                echo "<div class='flex justify-between mt-[1rem]'>";
                echo "<h1 class='font-bold text-black'>$city</h1>";
                echo "<p>⭐ 4.00</p>";
                echo "</div>";
                echo "<p>$address</p>";
                echo "<p>$date</p>";
                echo "<div class='flex gap-3'>";
                echo "<h1 class='text-black font-bold'>$price$</h1>";
                echo "<p>night</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No listings found.";
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
