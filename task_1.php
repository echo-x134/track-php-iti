<?php 
echo "Abdullah Gad";

//==============
$x = 5;
$y = "Welcome";
$z = true;

echo "Type of x: " . gettype($x) . "<br>";
echo "Type of y: " . gettype($y) . "<br>";
echo "Type of z: " . gettype($z) . "<br>";

//==============

// for ($i = 0; $i <= 15; $i++) {
//     echo $i . "<br>";
// }
//==============\

// $i = 0;

// while ($i <= 15) {
//     echo $i . "<br>";
//     $i++;
// }
//==============

define("NAME", "IT");

echo NAME;
//==============

// var_dump(isset($x));
// echo "<br>";

// var_dump(isset($y));
// echo "<br>";

// var_dump(isset($z));

//==============
// var_dump(empty($x));
// echo "<br>";

// var_dump(empty($y));
// echo "<br>";

// var_dump(empty($z));

//==============

// $m = 30;
// $n = 25;

// $result = $m + $n;

// if ($result > 50) {
//     echo "Accepted";
// } else {
//     echo "Not accepted";
// }

// =============<

// $name = "Mohamed Khedr";
// $age = 20;
// $address = "Cairo";

// echo "<table border='1'>";

// echo "<tr>";
// echo "<th>Name</th>";
// echo "<th>Age</th>";
// echo "<th>Address</th>";
// echo "</tr>";

// echo "<tr>";
// echo "<td>$name</td>";
// echo "<td>$age</td>";
// echo "<td>$address</td>";
// echo "</tr>";

// echo "</table>";

//==============

function numbToStr($number) {
    return (string)$number;
}

echo numbToStr(246);
echo "<br>";
echo numbToStr(2006);


?>