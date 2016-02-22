<?
/**
 * PHP array examples
 */

/*
I. Indexed arrays ("vectors")
*/

$vect = array(3, 2, 4, 1);

// accessing
echo $vect[0] . "\n"; // 3
echo $vect[3] . "\n"; // 1

// adding new element
$vect[] = 7; 

// iterating
for ($i = 0; $i < count($vect); $i++) {
    echo $vect[$i] . " ";
}
echo "\n";
// Output: 3 2 4 1 7

// sorting 
// from low to high
sort($vect); 
print_r($vect); // 1 2 3 4 7

// high to low
rsort($vect); 
print_r($vect); // 7 4 3 2 1


/*
II. Associative arrays
*/

$arr = array(
    "lemon" => 3, 
    "orange" => 2, 
    "apple" => 1
    );    

// checking if key exists
if (array_key_exists("lemon", $arr)) { // true
    echo $arr["lemon"] . "\n";
}

// adding a new element
$arr["banana"] = 4;

// iterating
foreach ($arr as $key => $value) {
	echo "(" . $key . ": " . $value . ") ";
}
echo "\n";
// Output: (lemon: 3) (orange: 2) (banana: 4) (apple: 1)

// sorting (by maintaining index associations)
// by key, low to high
ksort($arr);
print_r($arr); // apple => 1, banana => 4, lemon => 3, orange => 2

// by key, high to low
krsort($arr);
print_r($arr); // orange => 2, lemon => 3, banana => 4, apple => 1

// by value, low to high
asort($arr);
print_r($arr); // apple => 1, orange => 2, lemon => 3, banana => 4

// by value, high to low
arsort($arr);
print_r($arr); // banana => 4, lemon => 3, orange => 2, apple => 1
