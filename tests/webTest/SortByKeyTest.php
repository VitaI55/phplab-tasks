<?php

use PHPUnit\Framework\TestCase;

class SortByKeyTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $key
     * @param $expected
     */
    public function testPositive($input, $key, $expected)
    {
        usort($input, sortByKey($key));
        $this->assertEquals($expected, $input);
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
                "name",
                [
                    ["name" => "Albuquerque Sunport International Airport"],
                    ["name" => "Boise Airport"],
                    ["name" => "Charleston International Airport"],
                    ["name" => "Ontario International Airport"]
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
                'name',
                [
                    ["name" => "Amabongs Sunport International Airport"],
                    ["name" => "Formal Airport"],
                    ["name" => "Krimea International Airport"],
                    ["name" => "Kromvel International Airport"],
                    ["name" => "Nomaran International Airport"],
                    ["name" => "Numizar International Airport"],
                    ["name" => "Zhytomyr Airport"],
                ]
            ],
        ];
    }
}