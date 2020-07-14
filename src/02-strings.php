<?php

/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param string $input
 * @return string
 */
function snakeCaseToCamelCase(string $input): string
{
    $str = str_replace(
        ' ',
        '',
        ucwords(str_replace('_', ' ', $input))
    );

    return lcfirst($str);
}

/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param string $input
 * @return string
 */
function mirrorMultibyteString(string $input): string
{
    $encoding = mb_detect_encoding($input);
    $strArr = explode(' ', $input);
    $reversed = '';
    foreach ($strArr as $str) {
        $length = mb_strlen($str, $encoding);
        while ($length-- > 0) {
            $reversed .= mb_substr($str, $length, 1, $encoding);
        }
        $reversed .= ' ';
    }

    return rtrim($reversed);
}

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param string $noun
 * @return string
 */
function getBrandName(string $noun): string
{
    if (strcasecmp($noun[0], $noun[strlen($noun) - 1]) === 0) {
        $firstPart = ucfirst($noun);
        $secondPart = substr($noun, 1);
        return $firstPart . $secondPart;
    }
    return 'The ' . ucfirst($noun);
}
