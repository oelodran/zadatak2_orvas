<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 27.8.2019.
 * Time: 11:18
 */
require_once ('../../private/initialize.php');

if (isset($_GET['customer_id']))
{
    $id = $database->real_escape_string($_GET['customer_id']);
}
else
{
    redirect_to('/customers/index.php');
}

$sql = "SELECT * FROM customers WHERE id='$id'";
$result = $database->query($sql);
$customer = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Customer</title>
</head>
<body>
    <h1 style="text-align: center">Customer: <?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></h1>
<div>
    <a href="index.php">Back</a>
</div>
<div>
    <dl>
        <dt>Company:</dt>
        <dd><?php echo $customer['company']; ?></dd>
        <dt>Last Name:</dt>
        <dd><?php echo $customer['first_name']; ?></dd>
        <dt>First Name:</dt>
        <dd><?php echo $customer['last_name']; ?></dd>
        <dt>Email:</dt>
        <dd><?php echo $customer['email_address']; ?></dd>
        <dt>Job:</dt>
        <dd><?php echo $customer['job_title']; ?></dd>
        <dt>Business Phone:</dt>
        <dd><?php echo $customer['business_phone']; ?></dd>
        <dt>Home Phone:</dt>
        <dd><?php echo $customer['home_phone']; ?></dd>
        <dt>Mobile Phone:</dt>
        <dd><?php echo $customer['mobile_phone']; ?></dd>
        <dt>Fax:</dt>
        <dd><?php echo $customer['fax_number']; ?></dd>
        <dt>Address:</dt>
        <dd><?php echo $customer['address']; ?></dd>
        <dt>City:</dt>
        <dd><?php echo $customer['city']; ?></dd>
        <dt>State:</dt>
        <dd><?php echo $customer['state_province']; ?></dd>
        <dt>Zip Code:</dt>
        <dd><?php echo $customer['zip_postal_code']; ?></dd>
        <dt>Country:</dt>
        <dd><?php echo $customer['country_region']; ?></dd>
        <dt>Web Page:</dt>
        <dd><?php echo $customer['web_page']; ?></dd>
        <dt>Notes:</dt>
        <dd><?php echo $customer['notes']; ?></dd>
        <dt>Attachments:</dt>
        <dd><?php echo $customer['attachments']; ?></dd>
    </dl>
</div>
</body>
</html>
