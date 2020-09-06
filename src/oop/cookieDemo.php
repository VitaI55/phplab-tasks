<?php
require('CustomRequest.php');
require ('Cookies.php');
$request = new CustomRequest();
$cookie = new Cookies();
$result = 'No active methods yet';
if ($request->get('active')) {
    switch ($request->get('active')) {
        case 'all':
            $result = $cookie->all();
            break;
        case 'get':
            $result = $cookie->get('example');
            break;
        case 'set':
            $result = $cookie->set('exam','passed');
            break;
        case 'has':
            $result = $cookie->has('exam');
            break;
        case 'remove':
            $result = $cookie->remove('exam');
            break;
    }
}
$cookieArr = [
    'returns all $_COOKIES in the associative array. If $only is not empty - return only keys from $only parameter'=> 'all',
    'returns $_COOKIE value by key and $default if key does not exist'=> 'get',
    'sets cookie'=> 'set',
    'return true if $key exists in $_COOKIES'=> 'has',
    'removes cookie by name'=> 'remove',
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

    <h3>Cookie</h3>
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
        foreach ($cookieArr as $desc => $method): ?>
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