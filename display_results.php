<?php
//get the data from the form
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

//validate investment
if ($investment === FALSE) {
    $error_message = 'Investment must be a valid number';
} elseif ($investment <= 0) {
    $error_message ='Investment must be greater than zero';
}
//validate interest_rate
elseif ($interest_rate === FALSE) {
    $error_message = 'Interest rate must be a valid number';
} elseif ($interest_rate <= 0) {
    $error_message ='Interest rate must be greater than zero';
}
//validate investment
elseif ($years === FALSE) {
    $error_message = 'Years must be a valid number';
} elseif ($years <= 0) {
    $error_message ='Years must be greater than zero';
} elseif ($years > 30) {
    $error_message ='Years must be less than 31';
}
//set error message to empty string if no valid entries
else {
    $error_message ='';
}
//i an error_message exists, go to the index page
if ($error_message  !='') {
    include('index.php');
    exit();
}
//calculate future value
$future_value=$investment;
for ($counter=1; $counter<=$years; $counter++) {
    $future_value += $future_value * $interest_rate * 0.01;
}
//apply currency and percent formatting

$investment_f = '$'.number_format($investment, 2);
$yearly_rate_f = $interest_rate.'%';
$future_value_f = '$'.number_format($future_value, 2);
$date= date('m/d/y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Future Value Calculator</title>
</head>
<body> 
    <main>
        <h1>Future Value Calculator</h1>
        <label >Investment Amount:</label>
       <span><?php echo $investment_f ?></span><br>

       <label >Yearly Interest Rates:</label>
       <span><?php echo $yearly_rate_f ?></span><br>

       <label >Number of Years:</label>
       <span><?php echo $years ?></span><br>

       <label >Future Value:</label>
       <span><?php echo $future_value_f ?></span><br> 
 
 
 
 </main> 
 <footer> <label >This calculation was done on </label>
       <span><?php echo $date ?></span>
       </footer>   
</body>
</html>