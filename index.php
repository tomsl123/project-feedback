<?php
// Get the requested URI
$request = $_SERVER['REQUEST_URI'];

// Remove query string if it exists
$request = strtok($request, '?');
// Define routes
switch ($request) {
    case '/':
    case '/home' :
        require __DIR__ . '/views/home.php';
        break;
    case '/edurino/collectClicks' :
        require __DIR__ . '/dataCollection/edurino/collectClicks.php';
        break;
    case '/edurino/collectEvents' :
        require __DIR__ . '/dataCollection/edurino/collectEvents.php';
        break;
    case '/edurino/app' :
        require __DIR__ . '/views/app.php';
        break;
    case '/edurino/qr' :
        incrementCounter($_SERVER['DOCUMENT_ROOT'].'/data/edurino/qr.txt');
        redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley');
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

function incrementCounter($filePath) {
    // Check if the file exists, if not, create it with initial count 0
    if (!file_exists($filePath)) {
        $initialCount = 0;
        file_put_contents($filePath, $initialCount);
    }

    // Read the current count from the file
    $currentCount = file_get_contents($filePath);

    // Increment the count
    $newCount = intval($currentCount) + 1;

    // Write the incremented count back to the file
    file_put_contents($filePath, $newCount);

    // Return the updated count
    return $newCount;
}