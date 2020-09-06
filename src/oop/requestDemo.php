<?php

require('CustomRequest.php');
$request = new CustomRequest();
$result = 'No methods active yet!';
if ($request->get('active')) {
    switch ($request->get('active')) {
        case 'query':
            $result = $request->query('example');
            break;
        case 'post':
            $result = $request->post('example');
            break;
        case 'get':
            $result = $request->get('example');
            break;
        case 'all':
            $result = $request->all();
            break;
        case 'has':
            $result = $request->has('example');
            break;
        case 'ip':
            $result = $request->ip();
            break;
        case 'userAgent':
            $result = $request->userAgent();
            break;
        case 'cookies':
            $result = $request->cookies();
            break;
        case 'session':
            $result = $request->session();
            break;
    }
}
$requestArr = [
    'returns $_GET parameter by $key and $default if does not exist' => 'query',
    'returns $_POST parameter by $key and $default if does not exist' => 'post',
    'returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both ate empty - return $default' => 'get',
    'returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter' => 'all',
    'return true if $key exists in $_GET or $_POST' => 'has',
    'returns users IP' => 'ip',
    'returns users browser User Agent' => 'userAgent',
    'returns Cookie object' => 'cookies',
    'returns Session object' => 'session',
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

    <h3>Request</h3>
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
        foreach ($requestArr as $desc => $method): ?>
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
