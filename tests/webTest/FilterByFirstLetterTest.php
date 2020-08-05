<?php

use PHPUnit\Framework\TestCase;

class FilterByFirstLetterTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $letter
     * @param $expected
     */
    public function testPositive($input, $letter, $expected)
    {
        $this->assertEquals($expected, filterByFirstLetter($input, $letter));
    }

    public function positiveDataProvider()
    {
        return [
            [
                [
                    ['name' => "Charleston Airport"],
                    ['name' => "Albuquerque International Airport"],
                    ['name' => "Ontario International Airport"],
                    ['name' => "Boise Airport"]
                ],
                'A',
                [
                    [
                        'name' => "Albuquerque International Airport"
                    ]
                ]
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
                'K',
                [
                    ["name" => "Krimea International Airport"],
                    ["name" => "Kromvel International Airport"]
                ]
            ],
        ];
    }
}