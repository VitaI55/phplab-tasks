<?php

use PHPUnit\Framework\TestCase;

class FilterByStateTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $state
     * @param $expected
     */
    public function testPositive($input, $state, $expected)
    {
        $this->assertEquals($expected, filterByState($input, $state));
    }

    public function positiveDataProvider()
    {
        return [
            [
                [
                    ["state" => "Georgia"],
                    ["state" => "Texas"],
                    ["state" => "Minnesota"],
                    ["state" => "Virginia"]
                ],
                'Minnesota',
                [
                    [
                        "state" => "Minnesota"
                    ]
                ]
            ],
            [
                [
                    ["state" => "Georgia"],
                    ["state" => "Texas"],
                    ["state" => "Minnesota"],
                    ["state" => "Virginia"],
                    ["state" => "Ohio"],
                    ["state" => "Texas"],
                    ["state" => "Minnesota"],
                    ["state" => "Florida"],
                ],
                'Texas',
                [
                    ["state" => "Texas"],
                    ["state" => "Texas"]
                ]
            ],
        ];
    }
}