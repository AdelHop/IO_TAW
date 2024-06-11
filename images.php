<?php
header('Content-Type: application/json');

// Ścieżka do katalogu z obrazami
$dir = 'path/to/your/images/directory';

// Pobranie listy plików z katalogu
$files = array_diff(scandir($dir), array('.', '..'));

// Dodanie pełnych ścieżek do plików
$filePaths = array();
foreach ($files as $file) {
    $filePaths[] = $dir . '/' . $file;
}

// Zwrócenie listy plików w formacie JSON
echo json_encode($filePaths);
?>
