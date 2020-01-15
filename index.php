<?php
//set default value of variables for initial page load
//do more research on this part of the code
if (!isset($investment)) {
    $investment = '';
}
if (!isset($interest_rate)) {
    $interest_rate = '';
}
if (!isset($years)) {
    $years = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
    <div class="container">
<main>
<h1>Future Value Calculator</h1>
<?php if (!empty($error_message)) {?>
    <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
<?php } ?>
<form action="display_results.php" method="post">
    <div id="data">
        <label id="invest">Investment Amount</label>
        <input type="text" name="investment" value="<?php echo htmlspecialchars($investment) ?>">
        <br>

        <label id="rate">Yearly Interest Rate</label>
        <input type="text" name="interest_rate" value="<?php echo htmlspecialchars($interest_rate) ?>">
        <br>

        <label id="years">Number of Years    </label>
        <input type="text" name="years" value="<?php echo htmlspecialchars($years) ?>">
        <br>
</div>

<div id="buttons">
<label>&nbsp</label>
<input type="submit" value="Calculate"> <br>

</div>

</form>
</main>  
</div>
</body>
</html>