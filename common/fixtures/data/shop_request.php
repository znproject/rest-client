<?php

return [
	'deps' => [],
	'collection' => [
		[
			'id' => 1,
			'client_id' => 5,
			'price' => 5000,

            'product_data' => '{
                "brand_id": 10,
                "model_id": 11,
                "issue_year": 2006,
                "fuel_type_id": 8
            }',

            'product_type_id' => 6,
            'status_id' => 16,
			'description' => 'левое зеркало',
            'created_at' => '2018-12-09 21:35:38',
		],
		[
			'id' => 2,
			'client_id' => 6,
            'price' => 6000,

            'product_data' => '{
                "brand_id": 13,
                "model_id": 14,
                "issue_year": 2004,
                "fuel_type_id": 7
            }',

			'product_type_id' => 5,
            'status_id' => 16,
			'description' => 'замена масла двигателя',
            'created_at' => '2018-12-09 21:35:38',
		],
	],
];