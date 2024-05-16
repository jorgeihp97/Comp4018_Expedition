<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php';

header('Content-Type: application/json'); // Ensure the content type is JSON

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expeditionType = $conn->real_escape_string($_POST['expeditionType']);

    // Get guide information based on the expedition type
    switch ($expeditionType) {
        case 'mountaineering':
            $response['guide'] = "Nirmal Purjal, Alpinist";
            break;
        case 'river rafting':
            $response['guide'] = "Nouria Newman, Canoe Slalom WC";
            break;
        case 'desert trail':
            $response['guide'] = "Kraig Adams, Professional Hiker";
            break;
        case 'desert atv':
            $response['guide'] = "Ken Block, Professional Rally Driver";
            break;
        case 'rock climbing':
            $response['guide'] = "Alex Honnold, Free Solo Rockclimber";
            break;
        case 'skydive':
            $response['guide'] = "Miles Daisher, Professional Base Jumper";
            break;
        case 'ballooning':
            $response['guide'] = "Rafael Bridi, Professional Slackliner";
            break;
    }

    // Fetch equipment information based on the expedition type
    $equipmentQuery = "SELECT ItemName FROM Equipment
                       JOIN ExpeditionTypes ON Equipment.ExpeditionTypeID = ExpeditionTypes.TypeID
                       WHERE ExpeditionTypes.TypeName = '$expeditionType'";
    $equipmentResult = $conn->query($equipmentQuery);
    $equipmentList = [];
    while ($row = $equipmentResult->fetch_assoc()) {
        $equipmentList[] = $row['ItemName'];
    }
    $response['equipment'] = implode(", ", $equipmentList);

    // Fetch route information based on the expedition type
    $routeQuery = "SELECT Location, Difficulty FROM Routes
                   JOIN ExpeditionTypes ON Routes.ExpeditionTypeID = ExpeditionTypes.TypeID
                   WHERE ExpeditionTypes.TypeName = '$expeditionType'";
    $routeResult = $conn->query($routeQuery);
    if ($routeResult->num_rows > 0) {
        $row = $routeResult->fetch_assoc();
        $response['route'] = "Location: " . $row['Location'] . ", Difficulty: " . $row['Difficulty'];
    }

    echo json_encode($response);
} else {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}

$conn->close();
?>
