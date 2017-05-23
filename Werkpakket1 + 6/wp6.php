<?php

$user = 'root';
$password = 'user';
$database = 'Project_web';
$pdo = null;
try {
$pdo = new PDO("mysql:host=localhost;dbname=$database",$user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
}
$sql = "SELECT * FROM Project_web limit 1000";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

file_put_contents("output.json", json_encode($result));


?>
