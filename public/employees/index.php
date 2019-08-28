<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 28.8.2019.
 * Time: 9:04
 */

require_once ('../../private/initialize.php');

$sql = "SELECT employees.*, privileges.privilege_name FROM ";
$sql .= "((employees INNER JOIN employee_privileges ON employees.id = employee_privileges.employee_id) ";
$sql .= "INNER JOIN privileges ON privileges.id = employee_privileges.privilege_id)";
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
    <title>CRUD Employees</title>
</head>
<body>
<h1 style="text-align: center">Employees</h1>
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
        <th>Fax Number</th>
        <th>Address</th>
        <th>City</th>
        <th>State Province</th>
        <th>Zip Code</th>
        <th>Country</th>
        <th>Web Page</th>
        <th>Notes</th>
        <th>Attachments</th>
        <th>Privilege Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php while ($employees = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $employees['company']?></td>
            <td><?php echo $employees['last_name']?></td>
            <td><?php echo $employees['first_name']?></td>
            <td><?php echo $employees['email_address']?></td>
            <td><?php echo $employees['job_title']?></td>
            <td><?php echo $employees['business_phone']?></td>
            <td><?php echo $employees['home_phone']?></td>
            <td><?php echo $employees['mobile_phone']?></td>
            <td><?php echo $employees['fax_number']?></td>
            <td><?php echo $employees['address']?></td>
            <td><?php echo $employees['city']?></td>
            <td><?php echo $employees['state_province']?></td>
            <td><?php echo $employees['zip_postal_code']?></td>
            <td><?php echo $employees['country_region']?></td>
            <td><?php echo $employees['web_page']?></td>
            <td><?php echo $employees['notes']?></td>
            <td><?php echo $employees['attachments']?></td>
            <td><?php echo $employees['privilege_name']?></td>
            <td><a href="<?php echo url_for('/employees/edit.php?employees_id=' . h(u($employees['id'])));?>">Update</a></td>
            <td><a href="<?php echo url_for('/employees/show.php?employees_id=' . h(u($employees['id'])));?>">Show</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>