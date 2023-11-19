<?php

function connect()
{
    $conn = new mysqli("localhost", "root", "", "eventbook");
    if (!$conn) die("Database is being upgrade!");
    return $conn;
}
$conn = connect();
if (!$conn) die("Under Construction!");

