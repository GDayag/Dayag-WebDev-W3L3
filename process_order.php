<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milktea House Order Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['customer_name'], $_POST['customer_address'], $_POST['tea_flavor'], $_POST['cup_size'])) {
        $customer_name = $_POST['customer_name'];
        $customer_address = $_POST['customer_address'];
        $tea_flavor = $_POST['tea_flavor'];
        $cup_size = $_POST['cup_size'];

        $tea_prices = [
            "Okinawa" => 80.00,
            "Wintermelon" => 80.00,
            "Cheese Cake" => 90.00,
            "Dark Choco" => 90.00,
            "Salted Caramel" => 85.00,
            "Taro" => 80.00,
            "Choco Hazelnut" => 85.00,
            "Double Dutch" => 85.00,
            "Strawberry" => 85.00,

        ];
        $cup_prices = [
            "Small" => 0.00,
            "Medium" => 10.00,
            "Large" => 15.00
        ];
        $add_ons_prices = [
            "Cream Cheese" => 20.00,
            "Pearls" => 15.00,
            "Jelly" => 10.00
        ];

        $total = $tea_prices[$tea_flavor] + $cup_prices[$cup_size];
        if (isset($_POST['add_ons'])) {
            foreach ($_POST['add_ons'] as $selected_addon) {
                $total += $add_ons_prices[$selected_addon];
            }
        }

        echo "<h2>Order Summary</h2>";
        echo "<p>Name: $customer_name</p>";
        echo "<p>Address: $customer_address</p>";
        echo "<h3>Order Details:</h3>";
        echo "<p>Milktea Flavor: $tea_flavor (+₱" . $tea_prices[$tea_flavor] . ")</p>";
        echo "<p>Cup Size: $cup_size (+₱" . $cup_prices[$cup_size] . ")</p>";
        if (isset($_POST['add_ons'])) {
            echo "<p>Add-ons:</p>";
            foreach ($_POST['add_ons'] as $selected_addon) {
                echo "<p>- $selected_addon (+₱" . $add_ons_prices[$selected_addon] . ")</p>";
            }
        }
        echo "<h3>Total Cost: ₱" . number_format($total, 2) . "</h3>";
        echo "<p>Thank you for your order!</p>";
    } else {
        echo "Please fill in all the required fields.";
    }
}
    ?>
</body>

</html>