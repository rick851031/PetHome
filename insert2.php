<?php
require_once 'db.php';



if( $_FILES["img_src"]["error"] == 0 ){
    echo "File Temp: " . $_FILES["img_src"]["tmp_name"] . "<br>";
    move_uploaded_file( $_FILES["img_src"]["tmp_name"],"uploadShopImg/" .$_FILES["img_src"]["name"] );
}
else if( $_FILES["img_src"]["error"] <> 4 )
    echo $_FILES["img_src"]["name"] . " 檔案上傳失敗";
$a=$_FILES["img_src"]["name"];

$sql = "INSERT INTO pet2 (name, price,  data , img_src) VALUES (:name, :price, :data , :img_src)";
$result = $conn->prepare($sql);
$result->execute([
	":name" => $_POST["name"],
	":price" => $_POST["price"],
	":data" => $_POST["data"],
	":img_src" => $a
	
]);
header("Location:CMS2.php");

?>