<?php

二分法查找方式 其实是将值构造成了一颗二叉排序数,然后进行查找.这种搜索的好处在于大大的缩短了搜索时间,时间复杂度为logn  小于线性的n

而插值查找则比较灵活,并不是简单的从中间进行的,它是根据我们需要查询的值的渐进进行搜索的.

插值查找的不同点在于每一次并不是从中间切分,而是根据离所求值的距离进行搜索的.

基于折半查找代码，我们略微变换等式后得到：
mid= (low+high)/2=low+1/2 * (high−low) 也就是mid等于最低下标low加上最高下标high与low的差的一半。
算法科学家们考虑的就是将这个1/2进行改进，改进为下面的计算方案：
mid = low + (k−a[low]) / (a[high]−a[low]) * (high−low)

将1/2改成了(k−a[low]) / (a[high]−a[low]) 有什么道理呢？假设a[11]={0,1,16,24,35,47,59,62,73,88,99}，low=1，high=10，
则a[low]=1，a[high]=99，如果我们要找的是key=16时，按原来的折半查找的做法，我们需要四次才可以得到结果，
但如果使用新办法，key−a[low]a[high]−a[low]key−a[low]a[high]−a[low]=（16-1）/（99-1）≈0.153，
即mid≈1+0.153*(10-1)=2.377取整得到mid=2，我们只需要两次查找到结果了，显著大大提高了查找的效率。

下面是算法实现：

function interpolationSearch(array $arr, int $needle)
{
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
    // while ($arr[$low] != $arr[$high] && $needle >= $arr[$low] && $needle <= $arr[$high]) {
        $middle = intval($low + ($needle - $arr[$low]) / ($arr[$high] - $arr[$low])  * ($high - $low) );

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
