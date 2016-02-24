<?php
/**
 * PHP basics Exercise #6
 */

class Calculator {
    private $_a, $_b;

    public function __construct($a, $b) {
        $this->_a = $a;
        $this->_b = $b;
    }

    public function add() {
        return $this->_a + $this->_b;
    }

    public function subtract() {
        return $this->_a - $this->_b;
    }

    public function multiply() {
        return $this->_a * $this->_b;
    }

    public function divide() {
        return $this->_a / $this->_b;
    }
}

$mycalc = new Calculator(12, 6);
echo $mycalc->add() . "<br>"; // Displays 18
echo $mycalc->multiply() . "<br>"; // Displays 72
echo $mycalc->subtract() . "<br>"; // Displays 6
echo $mycalc->divide() . "<br>"; // Displays 2
