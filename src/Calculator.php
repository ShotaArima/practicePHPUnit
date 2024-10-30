<?php

declare(strict_types=1);

namespace App\Phpunit;

class Calculator {
	public function add(int $FirstPrice, int $SecondPrice): int {
		return $FirstPrice + $SecondPrice;
	}

	public function sub(int $FristPrice, int $SecondPrice): int {
		return $FirstPrice - $SecondPrice;
	}

}
