<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHMORE - DASHboard, MOnitoring, REaltime</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode {
            background-color: #121212;
            color: #FFFFFF;
        }
        .light-mode {
            background-color: #FFFFFF;
            color: #000000;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .grid-item {
            padding: 20px;
            background-color: #F7FAFC;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .dark-mode .grid-item {
            background-color: #2D3748;
        }
        .status {
            margin-top: 10px;
        }
    </style>
</head>
<body class="light-mode flex flex-col min-h-screen">
    <header class="bg-gray-200 dark:bg-gray-800 p-4 text-center">
        <h1 class="text-4xl font-bold text-green-500">DASHMORE - V5</h1>
        <h2 class="text-2xl mt-2">DASHboard, MOnitoring, Realtime bonjEr</h2>
    </header>
    <main class="container flex-grow">
        <div class="grid-container">
            <?php include 'check_status.php'; ?>
        </div>
    </main>
    <footer class="bg-gray-200 dark:bg-gray-800 p-4 text-center">
        &copy; <?php echo date('Y'); ?> by IT t4mpan
    </footer>
    <button id="toggleButton" class="fixed bottom-4 right-4 p-2 bg-blue-500 text-white rounded-full shadow-lg focus:outline-none">Dark Mode</button>
    <script>
        const toggleButton = document.getElementById('toggleButton');
        const body = document.body;

        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            body.classList.toggle('light-mode');
        });
    </script>
</body>
</html>
