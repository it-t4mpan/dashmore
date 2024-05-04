<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHMORE- DASHboard , MOnitoring, REaltime</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Changed to min-height for better handling on small screens */
        }

        .container {
            text-align: center;
            background-color: black;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 600px;
            box-sizing: border-box; /* Ensures padding is included in width */
        }

        h1 {
            color: #7ABA78;
        }

        #status {
            margin-top: 20px;
            font-size: 18px;
            color: #888;
        }

        h2 {
            color: #7ABA78;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                width: 95%; /* Wider container on smaller screens */
                padding: 20px;
            }

            h1, h2 {
                font-size: 16px; /* Smaller font size on smaller screens */
            }

            #status {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>DASHMORE - V3</h1>
        <h2>- DASHboard , MOnitoring, Realtime bonjEr -</h2>
        <p>---------------[X]---------------</p>
        <div id="status">
            <!-- Ensure the 'check_status.php' script is properly set up to display status in a responsive grid -->
            <?php include 'check_status.php'; ?>
        </div>
    </div>
</body>
</html>
