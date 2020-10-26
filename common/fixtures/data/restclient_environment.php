<?php

return [
	'deps' => [
		'restclient_project',
	],
	'collection' => [
		[
			'id' => '1',
			'project_id' => '1',
			'is_main' => '1',
			'title' => 'Local',
			'url' => 'http://rest.tool/api/v1',
		],
		[
			'id' => '3',
			'project_id' => '3',
			'is_main' => '0',
			'title' => 'Local',
			'url' => 'http://elumiti.cd/api.php/v1',
		],
		[
			'id' => '4',
			'project_id' => '3',
			'is_main' => '0',
			'title' => 'Test',
			'url' => 'https://elumiti.citorleu.kz/api/v1',
		],
	],
];