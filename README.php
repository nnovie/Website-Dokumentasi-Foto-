# Website-Dokumentasi-Foto-
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $targetDirectory = "uploads/"; // Specify the directory for storing uploaded images
  $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
  
  // Check if the image file is an actual image or fake image
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
  
  // Check if file already exists
  if (file_exists($targetFile)) {
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      // Additional code for storing image information in the database if necessary
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>
