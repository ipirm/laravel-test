<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CalculateSum;

class CalculationController extends Controller
{
    /**
     * @param CalculateSum $request
     * @return string
     */
    public function sum(CalculateSum $request): string
    {
        $first = (string)$request->first;
        $second = (string)$request->second;
        if ($request->first === null) {
            $first = 0;
        }
        if ($request->second === null) {
            $second = 0;
        }
        $result = '';
        $temp = 0;
        $lenFirst = strlen((string)$first);
        $lenSecond = strlen((string)$second);

        $maxLen = max($lenFirst, $lenSecond);

        $first = str_pad((string)$first, $maxLen, '0', STR_PAD_LEFT);
        $second = str_pad((string)$second, $maxLen, '0', STR_PAD_LEFT);

        for ($i = $maxLen - 1; $i >= 0; $i--) {
            $x1 = (int)$first[$i];
            $x2 = (int)$second[$i];

            $sum = $x1 + $x2 + $temp;

            $temp = 0;
            if ($sum > 9) {
                $temp = 1;
                $sum %= 10;
            }

            $result = $sum . $result;
        }

        return $result;
    }
}
