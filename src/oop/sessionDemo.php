<?php

require('CustomRequest.php');
require('Session.php');
$request = new CustomRequest();
$session = new Session();

$result = 'No active methods yet';
if ($request->get('active')) {
    switch ($request->get('active')) {
        case 'all':
            $result = $session->all();
            break;
        case 'get':
            $result = $session->get('example');
            break;
        case 'set':
            $result = $session->set('exam', 'passed');
            break;
        case 'has':
            $result = $session->has('exam');
            break;
        case 'remove':
            $result = $session->remove('exam');
            break;
        case 'clear':
            $result = $session->clear();
            break;
    }
}
$sessionArr = [
    'returns all $_SESSION in the associative array. If $only is not empty - return only keys from $only parameter' => 'all',
    'returns $_SESSION value by key and $default if key does not exist' => 'get',
    'sets data to session' => 'set',
    'return true if $key exists in $_SESSION' => 'has',
    'removes session data by name' => 'remove',
    'clears the session' => 'clear',
];
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

    <h3>Session</h3>
    Demonstration:
    <?php
    if (is_array($result)):?>
        <p><?= implode(' ', $result) ?></p>
    <?php
    else : ?>
        <p><?= $result ?></p>
    <?php
    endif ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Description</th>
            <th scope="col">Demonstration</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($sessionArr as $desc => $method): ?>
            <tr>
                <td><?= $desc ?></td>
                <td><a href="requestDemo.php?active=<?= $method ?>"><?= $method ?></a></td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
</main>
</body>
</html>