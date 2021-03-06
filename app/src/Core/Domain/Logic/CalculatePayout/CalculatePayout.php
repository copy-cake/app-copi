<?php


namespace App\Core\Domain\Logic\CalculatePayout;


final class CalculatePayout implements CalculatePayoutInterface
{
    const THOUSAND_CHARACTERS = 1000;

    /**
     * @param float $salary
     * @param float $lengthOfWriteText
     * @param bool $isGross
     * @return float
     */
    public function myPayment(float $salary, float $lengthOfWriteText): float
    {
        $sumLengthText = $lengthOfWriteText / self::THOUSAND_CHARACTERS;

        return round($salary * $sumLengthText, 2);
    }
}