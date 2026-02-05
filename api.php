<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || empty($data['platform']) || empty($data['url'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'No data received'
    ]);
    exit;
}

echo json_encode([
    'status' => 'ok',
    'platform' => $data['platform'],
    'url' => $data['url'],
    'message' => 'Backend работает, данные получены'
]);
