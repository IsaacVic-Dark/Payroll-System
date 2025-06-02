<?php

require __DIR__ . '../../../../routes/auth.php';

?>

<h1>Login</h1>
<form action="" method="POST">
    <input type="text" name="email" id="email" placeholder="Enter email" required>
    <input type="password" name="password" id="password" placeholder="Enter password" required>
    <button type="submit" name="auth" value="login">Login</button>
</form>