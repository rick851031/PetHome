<?

 $db_host = "sql103.byethost14.com";
 $db_username = "";
 $db_password = "";
 $db_name = ""; 

 try{
	 $conn = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8",$db_username,$db_password);
     $conn->query("SET NAMES utf8");
 }catch(PDOException $e){
	 print "資料庫連結失敗...Msg:{$e->getMessage()}<br/>";
	 die();
 }
?>
