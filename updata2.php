<?php
require_once("db.php");

if( $_FILES["img_src"]["error"] == 0 ){
    echo "File Temp: " . $_FILES["img_src"]["tmp_name"] . "<br>";
    move_uploaded_file( $_FILES["img_src"]["tmp_name"],"uploadShopImg/" .$_FILES["img_src"]["name"] );
}
else if( $_FILES["img_src"]["error"] <> 4 )
    echo $_FILES["img_src"]["name"] . " 檔案上傳失敗";
$a=$_FILES["img_src"]["name"];

if (!empty($_FILES['img_src']['tmp_name'])){
$sql = "UPDATE pet2 SET name=:name, price=:price,data=:data , img_src=:img_src WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute([
	":name" => $_POST["name"],
	":price" => $_POST["price"],
	":data" => $_POST["data"],
	":img_src" => $a,
	":id" => $_POST["id"],
]);}else{
$sql = "UPDATE pet2 SET name=:name, price=:price,data=:data WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute([
	":name" => $_POST["name"],
	":price" => $_POST["price"],
	":data" => $_POST["data"],
	":id" => $_POST["id"],
]);
}

//取得更新的資料 與 新增一樣
$sql = "SELECT * FROM pet2 WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute(array(
    ":id" => $_POST["id"]
));
$data = $result->fetch();

header("Location: CMS2.php");