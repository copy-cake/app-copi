<?php


namespace App\Core\Domain\Logic\CalculatePayout;


interface CalculatePayoutInterface
{
    public function myPayment(float $salary, float $lengthOfWriteText, bool $isGross = true): float;
}