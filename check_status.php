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
        if (strpos($error_msg, 'Operation timed out') !== false) {
            $error_msg = 'Connection timed out';
        } elseif (strpos($error_msg, 'SSL certificate problem') !== false) {
            $error_msg = 'SSL certificate error';
        }
        return "<span class='text-red-500'>Error: $error_msg</span>";
    }
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
    curl_close($ch);

    $currentTime = date("Y-m-d H:i:s");
    $responseTime = sprintf("%.2f", $totalTime * 1000);

    $logFile = "logerx.txt";
    $maxLogSize = 1024 * 1024; // 1MB
    if (file_exists($logFile) && filesize($logFile) > $maxLogSize) {
        rename($logFile, $logFile . '-' . date('Y-m-d_H-i-s') . '.txt');
    }
    file_put_contents($logFile, "$currentTime - $url responded with $httpcode and took {$responseTime}ms\n", FILE_APPEND);

    if ($httpcode >= 200 && $httpcode < 300) {
        $status = "<span class='text-green-500'>Website is UP ⬆️</span>";
    } else {
        $status = "<span class='text-red-500'>Website is DOWN ⬇️</span>";
    }

    $status .= "<small class='block text-sm text-gray-400'>Last checked at: $currentTime</small>
                <small class='block text-sm text-gray-400'>Response Time: {$responseTime} ms</small>";

    if ((float)$responseTime >= 100) {
        $status .= "<span class='block text-yellow-400'>🚀</span>";
    }

    return $status;
}
?>

<?php foreach ($websites as $name => $url): ?>
<div class="grid-item">
    <h2 class="text-xl font-semibold mb-2 text-green-500 dark:text-green-300">Status <?php echo $name; ?>:</h2>
    <div class="status">
        <?php echo checkWebsiteStatus($url); ?>
    </div>
</div>
<?php endforeach; ?>
