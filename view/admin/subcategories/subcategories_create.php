<?php
require_once "../../../controller/admin/subcategories/new_subcategory_controller.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="../../../controller/admin/subcategories/new_subcategory_controller.php" method="post">
    <input type="text" name="name" placeholder="Subcategory name" required/><br>
    <select name="category_id">
        <?php
        foreach ($categories as $category) {
            echo "<option value=\"" . $category['id'] . "\">" . $category['name'] . "</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Create" name="submit">
</form>
</body>
</html>