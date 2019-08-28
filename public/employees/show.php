<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 28.8.2019.
 * Time: 12:02
 */
require_once ('../../private/initialize.php');

if (isset($_GET['employees_id']))
{
    $id = $database->real_escape_string($_GET['employees_id']);
}
else
{
    redirect_to('/employees/index.php');
}

$sql = "SELECT employees.*, privileges.privilege_name FROM ";
$sql .= "((employees INNER JOIN employee_privileges ON employees.id = employee_privileges.employee_id) ";
$sql .= "INNER JOIN privileges ON privileges.id = employee_privileges.privilege_id) ";
$sql .= "WHERE employees.id='$id'";
$result = $database->query($sql);
$employees = $result->fetch_assoc();
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
<h1 style="text-align: center">Customer: <?php echo $employees['first_name'] . ' ' . $employees['last_name']; ?></h1>
<div>
    <a href="index.php">Back</a>
</div>
<div>
    <dl>
        <dt>Company:</dt>
        <dd><?php echo $employees['company']; ?></dd>
        <dt>Last Name:</dt>
        <dd><?php echo $employees['first_name']; ?></dd>
        <dt>First Name:</dt>
        <dd><?php echo $employees['last_name']; ?></dd>
        <dt>Email:</dt>
        <dd><?php echo $employees['email_address']; ?></dd>
        <dt>Job:</dt>
        <dd><?php echo $employees['job_title']; ?></dd>
        <dt>Business Phone:</dt>
        <dd><?php echo $employees['business_phone']; ?></dd>
        <dt>Home Phone:</dt>
        <dd><?php echo $employees['home_phone']; ?></dd>
        <dt>Mobile Phone:</dt>
        <dd><?php echo $employees['mobile_phone']; ?></dd>
        <dt>Fax:</dt>
        <dd><?php echo $employees['fax_number']; ?></dd>
        <dt>Address:</dt>
        <dd><?php echo $employees['address']; ?></dd>
        <dt>City:</dt>
        <dd><?php echo $employees['city']; ?></dd>
        <dt>State:</dt>
        <dd><?php echo $employees['state_province']; ?></dd>
        <dt>Zip Code:</dt>
        <dd><?php echo $employees['zip_postal_code']; ?></dd>
        <dt>Country:</dt>
        <dd><?php echo $employees['country_region']; ?></dd>
        <dt>Web Page:</dt>
        <dd><?php echo $employees['web_page']; ?></dd>
        <dt>Notes:</dt>
        <dd><?php echo $employees['notes']; ?></dd>
        <dt>Attachments:</dt>
        <dd><?php echo $employees['attachments']; ?></dd>
        <dt>Privilege Name:</dt>
        <dd><?php echo $employees['privilege_name']; ?></dd>
    </dl>
</div>
</body>
</html>
