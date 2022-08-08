<?php
require_once 'db.php';



if( $_FILES["img_src"]["error"] == 0 ){
    echo "File Temp: " . $_FILES["img_src"]["tmp_name"] . "<br>";
    move_uploaded_file( $_FILES["img_src"]["tmp_name"],"uploadImg/" .$_FILES["img_src"]["name"] );
}
else if( $_FILES["img_src"]["error"] <> 4 )
    echo $_FILES["img_src"]["name"] . " 檔案上傳失敗";
$a=$_FILES["img_src"]["name"];

$sql = "INSERT INTO pet (name, sex, age, data , img_src,phone) VALUES (:name, :sex, :age, :data , :img_src,:phone)";
$result = $conn->prepare($sql);
$result->execute([
	":name" => $_POST["name"],
	":sex" => $_POST["sex"],
	":age" => $_POST["age"],
	":data" => $_POST["data"],
	":phone" => $_POST["phone"],
	":img_src" => $a
	
]);
header("Location:CMS.php");

?>