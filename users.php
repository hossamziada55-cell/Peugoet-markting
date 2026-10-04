<?php
session_start();
include "db.php";

if($_SESSION['role'] != 'admin'){
    die("🚫");
}

$users = $conn->query("SELECT * FROM users");
?>

<link rel="stylesheet" href="admin.css">

<h2>👤 Users</h2>



<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
</tr>

<?php while($u = $users->fetch_assoc()){ ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['username'] ?></td>
<td><?= $u['email'] ?></td>
</tr>
<?php } ?>

</table>