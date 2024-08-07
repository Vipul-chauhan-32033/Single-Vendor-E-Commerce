<?php

include "connection.php";

$stmt = $conn->prepare("SELECT * FROM slider ");

$stmt->execute();

$sliders = $stmt->get_result();

?>