<html>
<head>
    <title>Exercise #7: Bank account</title>
    <style>
        td {
            border: 1px solid grey;
        }
    </style>
</head>
<body>
<?php

class BankAccount {

    private $_name;
    private $_balance;
    private $_log;

    function __construct($name, $balance) {
        $this->_name = $name;
        $this->_balance = $balance;
        $this->_log = array();
    }

    function get_balance() {
        return $this->_balance;
    }

    private function _add_log($transaction, $amount, $old_balance) {
        $this->_log[] = array(
            "date" => date("Y-m-d H:i:s"),
            "operation" => $transaction,
            "amount" => $amount,
            "old_balance" => $old_balance,
            "new_balance" => $this->_balance
        );
    }

    function deposit($amount) {
        $old_balance = $this->_balance;
        $this->_balance += $amount;
        $this->_add_log("deposit", $amount, $old_balance);
    }

    function withdraw($amount) {
        if ($this->_balance >= $amount) {
            $old_balance = $this->_balance;
            $this->_balance -= $amount;
            $this->_add_log("withdraw", $amount, $old_balance);
        } else {
            echo "Error: insufficient funds!<br>\n";
        }
    }

    function print_log() {
        $attr = array("date", "operation", "amount", "old_balance", "new_balance");
        echo "<table>";
        for ($i = 0; $i < count($this->_log); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($attr); $j++) {
                echo "<td>" . $this->_log[$i][$attr[$j]] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

}

// test
$ba = new BankAccount("my name", 1000);
echo "Balance: " . $ba->get_balance() . "<br>\n";
$ba->deposit(200);
$ba->deposit(300);
echo "Balance: " . $ba->get_balance() . "<br>\n";
$ba->withdraw(500);
echo "Balance: " . $ba->get_balance() . "<br>\n";
$ba->withdraw(2000);

$ba->print_log();


?>
</body>
</html>
