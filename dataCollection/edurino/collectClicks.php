<?php

// Define the CSV file path
$clicksFile = $_SERVER['DOCUMENT_ROOT'].'/data/edurino/clicks.csv';

// Get the parameters from the GET request
$sessionId = isset($_GET['sessionId']) ? $_GET['sessionId'] : '';
$sessionTime = isset($_GET['sessionTime']) ? $_GET['sessionTime'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';
$target = isset($_GET['target']) ? $_GET['target'] : '';

// Create the data array
$data = array($sessionId, $sessionTime, $page, $target);

// Check if the file exists
$fileExists = file_exists($clicksFile);

// Open the file in append mode
$file = fopen($clicksFile, 'a');

// If the file does not exist, add the header row
if (!$fileExists) {
    fputcsv($file, array('Session ID', 'Session Time', 'Page', 'Target'));
}

// Append the data to the file
fputcsv($file, $data);

// Close the file
fclose($file);

// Respond with a success message
echo json_encode(array('status' => 'success', 'message' => 'Click data collected successfully.'));
