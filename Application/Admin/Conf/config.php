<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_FILTER'        => 'strip_tags,htmlspecialchars',

	// 开启路由
	'URL_ROUTER_ON'   => true, 

	'URL_ROUTE_RULES'=>array(    
			'student/:id\d' => array(__ROOT__.'/Admin/Student/edit/id:1'),    
	),


);