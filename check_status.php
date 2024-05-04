<?php
date_default_timezone_set('Asia/Jakarta');  // Set timezone to Jakarta

$websites = [
    "SIKDA Generik" => "https://e-sikda.kemkes.go.id/3215/",
    "BPJS Kesehatan Skrining" => "https://webskrining.bpjs-kesehatan.go.id/",
    "PCare BPJS Kesehatan" => "https://pcarejkn.bpjs-kesehatan.go.id",
    "JAKARTA" => "https://jakarta.go.id/",
    "JAKSEHAT" => "https://jaksehat.jakarta.go.id/",
    "Web pcare Reset Pass" => "https://registrasi.bpjs-kesehatan.go.id"
];

function checkWebsiteStatus($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        // Handle specific error cases
        if (strpos($error_msg, 'Operation timed out') !== false) {
            $error_msg = 'Connection timed out';
        } elseif (strpos($error_msg, 'SSL certificate problem') !== false) {
            $error_msg = 'SSL certificate error';
        }
        return "<span style='color: red;'>Error: $error_msg</span>";
    }
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
    curl_close($ch);

    $currentTime = date("Y-m-d H:i:s");
    $responseTime = sprintf("%.2f", $totalTime * 1000);

    // Logging with log size management (1MB limit)
    $logFile = "logerx.txt";
    $maxLogSize = 1024 * 1024; // 1MB
    if (file_exists($logFile) && filesize($logFile) > $maxLogSize) {
        rename($logFile, $logFile . '-' . date('Y-m-d_H-i-s') . '.txt');
    }
    file_put_contents($logFile, "$currentTime - $url responded with $httpcode and took {$responseTime}ms\n", FILE_APPEND);

    if ($httpcode >= 200 && $httpcode < 300) {
        $status = "<span style='color: green;'>Website is UP â¬†ï¸</span>";
    } else {
        $status = "<span style='color: red;'>Website is DOWN â¬‡ï¸</span>";
    }

    $status .= " <small>Last checked at: $currentTime</small><br><small>Response Time: {$responseTime} ms</small>";

    // Add sad emoticon if response time exceeds 100ms
    if ((float)$responseTime >= 100) {
        $status .= " ðŸš€";
    }

    return $status;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Monitoring</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .grid-item {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        @media (max-width: 1024px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="grid-container">
    <?php foreach ($websites as $name => $url): ?>
    <div class="grid-item">
        <h2>Status <?php echo $name; ?>:</h2>
        <?php echo checkWebsiteStatus($url); ?>
    </div>
    <?php endforeach; ?>
</div>

<footer>
    &copy; <?php echo date('Y'); ?> by IT t4mpan
</footer>

</body>
</html>
