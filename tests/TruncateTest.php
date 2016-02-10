<?php
/**
 * Created by PhpStorm.
 * User: reno.dejong
 * Date: 10-2-2016
 * Time: 20:26
 */
require_once(__DIR__.'/../src/DwdUtils.php');

use test\DwdUtils;

class TruncateTest extends PHPUnit_Framework_TestCase
{

    Public function testExcerptLengthNotLagerThan28(){

    }

    Public function addDataProvider(){
        return [
            ["The quick brown fox jumped over the lazy dog", 25, "...", "The quick brown fox..."],
            ["The quick brown fox jumped over the lazy dog", 5, "...", "The..."],
            ["The quick brown fox jumped over the lazy dog", -1, "...", new Exception()],
            ["The quick brown fox jumped over the lazy dog", 12, "", "The quick"]
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testAddExcerptData($str, $length, $trailing, $expected)
    {
        $result = DwdUtils::excerpt($str,$length, $trailing);
        $this->assertEquals($expected, $result);
    }
}