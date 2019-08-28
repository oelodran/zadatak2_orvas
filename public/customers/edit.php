<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 27.8.2019.
 * Time: 13:59
 */
require_once ('../../private/initialize.php');

echo $_GET['customer_id'];

if (!isset($_GET['customer_id']))
{
    //redirect_to(url_for('/customers/index.php'));
}

$id = $_GET['customer_id'];

$sql = "SELECT * FROM customers WHERE id='$id'";
$result = $database->query($sql);
$customer = $result->fetch_assoc();

if (is_post_request())
{
    // sanitized attribute
    $company = $database->real_escape_string($_POST['company']);
    $last_name = $database->real_escape_string($_POST['last_name']);
    $first_name = $database->real_escape_string($_POST['first_name']);
    $email = $database->real_escape_string($_POST['email_address']);
    $job = $database->real_escape_string($_POST['job_title']);
    $business_phone = $database->real_escape_string($_POST['business_phone']);
    $home_phone = $database->real_escape_string($_POST['home_phone']);
    $mobile_phone = $database->real_escape_string($_POST['mobile_phone']);
    $fax = $database->real_escape_string($_POST['fax_number']);
    $city = $database->real_escape_string($_POST['city']);
    $state = $database->real_escape_string($_POST['state_province']);
    $zip_code = $database->real_escape_string($_POST['zip_postal_code']);
    $web_page = $database->real_escape_string($_POST['web_page']);
    $notes = $database->real_escape_string($_POST['notes']);
    $id = $database->real_escape_string($_POST['id']);

    $sql = "UPDATE customers SET ";
    $sql .= "company='$company' ,";
    $sql .= "last_name='$last_name' ,";
    $sql .= "first_name='$first_name' ,";
    $sql .= "email_address='$email' ,";
    $sql .= "job_title='$job' ,";
    $sql .= "business_phone='$business_phone' ,";
    $sql .= "home_phone='$home_phone' ,";
    $sql .= "mobile_phone='$mobile_phone' ,";
    $sql .= "city='$city' ,";
    $sql .= "state_province='$state' ,";
    $sql .= "zip_postal_code='$zip_code' ,";
    $sql .= "web_page='$web_page' ,";
    $sql .= "notes='$notes' ";
    $sql .= "WHERE id='$id' LIMIT 1";

    $result = $database->query($sql);

    if ($result)
    {
        echo "Record update successfully.";
        redirect_to(url_for('/customers/show.php?customer_id=' . u(h($id))));
    }
    else
    {
        echo "Error updating record.";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Customer</title>
</head>
<body>
<h1 style="text-align: center">Customer: <?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></h1>

<div>
    <a href="<?php echo url_for('/customers/index.php'); ?>">Back</a>
</div>

<form action="edit.php" method="post">
    <dl>
        <dt>Company</dt>
        <dd><input type="text" name="company" value="<?php echo $customer['company']; ?>"></dd>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo $customer['last_name']; ?>"></dd>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo $customer['first_name']; ?>"></dd>
        <dt>Email</dt>
        <dd><input type="text" name="email_address" value="<?php echo $customer['email_address']; ?>">
        <dt>Job</dt>
        <dd><input type="text" name="job_title" value="<?php echo $customer['job_title']; ?>"></dd>
        <dt>Business Phone</dt>
        <dd><input type="text" name="business_phone" value="<?php echo $customer['business_phone']; ?>"></dd>
        <dt>Home Phone</dt>
        <dd><input type="text" name="home_phone" value="<?php echo $customer['home_phone']; ?>"></dd>
        <dt>Mobile Phone</dt>
        <dd><input type="text" name="mobile_phone" value="<?php echo $customer['mobile_phone']; ?>"></dd>
        <dt>Fax</dt>
        <dd><input type="text" name="fax_number" value="<?php echo $customer['fax_number']; ?>"></dd>
        <dt>City</dt>
        <dd><input type="text" name="city" value="<?php echo $customer['city']; ?>"></dd>
        <dt>State Province</dt>
        <dd><input type="text" name="state_province" value="<?php echo $customer['state_province']; ?>"></dd>
        <dt>Zip Code</dt>
        <dd><input type="text" name="zip_postal_code" value="<?php echo $customer['zip_postal_code']; ?>"></dd>
        <dt>Web Page</dt>
        <dd><input type="text" name="web_page" value="<?php echo $customer['web_page']; ?>"></dd>
        <dt>Notes
        <dd><textarea rows="4" cols="50" name="notes"><?php echo $customer['notes']; ?></textarea></dd>
    </dl>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div>
        <input style="background-color: blue; color: antiquewhite; width: 100px; height: 50px" type="submit" name="submit" value="Edit">
    </div>
</form>
</body>
</html>
