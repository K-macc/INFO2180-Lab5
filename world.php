<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$query = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE `name` LIKE '%$query%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<table>
  <tr>
    <th scope="col">Name</th>
    <th scope="col">Continent</th>
    <th scope="col">Independence</th>
    <th scope="col">Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <th><?= $row['name'] ?></th>
      <th><?= $row['continent'] ?></th>
      <th><?= $row['independence_year'] ?></th>
      <th><?= $row['head_of_state'] ?></th>
    </tr>
  <?php endforeach; ?>
</table>
