$(document).ready(function(e) {
	$('.btn-alert-success').click(function() {		
		$.smallBox({
			title : "Se guardó correctamente",
			content : "<i class='fa fa-clock-o'></i> <i>1 segundo atrás...</i>",
			color : "#739E73",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000
		});	
	});
	$('.btn-alert-warning').click(function() {		
		$.smallBox({
			title : "Se guardó correctamente",
			content : "<i class='fa fa-clock-o'></i> <i>1 segundo atrás...</i>",
			color : "#c79121",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000
		});	
	});
	$('.btn-alert-info').click(function() {		
		$.smallBox({
			title : "Se guardó correctamente",
			content : "<i class='fa fa-clock-o'></i> <i>1 segundo atrás...</i>",
			color : "#57889c",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000
		});	
	});
	
	$('.btn-alert-primary').click(function() {		
		$.smallBox({
			title : "Se guardó correctamente",
			content : "<i class='fa fa-clock-o'></i> <i>1 segundo atrás...</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000
		});	
	});
	
	$('.btn-alert-danger').click(function() {		
		$.smallBox({
			title : "Ups, se desactivó o dejó de publicar",
			content : "<i class='fa fa-clock-o'></i> <i>1 segundo atrás...</i>",
			color : "#a90329",
			iconSmall : "fa fa-thumbs-down bounce animated",
			timeout : 4000
		});	
	});
});
/*

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) { ?>
					<?php 
						if($key == "danger"){ 
									Yii::app()->clientScript->registerScript(
									   'myHideEffect',
									   '$.smallBox({
												title : "Ups",
												content : "<i></i> <i>' . $message . '</i>",
												color : "#a90329",
												iconSmall : "fa fa-thumbs-down bounce animated",
												timeout : 4000
											})',
									   CClientScript::POS_READY
									);
						}
			}?>
*/