<?php

if (! function_exists('calculateElementSum')) {
    
    function calculateElementSum($data) {
        $total_sum = [];
        
        foreach ($data as $item) {
            $values = $item['values'];
            foreach ($values as $index => $value) {
                // If the index in $total_sum doesn't exist yet, initialize it to 0
                if (!isset($total_sum[$index])) {
                    $total_sum[$index] = 0;
                }
                // Add the current value to the corresponding element
                $total_sum[$index] += $value;
            }
        }
        
        return $total_sum;
    }
}


if (! function_exists('divideArraysElementByElement')) {

    function divideArraysElementByElement(array $array1, array $array2): array
    {
        // Check if arrays have the same number of elements
        if (count($array1) !== count($array2)) {
            throw new InvalidArgumentException("Arrays must have the same number of elements.");
        }

        $result = [];
        $count = count($array1);

        for ($i = 0; $i < $count; $i++) {
            // Handle division by zero
            if ($array2[$i] === 0) {
                $result[$i] = NAN; // Not a Number for division by zero
                // Or you could throw an exception, or assign a specific value like 0
                // throw new DivisionByZeroError("Division by zero at index $i.");
            } else {
                $result[$i] = $array1[$i] / $array2[$i];
            }
        }

        return $result;
    }

}

// namespace App\Helpers;

// class MyHelper
// {
//     public static function calculateElementSum($data) {
//         $totalSum = [];
        
//         foreach ($data as $item) {
//             $values = $item['values'];
//             foreach ($values as $index => $value) {
//                 // If the index in $total_sum doesn't exist yet, initialize it to 0
//                 if (!isset($totalSum[$index])) {
//                     $totalSum[$index] = 0;
//                 }
//                 // Add the current value to the corresponding element
//                 $totalSum[$index] += $value;
//             }
//         }
        
//         return $totalSum;
//     }


//      public static function divideArraysElementByElement(array $array1, array $array2): array
//     {
//         // Check if arrays have the same number of elements
//         if (count($array1) !== count($array2)) {
//             throw new InvalidArgumentException("Arrays must have the same number of elements.");
//         }

//         $result = [];
//         $count = count($array1);

//         for ($i = 0; $i < $count; $i++) {
//             // Handle division by zero
//             if ($array2[$i] === 0) {
//                 $result[$i] = NAN; // Not a Number for division by zero
//                 // Or you could throw an exception, or assign a specific value like 0
//                 // throw new DivisionByZeroError("Division by zero at index $i.");
//             } else {
//                 $result[$i] = $array1[$i] / $array2[$i];
//             }
//         }

//         return $result;
//     }
// }


