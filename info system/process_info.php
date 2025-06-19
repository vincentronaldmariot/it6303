<?php
$full_name = $_POST['full_name'] ?? '';
$birth_year = $_POST['birth_year'] ?? 0;
$sleep_hours = $_POST['sleep_hours'] ?? 0;
$city = $_POST['city'] ?? '';

if (!$full_name || !$birth_year || !$sleep_hours || !$city) {
    die("All fields are required!");
}
if (!is_numeric($birth_year) || $birth_year > date('Y')) {
    die("Invalid birth year!");
}

$current_year = date('Y');
$age = $current_year - $birth_year;

$total_sleep_hours = $sleep_hours * 365 * $age;

$age_message = $age <= 25 
    ? "play more dota 2!" 
    : ($age > 50 ? "youre too old more this." : "");

$sleep_message = $total_sleep_hours > (15 * 365 * 24)
    ? "gising na babygirl!" 
    : "blooming ka today!";

$city_message = $city === "Quezon City" 
    ? "traffic dito brother!" 
    : "lipat kana sa qc!.";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Results</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: auto; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        div { margin: 20px auto; width: 50%; text-align: center; }
    </style>
</head>
<body>
    <h1>Results</h1>

    <table>
        <tr>
            <th>Full Name</th>
            <td><?= htmlspecialchars($full_name) ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?= $age ?></td>
        </tr>
        <tr>
            <th>Total Sleeping Hours</th>
            <td><?= number_format($total_sleep_hours) ?> hours</td>
        </tr>
        <tr>
            <th>City</th>
            <td><?= htmlspecialchars($city) ?></td>
        </tr>
    </table>

    <div>
        <p><?= $age_message ?></p>
        <p><?= $sleep_message ?></p>
        <p><?= $city_message ?></p>
    </div>
</body>
</html>