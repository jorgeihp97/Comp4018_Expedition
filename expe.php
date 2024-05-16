<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expedition Booking</title>
    <link rel="stylesheet" href="expe.css">
</head>
<body>
    <h1>Book Your Expedition</h1>
    <form action="expe.php" method="POST">
        <label for="expeditionType">Expedition Type:</label>
        <select id="expeditionType" name="expeditionType">
            <option value="mountaineering">Mountaineering</option>
            <option value="river rafting">River Rafting</option>
            <option value="desert trail">Desert Trail</option>
            <option value="desert atv">Desert ATV</option>
            <option value="rock climbing">Rock Climbing</option>
            <option value="skydive">Skydive</option>
            <option value="ballooning">Ballooning</option>
        </select>
        <button type="submit">Show Guide</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $expeditionType = $_POST['expeditionType'];
            $guides = array(
                "mountaineering" => "Nirmal Purja, Alpinist",
                "river rafting" => "Nouria Newman, Canoe Slalom WC",
                "desert trail" => "Kraig Adams, Professional Hiker",
                "desert atv" => "Ken Block, Professional Rally Driver",
                "rock climbing" => "Alex Honnold, Free Solo Rock Climber",
                "skydive" => "Miles Daisher, Professional Base Jumper",
                "ballooning" => "Rafael Bridi, Professional Slackliner"
            );
            echo "<p>Guide for " . htmlspecialchars($expeditionType) . ": " . $guides[$expeditionType] . "</p>";
        }
    ?>

</body>
</html>
