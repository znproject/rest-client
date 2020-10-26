<?php

return [
	'deps' => [
	    'shop_point',
        'reference_item',
        'eav_entity',
    ],
	'collection' => [
		[
			'id' => 1,
            'point_id' => 1,
			'category_id' => 4,
            'type_id' => 5,
            'entity_id' => 1,
			'title' => 'Замена масла',
            'price_max' => 5000,
			'status' => 1,
			'created_at' => '2020-09-01 09:14:47',
			'updated_at' => '2020-09-01 09:14:47',
		],
		[
			'id' => 2,
            'point_id' => 1,
			'category_id' => 4,
            'type_id' => 5,
            'entity_id' => 1,
			'title' => 'Замена шаровой',
            'price_max' => 12000,
			'status' => 1,
			'created_at' => '2020-09-01 09:15:33',
			'updated_at' => '2020-09-01 09:15:33',
		],
        [
            'id' => 3,
            'point_id' => 1,
            'category_id' => 3,
            'type_id' => 6,
            'entity_id' => 1,
            'title' => 'Масло моторное "Shell helix"',
            'price_max' => 21000,
            'status' => 1,
            'created_at' => '2020-09-01 09:15:33',
            'updated_at' => '2020-09-01 09:15:33',
        ],
	],
];