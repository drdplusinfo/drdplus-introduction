<?php
$fileName = false;
if ($_SERVER['QUERY_STRING']) {
    $fileName = __DIR__ . '/' . $_SERVER['QUERY_STRING'] . '.html';
    if (file_exists($fileName)) {
        $handle = fopen($fileName, 'rb');
        $firstRow = fgets($handle);
        fclose($handle);
        if (preg_match('~<h1>(?<title>[^<]+)</h1>~i', $firstRow, $matches)) {
            $title = $matches['title'];
        }
    } else {
        $fileName = false;
    }
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
        <li><a href="?poslove">Poslové</a></li>
        <li><a href="?patnactka">Patnáctka</a></li>
        <li><a href="?rozhodnuti">Rozhodnutí</a></li>
    </ul>
    <?php
}
?>
</body>
</html>