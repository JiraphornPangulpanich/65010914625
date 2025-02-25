<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Insert Product</h1>
<form method="post" action="" enctype="multipart/form-data">
    Name Product: <input type="text" name="pname" required autofocus><br><br>
    Price: <input type="text" name="pprice" required><br><br>
    Product Detail: <textarea name="pdetail" rows="4" cols="50" required></textarea><br><br>
    Product Image: <input type="file" name="pimage" accept="image/*" required><br><br>
    <button type="submit">Save</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once("../connectdb.php");
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pdetail = $_POST['pdetail'];
    $upload_dir = "../images/";

    // Check if the folder exists; if not, create it.
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle file upload
    $file = $_FILES['pimage'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_error = $file['error'];

    if ($file_error === 0) {
        // Check if file is an actual image
        $check = getimagesize($file_tmp);
        if ($check !== false) {
            // Insert product data first without image name
            $sql = "INSERT INTO products (p_name, p_detail, p_price, p_ext) VALUES ('$pname', '$pdetail', '$pprice', '')";
            if (mysqli_query($conn, $sql)) {
                // Get the last inserted product ID
                $product_id = mysqli_insert_id($conn);

                // Generate new filename using the product ID
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $unique_filename = $product_id . '.' . $extension;

                // Move the file to the upload directory
                $target_file = $upload_dir . $unique_filename;
                if (move_uploaded_file($file_tmp, $target_file)) {
                    // Update the database with the correct image name
                    $sql_update = "UPDATE products SET p_ext = '$extension' WHERE p_id = $product_id";
                    if (mysqli_query($conn, $sql_update)) {
                        echo "<script>alert('Insert success!');</script>";
                    } else {
                        echo "<script>alert('Failed to update image name in database: " . mysqli_error($conn) . "');</script>";
                    }
                } else {
                    echo "<script>alert('Failed to upload image.');</script>";
                }
            } else {
                echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('File is not a valid image.');</script>";
        }
    } else {
        echo "<script>alert('Image upload error: $file_error');</script>";
    }
}
?>


</body>
</html>