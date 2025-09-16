<?php
declare(strict_types=1);

$input = [
  'title'     => 'PHP 8 en pratique',
  'excerpt'   => '',
  'views'     => '300',
  // 'published' absent
  'author'    => 'Yassine'
];

//========================Normaliser avec ?? et unions===========================

function strOrNull(?string $s): ?string {
    $s = $s !== null ? trim($s) : null;
    return $s === '' ? null : $s;
}

function intOrZero(int|string|null $v): int {
    return max(0, (int)($v ?? 0));
}



$normalized = [
  'title'     => trim((string)($input['title'] ?? 'Sans titre')),
  'excerpt'   => strOrNull($input['excerpt'] ?? null),
  'views'     => intOrZero($input['views'] ?? null),
  'published' => $input['published'] ?? true, // défaut si non défini
  'author'    => trim((string)($input['author'] ?? 'N/A')),
];

print_r($normalized);




/*
Array
(
  [title] => PHP 8 en pratique
  [excerpt] =>
  [views] => 300
  [published] => 1
  [author] => Yassine
)
*/
