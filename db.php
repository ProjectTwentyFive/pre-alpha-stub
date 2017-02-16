<?php
// Database Configuration
$dbconn = pg_connect("host=localhost port=5432 dbname=StubDatabase user=postgres password=twentyfive")
    or die('Could not connect: ' . pg_last_error());
?>
