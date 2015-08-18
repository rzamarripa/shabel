<?php
		use \kartik\datecontrol\Module;
		return [
		    'adminEmail' => 'admin@example.com',
		    "meses"=>["","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
				"mesesL"=>["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
				'dateControlDisplay' => [
		        Module::FORMAT_DATE => 'php:Y-m-d',
		        Module::FORMAT_TIME => 'HH:mm:ss a',
		        Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s', 
		    ],
		    
		    // format settings for saving each date attribute (PHP format example)
		    'dateControlSave' => [
		        Module::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
		        Module::FORMAT_TIME => 'php:H:i:s',
		        Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
		    ],
		    'maskMoneyOptions' => [
		        'prefix' => 'US$ ',
		        'suffix' => '',
		        'affixesStay' => true,
		        'thousands' => ',',
		        'decimal' => '.',
		        'precision' => 2, 
		        'allowZero' => false,
		        'allowNegative' => false,
		    ]
		];
