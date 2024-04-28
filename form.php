<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "businessdb";

// Establishing connection to MySQL database
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{

// Retrieving form data
$productName = $_POST['productName'];
$category = $_POST['category'];
$manufacturingDate = $_POST['manufacturingDate'];

// Handle file upload
$imageURL = $_FILES["imageURL"];
$target_directory = '/tutorial/photo/';
$target_file = $_SERVER['DOCUMENT_ROOT'] . $target_directory . basename($imageURL["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Generate a unique name for the uploaded image
$photo = time() . '_' . $productName . '.' . $imageFileType;
$target_path = $target_directory . $photo;

// Check file type and size
if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
    die("Please upload a photo with extension jpg, jpeg, or png.");
} elseif ($imageURL["size"] > 20000000) {
    die("File is too large.");
} elseif (!move_uploaded_file($imageURL["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_path)) {
    die("Error uploading file.");
}

// SQL query to insert data into the table
$sql = "INSERT INTO product (productName, category, date, image) VALUES ('$productName', '$category', '$manufacturingDate', '$target_path')";

if (mysqli_query($conn, $sql)) {
    header("Location: slider.php");
    exit;
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
// Closing connection
mysqli_close($conn);
?>
