<?php
/**
 * PHP basics Exercise #6
 */

class Calculator {
    private $_a, $_b;
    const MYCONST = 6;

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

    public static function myconst() {
        return self::MYCONST;
    }
}

echo Calculator::myconst(); // displays 6

// while this also works, you should *not* do it
//$mycalc = new Calculator(12, 6);
//echo $mycalc->myconst();
