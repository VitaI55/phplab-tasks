<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return [
            [
                [
                    ["name" => "Charleston International Airport"],
                    ["name" => "Albuquerque Sunport International Airport"],
                    ["name" => "Ontario International Airport"],
                    ["name" => "Boise Airport"]
                ],
                ['A', 'B', 'C', 'O']
            ],
            [
                [
                    ["name" => "Krimea International Airport"],
                    ["name" => "Kromvel International Airport"],
                    ["name" => "Amabongs Sunport International Airport"],
                    ["name" => "Numizar International Airport"],
                    ["name" => "Formal Airport"],
                    ["name" => "Zhytomyr Airport"],
                    ["name" => "Nomaran International Airport"],
                ],
                ['A', 'F', 'K', 'N', 'Z']
            ],
        ];
    }
}