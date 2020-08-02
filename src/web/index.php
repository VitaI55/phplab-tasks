<?php

require_once './functions.php';

$airports = require './airports.php';

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Filtering
/**
 * Here you need to check $_GET request if it has any filtering
 * and apply filtering by First Airport Name Letter and/or Airport State
 * (see Filtering tasks 1 and 2 below)
 */

// filter by first letter(and if exists - state)
if (isset($_GET['filter_by_first_letter'])) {
    sort($airports);

    foreach ($airports as $index => $airport) {
        if ($airport['name'][0] !== $_GET['filter_by_first_letter']) {
            unset($airports[$index]);
        }
    }
}

if (isset($_GET['filter_by_state'])) {
    sort($airports);

    foreach ($airports as $index => $airport) {
        if ($airport['state'][0] !== $_GET['filter_by_state']) {
            unset($airports[$index]);
        }
    }
}

// Sorting
/**
 * Here you need to check $_GET request if it has sorting key
 * and apply sorting
 * (see Sorting task below)
 */

if (isset($_GET['sort'])) {
    //Used custom array_sort for sorting by a specific key
    $airports = array_sort($airports, $_GET['sort'], SORT_ASC);
}

// Pagination
/**
 * Here you need to check $_GET request if it has pagination key
 * and apply pagination logic
 * (see Pagination task below)
 */
$pageCount = 0;
if (isset($_GET['page'])) {
    $airportCount = count($airports);
    $pageCount = $airportCount / 5;
    if ($airportCount % 5 !== 0) {
        $pageCount++;
    }
    $start = ($currentPage > 1) ? ($currentPage * 5) - 5 : 0;
    $airports = array_slice($airports, $start, 5);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Airports</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">

    <h1 class="mt-5">US Airports</h1>

    <!--
        Filtering task #1
        Replace # in HREF attribute so that link follows to the same page with the filter_by_first_letter key
        i.e. /?filter_by_first_letter=A or /?filter_by_first_letter=B

        Make sure, that the logic below also works:
         - when you apply filter_by_first_letter the page should be equal 1
         - when you apply filter_by_first_letter, than filter_by_state (see Filtering task #2) is not reset
           i.e. if you have filter_by_state set you can additionally use filter_by_first_letter
    -->
    <div class="alert alert-dark">
        Filter by first letter:

        <?php
        foreach (getUniqueFirstLetters(require './airports.php') as $letter): ?>
            <?php
            if (isset($_GET['filter_by_state'])): ?>
                <a href="?page=1&filter_by_state=<?= $_GET['filter_by_state'] ?>&filter_by_first_letter=<?= $letter ?>">
                    <?= $letter ?>
                </a>
            <?php
            else : ?>
                <a href="?page=1&filter_by_first_letter=<?= $letter ?>">
                    <?= $letter ?>
                </a>
            <?php
            endif; ?>
        <?php
        endforeach; ?>

        <a href="index.php" class="float-right">Reset all filters</a>
    </div>

    <!--
        Sorting task
        Replace # in HREF so that link follows to the same page with the sort key with the proper sorting value
        i.e. /?sort=name or /?sort=code etc

        Make sure, that the logic below also works:
         - when you apply sorting pagination and filtering are not reset
           i.e. if you already have /?page=2&filter_by_first_letter=A after applying sorting the url should looks like
           /?page=2&filter_by_first_letter=A&sort=name
    -->
    <table class="table">
        <thead>
        <tr>
            <?php
            if (isset($_GET['filter_by_first_letter']) &&
                isset($_GET['filter_by_state'])): ?>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=name">
                        Name</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=code">
                        Code</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=state">
                        State</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=city">
                        City</a>
                </th>
            <?php
            elseif (isset($_GET['filter_by_first_letter'])) : ?>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=name">Name</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=code">Code</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=state">State</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&sort=city">City</a>
                </th>
            <?php
            elseif (isset($_GET['filter_by_state'])) : ?>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&sort=name">Name</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&sort=code">Code</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&sort=state">State</a>
                </th>
                <th scope="col"><a
                            href="?page=<?= $currentPage ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&sort=city">City</a>
                </th>
            <?php
            else : ?>
                <th scope="col"><a href="?sort=name">Name</a></th>
                <th scope="col"><a href="?sort=code">Code</a></th>
                <th scope="col"><a href="?sort=state">State</a></th>
                <th scope="col"><a href="?sort=city">City</a></th>
            <?php
            endif; ?>
            <th scope="col">Address</th>
            <th scope="col">Timezone</th>
        </tr>
        </thead>
        <tbody>
        <!--
            Filtering task #2
            Replace # in HREF so that link follows to the same page with the filter_by_state key
            i.e. /?filter_by_state=A or /?filter_by_state=B

            Make sure, that the logic below also works:
             - when you apply filter_by_state the page should be equal 1
             - when you apply filter_by_state, than filter_by_first_letter (see Filtering task #1) is not reset
               i.e. if you have filter_by_first_letter set you can additionally use filter_by_state
        -->
        <?php
        foreach ($airports as $airport): ?>
            <tr>
                <td><?= $airport['name'] ?></td>
                <td><?= $airport['code'] ?></td>
                <td>
                    <?php
                    if (isset($_GET['filter_by_first_letter'])): ?>
                        <a href="?page=1&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>&filter_by_state=<?= $airport['state'][0] ?>">
                            <?= $airport['state'] ?>
                        </a>
                    <?php
                    else: ?>
                        <a href="?page=1&filter_by_state=<?= $airport['state'][0] ?>">
                            <?= $airport['state'] ?>
                        </a>
                    <?php
                    endif; ?>
                </td>
                <td><?= $airport['city'] ?></td>
                <td><?= $airport['address'] ?></td>
                <td><?= $airport['timezone'] ?></td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>

    <!--
        Pagination task
        Replace HTML below so that it shows real pages dependently on number of airports after all filters applied

        Make sure, that the logic below also works:
         - show 5 airports per page
         - use page key (i.e. /?page=1)
         - when you apply pagination - all filters and sorting are not reset
    -->
    <nav aria-label="Navigation">
        <ul class="pagination">
            <?php
            if (isset($_GET['filter_by_first_letter']) &&
                isset($_GET['filter_by_state']) && isset($_GET['sort'])): ?>

                <?php
                include('templates/filter_by_first_letter_and_state_with_sort.php') ?>

            <?php
            elseif (isset($_GET['filter_by_first_letter']) &&
                isset($_GET['filter_by_state'])): ?>

                <?php
                include('templates/filter_by_first_letter_and_state.php') ?>

            <?php
            elseif (isset($_GET['filter_by_first_letter'])) : ?>

                <?php
                include('templates/filter_by_first_letter.php') ?>

            <?php
            elseif (isset($_GET['filter_by_state'])): ?>

                <?php
                include('templates/filter_by_state.php') ?>

            <?php
            endif; ?>
        </ul>
    </nav>

</main>
</body>
</html>
