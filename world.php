<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];
$country_filter = filter_var($country, FILTER_SANITIZE_STRING);
$city = isset($_GET['lookup']) ? $_GET['lookup'] : null;
$city_filter = filter_var($city, FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if (empty($city_filter)){
  $stmt = $conn->query("SELECT * FROM countries WHERE `name` LIKE '%$country_filter%'");
}else{
  $stmt = $conn->query("SELECT * FROM countries cs join cities c on c.country_code = cs.code WHERE cs.name LIKE '%$country_filter%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
  <tr>
    <?php if (empty($city_filter)): ?>
      <th scope="col">Name</th>
      <th scope="col">Continent</th>
      <th scope="col">Independence</th>
      <th scope="col">Head of State</th>
    <?php else: ?>
      <th scope="col">Name</th>
      <th scope="col">District</th>
      <th scope="col">Population</th>
    <?php endif; ?>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <?php if (empty($city_filter)): ?>
        <th><?= $row['name'] ?></th>
        <th><?= $row['continent'] ?></th>
        <th><?= $row['independence_year'] ?></th>
        <th><?= $row['head_of_state'] ?></th>
      <?php else: ?>
        <th><?= $row['name'] ?></th>
        <th><?= $row['district'] ?></th>
        <th><?= $row['population'] ?></th>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</table>

