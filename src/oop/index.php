<?php

$requestArr = [
    'head' => 'Request',
    'query' => 'returns $_GET parameter by $key and $default if does not exist',
    'post' => 'returns $_POST parameter by $key and $default if does not exist',
    'get' => 'returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both ate empty - return $default',
    'all' => 'returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter',
    'has' => 'return true if $key exists in $_GET or $_POST',
    'ip' => 'returns users IP',
    'userAgent' => 'returns users browser User Agent',
    'cookies' => 'returns Cookie object',
    'session' => 'returns Session object',
];
$cookieArr = [
    'head' => 'Cookie',
    'all' => 'returns all $_COOKIES in the associative array. If $only is not empty - return only keys from $only parameter',
    'get' => 'returns $_COOKIE value by key and $default if key does not exist',
    'set' => 'sets cookie',
    'has' => 'return true if $key exists in $_COOKIES',
    'remove' => 'removes cookie by name',
];
$sessionArr = [
    'head' => 'Session',
    'all' => 'returns all $_SESSION in the associative array. If $only is not empty - return only keys from $only parameter',
    'get' => 'returns $_SESSION value by key and $default if key does not exist',
    'set' => 'sets data to session',
    'has' => 'return true if $key exists in $_SESSION',
    'remove' => 'removes session data by name',
    'clear' => 'clears the session'
];
$globals = [
    $requestArr,
    $cookieArr,
    $sessionArr
];
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>OOP HW</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">
    <?php
    foreach ($globals

    as $global): ?>
    <hr>
    <h3><?= $global['head'] ?></h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Description</th>
            <th scope="col">Demonstration</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($global as $key => $description): ?>
            <tr>
                <td><?= $description ?></td>
                <td>
                    <?php
                    if ($global['head'] === 'Request') : ?>
                        <a href="requestDemo.php?example=example">
                            <?= $key ?>
                        </a>
                    <?php
                     elseif ($global['head'] === 'Cookie') : ?>
                        <a href="cookieDemo.php">
                            <?= $key ?>
                        </a>
                    <?php
                    elseif ($global['head'] === 'Session') : ?>
                        <a href="sessionDemo.php">
                            <?= $key ?>
                        </a>
                    <?php
                    endif; ?>
                </td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
        <?php
        endforeach; ?>
</main>
</body>
</html>