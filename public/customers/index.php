<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 27.8.2019.
 * Time: 10:34
 */

require_once ('../../private/initialize.php');

$sql = "SELECT * FROM customers";
$result = $database->query($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>CRUD Customers</title>
</head>
<body>
<h1 style="text-align: center">Customers</h1>
    <table border="solid">
        <tr>
            <th>Company</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Job</th>
            <th>Business Phone</th>
            <th>Home Phone</th>
            <th>Mobile Phone</th>
            <th>Last Name</th>
            <th>Fax Number</th>
            <th>Address</th>
            <th>City</th>
            <th>State Province</th>
            <th>Zip Code</th>
            <th>Country</th>
            <th>Web Page</th>
            <th>Notes</th>
            <th>Attachments</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php while ($customers = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $customers['company']?></td>
            <td><?php echo $customers['last_name']?></td>
            <td><?php echo $customers['first_name']?></td>
            <td><?php echo $customers['email_address']?></td>
            <td><?php echo $customers['job_title']?></td>
            <td><?php echo $customers['business_phone']?></td>
            <td><?php echo $customers['home_phone']?></td>
            <td><?php echo $customers['mobile_phone']?></td>
            <td><?php echo $customers['fax_number']?></td>
            <td><?php echo $customers['address']?></td>
            <td><?php echo $customers['city']?></td>
            <td><?php echo $customers['state_province']?></td>
            <td><?php echo $customers['zip_postal_code']?></td>
            <td><?php echo $customers['country_region']?></td>
            <td><?php echo $customers['web_page']?></td>
            <td><?php echo $customers['notes']?></td>
            <td><?php echo $customers['attachments']?></td>
            <td><a href="<?php echo url_for('/customers/edit.php?customer_id=' . h(u($customers['id'])));?>">Update</a></td>
            <td><a href="<?php echo url_for('/customers/show.php?customer_id=' . h(u($customers['id'])));?>">Show</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>