<?php

二分法查找方式 其实是将值构造成了一颗二叉排序数,然后进行查找.这种搜索的好处在于大大的缩短了搜索时间,时间复杂度为logn  小于线性的n

而插值查找则比较灵活,并不是简单的从中间进行的,它是根据我们需要查询的值的渐进进行搜索的.

插值查找的不同点在于每一次并不是从中间切分,而是根据离所求值的距离进行搜索的.

下面是算法：

function interpolationSearch(array $arr, int $needle)
{
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
    // while ($arr[$low] != $arr[$high] && $needle >= $arr[$low] && $needle <= $arr[$high]) {
        $middle = intval($low + ($needle - $arr[$low]) * ($high - $low) / ($arr[$high] - $arr[$low]));

        if ($arr[$middle] < $needle) {
            $low = $middle + 1;
        } elseif ($arr[$middle] > $needle) {
            $high = $middle - 1;
        } else {
            return $middle;
        }
    }

    // if ($needle == $arr[$low]) {
    // 	return $low;
    // }

    return -1;
    
}
