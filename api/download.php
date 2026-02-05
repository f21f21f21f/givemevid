<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['url']) || empty($data['platform'])) {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid request'
    ]);
    exit;
}

$url = trim($data['url']);
$platform = $data['platform'];

$downloadsDir = __DIR__ . '/../downloads/';
if (!is_dir($downloadsDir)) {
    mkdir($downloadsDir, 0777, true);
}

$fileName = uniqid($platform . '_') . '.mp4';
$filePath = $downloadsDir . $fileName;

/**
 * ПОКА ДЕЛАЕМ ЗАГЛУШКУ С РЕАЛЬНЫМ ФАЙЛОМ
 * дальше заменим на yt-dlp
 */
file_put_contents($filePath, "TEST FILE FROM $platform");

echo json_encode([
    'success' => true,
    'message' => 'File processed',
    'file' => '/downloads/' . $fileName
]);
