<?php
namespace Johnliu\JohnCollection;

use Closure;

class JohnCollection
{
    public function mapAndFilter(array $data, Closure $mapClosure, Closure $filterClosure)
    {
        if (config('collection_setting.disable_filter')) {
            return array_map($mapClosure, $data);
        } else {
            return array_filter(array_map($mapClosure, $data), $filterClosure);
        }
    }
}

$a = [1,2,3];
$mapClosure = function ($item) {
    return $item * 2;
};
$filterClosure = function ($item) {
    return $item > 4;
};
