<?php 
/**
 * [StrHide 字符串替换函数]
 * @param [type] $needel [用于替换的字符串]
 * @param [type] $start  [开始位置]
 * @param [type] $end    [结束位置]
 * @param [type] $str    [原始字符串]
 */
 function StrHide($needel,$start,$end,$str)
 {
 	for($i = $start; $i <= $end; $i++){
 		$str[$i] = $needel;
 	}
 	return $str;
 }