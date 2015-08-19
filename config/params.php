<?php
		use \kartik\datecontrol\Module;
		return [
		    'adminEmail' => 'admin@example.com',
		    "meses"=>["","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
				"mesesL"=>["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
				'dateControlDisplay' => [

		    ],
		    
		    // format settings for saving each date attribute (PHP format example)
		    'dateControlSave' => [

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
