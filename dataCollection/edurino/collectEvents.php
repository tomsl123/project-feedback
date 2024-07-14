<?php
// Define the CSV file path
$eventsFile = $_SERVER['DOCUMENT_ROOT'].'/data/edurino/events.csv';

// Get the parameters from the GET request
$sessionId = isset($_GET['sessionId']) ? $_GET['sessionId'] : '';
$sessionTime = isset($_GET['sessionTime']) ? $_GET['sessionTime'] : '';
$eventName = isset($_GET['eventName']) ? $_GET['eventName'] : '';
$associatedValue = isset($_GET['associatedValue']) ? $_GET['associatedValue'] : '';

// Create the data array
$data = array($sessionId, $sessionTime, $eventName, $associatedValue);

// Check if the file exists
$fileExists = file_exists($eventsFile);

// Open the file in append mode
$file = fopen($eventsFile, 'a');

// If the file does not exist, add the header row
if (!$fileExists) {
    fputcsv($file, array('Session ID', 'Session Time', 'Event Name', 'Associated Value'));
}

// Append the data to the file
fputcsv($file, $data);

// Close the file
fclose($file);

// Respond with a success message
echo json_encode(array('status' => 'success', 'message' => 'Event data collected successfully.'));
