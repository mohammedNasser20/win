<?php 


// get the data from users table in database
$sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// calculate the number of users
$seq = 'SELECT * FROM users';
$res = mysqli_query($conn, $seq);
$users_cont = mysqli_fetch_all($res, MYSQLI_ASSOC);


?>