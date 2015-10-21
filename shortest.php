<?php

/*
 * Author "chianquan"
 */
//$tree1=array(5,2,3);
//$tree2=array(1,2,18,3,5,NULL,2,100,1,NULL,8,NULL,NULL);
$tree1 = array(5, array(2), array(3));
$tree2 = array(
    1,
    array(
	2,
	array(
	    3,
	    array(100),
	    array(1),
	),
	array(
	    5,
	    array(),
	    array(8),
	)
    ),
    array(
	18,
	array(),
	array(2),
    ),
);

function shotest($arr)
{
    $node = isset($arr[0]) ? $arr[0] : NULL;
    $left = isset($arr[1]) ? $arr[1] : NULL;
    $right = isset($arr[2]) ? $arr[2] : NULL;
    if (!$node)
    {
	return array(0, array());
    }
    if ($left)
	list($totalLeft, $numbersLeft) = shotest($left);
    if ($right)
	list($totalRight, $numbersRight) = shotest($right);
    if ($totalLeft <= $totalRight)
    {
	if ($totalLeft <= 0)
	{
	    return array($node, array($node));
	}
	array_unshift($numbersLeft, $node);
	return array($totalLeft + $node, $numbersLeft);
    } else
    {
	array_unshift($numbersRight, $node);
	return array($totalRight + $node, $numbersRight);
    }
}
list($total, $numbers) = shotest($tree2);
echo $total . '  (' . implode(' + ', $numbers) . ')';
