<?php
header('Content-Type: application/json');

// Recibir datos desde main.js
$data    = json_decode(file_get_contents("php://input"), true);
$titulo  = $data['title']   ?? 'Tarea';
$fecha   = $data['date_end'] ?? '';
$horas   = $data['horas']   ?? 0;
$minutos = $data['minutos'] ?? 0;

// Mensaje con horas y minutos
$mensaje = "⚠️ La tarea '$titulo' vence en $horas horas y $minutos minutos (fecha límite: $fecha).";

// Devolver mensaje para mostrarlo en pantalla
echo json_encode(["success" => true, "message" => $mensaje]);

