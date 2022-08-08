<?php
require_once("db.php");

$sql = "DELETE FROM pet2 WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute(array(
    ":id" => $_GET["a"]
));

header("Location: CMS2.php");
