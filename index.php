<?php
$fileName = false;
$files = [
    'patnactka' => ['file' => __DIR__ . '/patnactka.html', 'name' => 'Patnáctka'],
    'poslove' => ['file' => __DIR__ . '/poslove.html', 'name' => 'Poslové'],
    'rozhodnuti' => ['file' => __DIR__ . '/rozhodnuti.html', 'name' => 'Rozhodnutí'],
    'myty' => ['file' => __DIR__ . '/myty.html', 'name' => 'Mýty'],
    'hody_a_dovednosti' => ['file' => __DIR__ . '/hody_a_dovednosti.html', 'name' => 'Hody a dovednosti'],
];
if ($_SERVER['QUERY_STRING'] && array_key_exists($_SERVER['QUERY_STRING'], $files)) {
    $fileName = $files[$_SERVER['QUERY_STRING']]['file'];
    $title = $files[$_SERVER['QUERY_STRING']]['name'];
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title><?= $title ?? 'DrD+ historie' ?></title>
</head>
<body>
<?php
if ($fileName) {
    readfile($fileName);
} else {
    ?>
    <ul>
        <?php foreach ($files as $key => $file) { ?>
            <li><a href="?<?= $key ?>"><?= $file['name'] ?></a></li>
        <?php } ?>
    </ul>
    <?php
}
?>
</body>
</html>