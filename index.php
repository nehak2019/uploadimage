
<html>
<head>
<title>UPLOAD TO FOLDER</title>
</head>
<body style="background-image: url(fl.gif);background-repeat: no-repeat;background-size: cover;">

  <p>UPLOAD IMAGE TO FOLDER</p>
  <form action="" method="post" accept="image/*"  enctype="multipart/form-data">
      IMAGE NAME : <input type = "text" name = "name"><BR>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><BR>
    <input type="submit" value="Upload Image" name="upload">
</form>

  <?php

  if(isset($_POST['upload'])){
    $name = $_POST['name'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//Get tmp link of the file
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["upload"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
            $imageurl = "image/".$_FILES["fileToUpload"]["name"];
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
       echo "<img src='$imageurl'><br>";
       echo "the name is :".$name;
   }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
}


  ?>

</body>
</html>
