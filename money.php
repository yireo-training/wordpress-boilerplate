<?php

class MoneyAmount
{
    public function __construct($amount)
    {
        if (!is_double($amount)) {
            throw new InvalidArgumentException('Argument 1 should be a double');
        }

        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function addAmount($amount)
    {
        if (!is_double($amount)) {
            throw new InvalidArgumentException('Argument 1 should be a double');
        }

        $this->amount = $this->amount + $amount;
    }
}

$dinerBill = new MoneyAmount(12.00);
$dinerBill->addAmount(3.00);
$dinerBill->addAmount('1test');
echo $dinerBill->getAmount();
