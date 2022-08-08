<?php
require_once("db.php");

if( $_FILES["img_src"]["error"] == 0 ){
    echo "File Temp: " . $_FILES["img_src"]["tmp_name"] . "<br>";
    move_uploaded_file( $_FILES["img_src"]["tmp_name"],"uploadImg/" .$_FILES["img_src"]["name"] );
}
else if( $_FILES["img_src"]["error"] <> 4 )
    echo $_FILES["img_src"]["name"] . " 檔案上傳失敗";
$a=$_FILES["img_src"]["name"];

if (!empty($_FILES['img_src']['tmp_name'])){
$sql = "UPDATE pet SET name=:name, sex=:sex,age=:age, data=:data , img_src=:img_src,phone=:phone WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute([
	":name" => $_POST["name"],
	":sex" => $_POST["sex"],
	":age" => $_POST["age"],
	":data" => $_POST["data"],
	":phone" => $_POST["phone"],
	":img_src" => $a,
	":id" => $_POST["id"],
]);}else{
    $sql = "UPDATE pet SET name=:name, sex=:sex,age=:age, data=:data ,phone=:phone WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute([
	":name" => $_POST["name"],
	":sex" => $_POST["sex"],
	":age" => $_POST["age"],
	":data" => $_POST["data"],
	":phone" => $_POST["phone"],
	":id" => $_POST["id"],
]);
}

//取得更新的資料 與 新增一樣
$sql = "SELECT * FROM pet WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute(array(
    ":id" => $_POST["id"]
));
$data = $result->fetch();

header("Location: CMS.php");