<?php
$MySQL = mysqli_connect("localhost", "root", "", "vjezba17") or die('Error connecting to MySQL server.');

$query = "
    SELECT users.user_firstname, users.user_lastname, country.country_name
    FROM users
    LEFT JOIN country ON users.country_code = country.country_code
";
$result = mysqli_query($MySQL, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users and country</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h3>Korisnici i zemlje</h3>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo "<span class='user-name'>" . htmlspecialchars($row['user_firstname']) . " " . htmlspecialchars($row['user_lastname']) . "</span>";
            echo "<span class='user-country'> (" . ($row['country_name'] ? htmlspecialchars($row['country_name']) : 'Unknown') . ")</span>";
            echo "</p>";
        }
    } else {
        echo "<p>No users found.</p>";
    }

    mysqli_close($MySQL);
    ?>
</div>

</body>
</html>

<!-- vježba 17 - Korisnici + Zemlje -->
