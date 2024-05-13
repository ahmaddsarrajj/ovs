<?php
// Define variables to send to Python script
$var1 = escapeshellarg("value1");
$var2 = escapeshellarg("value2");
$var3 = escapeshellarg("value3");

// Construct the command to execute the Python script with arguments
$command = "py ./test.py $var1 $var2 $var3";

// Execute the command and capture the output
$output = shell_exec($command);

// Display the output
echo $output;
?>