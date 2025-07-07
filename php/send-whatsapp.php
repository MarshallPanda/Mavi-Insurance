<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['chatId']) || !isset($data['message'])) {
  http_response_code(400);
  echo json_encode(['ok' => false, 'error' => 'Faltan parámetros']);
  exit;
}

$token = 'Bearer TU_TOKEN_DE_WAAPI'; // Reemplázalo con tu token real

$payload = json_encode([
  'chatId' => $data['chatId'],
  'message' => $data['message']
]);

$ch = curl_init('https://waapi.app/api/v1/instances/65266/client/action/send-message');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: ' . $token,
  'Accept: application/json',
  'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($http_code);
echo $response;
?>
