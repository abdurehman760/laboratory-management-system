<?php
echo "Hello";

echo "<br/>";
// variables

$email = "user@gmail.com";
$password  = "12345";

echo $email;
echo "<br/>";
/*
strings, integers, floats, booleans, arrays, and objects.
Learn different data types
fdf

*/

$name = "Dot Code"; // Words => Strings
$age = 23;
$contact = 0323423434; //Numbers => Integers
$weight = 55.5; //Decimal => Floats
$isMarried = true;
$isWomen = false;  // Yes (Ture) or No (False) => Booleans



// Operators

// Assignment Op =
$number = 22;

// arithmetic Op + - * /
10+2;
10-2;
10*2;
10/2;

$x = 5;
$y = 3;
$sum = $x + $y;  // 5 + 3
$subtract= $x - $y;
$product = $x * $y;
$divide = $x / $y;
$remainder = $x % $y;
$power = $x ** $y;  // 5^3

echo $sum;  // Output: 8
echo "<br/>"; 
echo $subtract;  // Output: 2
echo "<br/>";
echo $product;  // Output: 15
echo "<br/>";
echo $divide;  // Output: 2.5
echo "<br/>";
echo $remainder;   //Output : 2
echo "<br/>";
echo $power;  // Output: 125

//  Comparision Operators
//  == equal
//  != no equal
//  === equal with data type
//  !== with data type
//  > Greater | < Less
//  >= Greater or equal | <= Less or equal
echo "<br/>";
$aslam_age = 18;
$asad_age = 20;
$aslam_marks = 240;
$asad_marks = 180;

echo (13 == 13);


// Logical Operators
//  And (&& AND ) | Or (|| OR) | Not (!)
echo "<br/>";
echo (!$asad_age > $aslam_age );

$_name = "Dot Code";
$namE = "Express";
echo "<br/>";
echo $name;
echo "<br/>";
echo $namE;

$while = "ali";
$first_name_user = "ali";
echo "<br/>";


$aslam_age = 10;

if($aslam_age > $asad_age){
    echo "Aslam is older than Asad";
}elseif($aslam_age == $asad_age){
    echo "Asam and asad age is equal";
}
else{
    echo "Aslam is younger than Asad";
}



// Switch Statement
echo "<br/>";
$day = "Friday";

switch($day){
    case "Sunday":
        echo "Today is Sunday";
        break;
    case "Monday":
        echo "Today is Monday";
        break;
    case "Saturday":
        echo "Today is Saturday";
        break;
    default:
        echo "Today is other day";
}

// Increment and decrement operators
echo "<br/>";
$age = 20;
echo $age;
echo "<br/>";
$age++; // $age = 20 + 1 = 21; 

echo $age;
echo "<br/>";

$age--; //$age = 21 - 1;

echo $age;
echo "<br/>";


// For Loop (repeat code)
//* Structure
// * for(  variable (number) ; condition (true | false) ; increment | decrement  ){
// *    Code body I want to repeat.
// * }

for ($i=15; $i > 10; $i--){
    echo "Hello";
    echo $i;
    echo "<br/>";
}
echo "End for loop <br/>";

// While loop
$i = 0;

while($i < 10){
    echo "Hello";
    echo "<br/>";
    $i++;
}


// Arrays
// Using array() function
$numbers = array(1, 2, 3, 4, 5);
$numbers_two = [1,2,3,4,5,6];

// Using shorthand syntax
$names = ['John', 'Jane', 'Alice'];
$ahmad_data = ['Ahmad Ali', 23, 'Pakistan', '034343434'];
//* In General      1       2       3           4
//* In Programming  0       1       2           3
// echo $ahmad_data; //! wrong method
echo $ahmad_data[0];
echo "<br/>";
echo $ahmad_data[2];
echo "<br>";
$ahmad_data[2] = "Swat Pakistan";
echo $ahmad_data[2];
echo "<br>";

$ahmad_data_key = [
    'name'      => "Ahamd Ali",
    'age'       => 23,
    'address'   => "Pakistan",
    'contact'   => "03434343"
];

echo $ahmad_data_key['name'];
echo "<br/>";

$ahmad_data_key['address'] = "Mingora Pakistan";
echo $ahmad_data_key['address'];
echo "<br/>";

echo count($ahmad_data);
echo "<br/>";
array_push($ahmad_data, 200);


echo count($ahmad_data);
echo "<br/>";


// Functions
// * Syntax
// * function anyName( anyData ){
// *     ...... body.... code.
// * }
// * 
// * use
// * anyName( required variables)
// * 


// ? Required Data Email, Password.
function login($email, $password){
    echo "Login successful! Welcome <br/>";
    echo "Your email is: ";
    echo $email;
    echo "<br/>";
    echo "Your password is: ";
    echo $password;

}

login("user@gmail.com", "123abc");

echo "<br/>";

function sum($number_one, $number_two){
    $addition = $number_one+ $number_two;
    return $addition;
}

$result = sum(3, 5);

echo sum(3, 3);
echo "<br/>";
echo $result;

?>