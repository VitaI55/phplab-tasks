<?php

/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param int $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute): string
{
    if ($minute < 0 || $minute > 60) {
        throw new InvalidArgumentException();
    }
    if ($minute > 0 && $minute <= 15) {
        return 'first';
    } elseif ($minute > 15 && $minute <= 30) {
        return 'second';
    } elseif ($minute > 30 && $minute <= 45) {
        return 'third';
    }

    return 'fourth';
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param int $year
 * @return bool
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year): bool
{
    if ($year < 1900) {
        throw new InvalidArgumentException();
    }

    return !($year % 4) && ($year % 100 || !($year % 400));
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @return boolean
 * @throws InvalidArgumentException
 * @param string $input
 */
function isSumEqual(string $input): bool
{
    if (strlen($input) !== 6) {
        throw new InvalidArgumentException();
    }
    $firstThreeSum = intval($input[0]) + intval($input[1]) + intval($input[2]);
    $lastThreeSum = intval($input[3]) + intval($input[4]) + intval($input[5]);

    return $firstThreeSum === $lastThreeSum;
}