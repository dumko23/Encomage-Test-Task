<?php
// Task 2.
include('source/view/layouts/header.php');
$deliveryMethodsArray = [
    [
        'code' => 'dhl',
        'customer_costs' => [
            22 => '1.000',
            11 => '3.000',
        ]
    ],
    [
        'code' => 'fedex',
        'customer_costs' => [
            22 => '4.000',
            11 => '6.000',
        ]
    ]
];
echo '<pre>';
print_r(sortDeliveryMethods($deliveryMethodsArray));
echo '</pre>';

function sortDeliveryMethods(array $arrayToSort): array
{
    $keys = array_keys($arrayToSort[0]['customer_costs']);
    $sortedArray = array_fill_keys($keys, []);

    foreach ($arrayToSort as $value) {
        $codeKeys[] = $value['code'];
    }

    function getValues(array $array, int $num): array{
        $values = [];
        for ($i = 0; $i < count($array); $i++) {
            foreach ($array[$i]['customer_costs'] as $key => $value) {
                if ($key === $num) {
                    $values[] = $value;
                }
            }
        }
        return $values;
    }

    foreach ($sortedArray as $key => $value){
        $sortedArray[$key] = array_combine($codeKeys, getValues($arrayToSort, $key));
    }

    return $sortedArray;
}
?>
<a href="/">Back To Main</a>
