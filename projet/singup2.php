<?php
$conn = new PDO(
  'mysql:host=localhost;dbname=rnopounykp30',
  'fo79yd84ifno',
  'd4nc2p|2pd');
  $options = [
    'cost' => 12,
];
$u = $_POST['username'];
$e = $_POST['email'];
$p = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
  // requête parametrée :nom
$sql = 'INSERT INTO users (username, email, password) VALUES (:u, :e, :p)';
$statement = $conn->prepare($sql);
$statement->execute([
	':u' => $u,
	':e' => $e,
	':p' => $p
	]
);


header('login.html?message=OK');
