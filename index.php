<?php

if (isset($_GET['download'])) {

    $webhookurl = "https://discordapp.com/api/webhooks/1383526564725002281/VKUmmprjKcnQFYdFf4DEbBu36JZm5GgoaSwc7MaFbS6wfZlbFgPffAKsSADRRIFd4zYG";
    $json_data = json_encode([
        "content" => "Пользователь скачал Loader.zip",
    ]);
    $ch = curl_init($webhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);

    $file = 'Loader.zip';

    if (!file_exists($file)) {
        http_response_code(404);
        echo "Файл не найден.";
        exit;
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Loader Download</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap');
  body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Orbitron', sans-serif;
    color: #eee;
  }
  .container {
    text-align: center;
  }
  h1 {
    font-size: 3rem;
    margin-bottom: 40px;
    letter-spacing: 3px;
    color: #00ffc8;
    text-shadow: 0 0 8px #00ffc8;
  }
  a.download-button {
    display: inline-block;
    background: #00ffc8;
    color: #0f0f0f;
    font-size: 1.8rem;
    font-weight: 700;
    padding: 20px 60px;
    border-radius: 50px;
    text-decoration: none;
    box-shadow:
      0 0 10px #00ffc8,
      0 0 40px #00ffc8,
      0 0 80px #00ffc8;
    transition: all 0.3s ease;
    user-select: none;
    letter-spacing: 2px;
  }
  a.download-button:hover {
    background: #00e6b8;
    box-shadow:
      0 0 15px #00e6b8,
      0 0 50px #00e6b8,
      0 0 100px #00e6b8;
    transform: scale(1.05);
  }
  a.download-button:active {
    transform: scale(0.95);
    box-shadow: none;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>DOWNLOAD LOADER</h1>
    <a href="?download=1" class="download-button">DOWNLOAD</a>
  </div>
</body>
</html>
