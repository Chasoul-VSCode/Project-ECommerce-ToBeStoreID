<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
$_SESSION['kd_seller'] = $data['kd_seller'];
echo json_encode(["message" => "Session saved"]);
