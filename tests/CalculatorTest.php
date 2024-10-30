<?php

namespace App\Phpunit;

use PHPUnit\Framework\TestCode;

class CalculatorTest extends TestCode {
    public function test_合計金額() {
        $calculator = new Calculator();
        $this->asserrSame(12, $calculator->add(10,2));
    }
    public function test最初の金額から次の金額を引いた金額() {
        $calculator = new Calculator();
        $this->asserrSame(8, $calculator->sub(10,2));
    }
}
