<?php
    require'./navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my site </title>
</head>
<body>
<?php
$data=[
    ["name"=>"basmala",
    "address"=>"cairo"]
    ,
     ["name"=>"habiba",
    "address"=>"sadat"]
    ,
     ["name"=>"mohammed",
    "address"=>"menoufia"]
];

?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $index => $person): ?>
        <tr>
            <th><?= $index + 1 ?></th>
            <td><?= $person['name'] ?></td>
            <td><?= $person['address'] ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>