<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1 mt-8">
        <div class="p-6 sm:p-12">
          <div class="flex justify-between items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold">Book Records</h1>
            <button onclick="window.location.href = 'registration.html'" class="px-4 py-2 bg-green-500 text-white rounded-lg">Add New Record</button>
          </div>
          <div class="overflow-x-auto mt-8">
            <table class="w-full table-fixed">
              <thead>
                <tr>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Title</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Author</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Genre</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Publication Date</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                 // Retrieve data from the database
                $sql = "SELECT * FROM register";
                $result = mysqli_query($con, $sql);
          
                // Display the data in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='px-6 py-2'>" . $row['name'] . "</td>";
                    echo "<td class='px-6 py-2'>" . $row['author'] . "</td>";
                    echo "<td class='px-6 py-2'>" . $row['genre'] . "</td>";
                    echo "<td class='px-6 py-2'>" . $row['date'] . "</td>";
                    echo "<td class='px-6 py-2'>";
                    echo "<a href='edit.php?id=" . $row['id'] . "' class='px-4 py-2 bg-indigo-500 text-white rounded-lg'>Edit</a>";
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='px-4 py-2 bg-red-500 text-white rounded-lg ml-2'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
  </body>
</html>
