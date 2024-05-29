<?php
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>

<body class="bg-gray-100">
<header>
        <?php  require "./view/partials/header.php" ?>
    </header>
    <div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
            <p class="text-xl font-bold">All Users</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          <a href="./admin_home_page.php"><img src="./view/src/next.png" alt="Next" class="w-6 h-6"></a>
    </button>

        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border">
                <thead>
                    <tr class="bg-purple-600 rounded">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Course</th>
                        <th class="px-4 py-2">Admin</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "./controller/tableretrive.php";
                    $rowColor = 'bg-gray-100';
                    while ($user = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr class="<?php echo $rowColor; ?>">
                            <td class="border px-4 py-2"><?php echo $user['id']; ?></td>
                            <td class="border px-4 py-2"><?php echo $user['Name']; ?></td>
                            <td class="border px-4 py-2"><?php echo $user['EmailAddress']; ?></td>
                            <td class="border px-4 py-2"><?php echo $user['CourseName']; ?></td>
                            <td class="border px-4 py-2"><?php echo $user['isAdmin'] ? 'Yes' : 'No'; ?></td>
                            <td class="border px-4 py-2">
                                <a href="./controller/edit_user.php?id=<?php echo $user['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                <a href="./controller/delete_user.php?id=<?php echo $user['id']; ?>" class="text-red-500 hover:text-red-700">Delete</a>
                            </td>
                        </tr>
                        <?php
                        // Toggle row color
                        $rowColor = ($rowColor == 'bg-gray-100') ? 'bg-white' : 'bg-gray-100';
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>
