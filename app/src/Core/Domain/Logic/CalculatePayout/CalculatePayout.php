<?php


namespace App\Core\Domain\Logic\CalculatePayout;


final class CalculatePayout implements CalculatePayoutInterface
{
    const THOUSAND_CHARACTERS = 1000;
    const ACTUAL_TAX = 0.132;

    /**
     * @param float $salary
     * @param float $lengthOfWriteText
     * @param bool $isGross
     * @return float
     */
    public function myPayment(float $salary, float $lengthOfWriteText, bool $isGross = true): float
    {
        $sumLengthText = $lengthOfWriteText / self::THOUSAND_CHARACTERS;
        $salaryOnGross = $salary;

        if (!$isGross) {

            $salaryOnGross = $salary + ($salary * self::ACTUAL_TAX);
        }

        return round($salaryOnGross * $sumLengthText, 2);
    }
}