<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> Desarrollo Urbano </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php $this->head() ?>
		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/favicon/favicon.ico" type="image/x-icon">
		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo \Yii::$app->request->baseUrl; ?>/img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<script src="<?php echo \Yii::$app->request->baseUrl; ?>/js/jquery202.js"></script>
	  <script src="<?php echo \Yii::$app->request->baseUrl; ?>/js/jquery1.10.3.js"></script>
	  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	  <script src="<?php echo \Yii::$app->request->baseUrl; ?>/js/plugin/x-editable/moment.min.js"></script>
	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="menu-on-top pace-done">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?php echo \Yii::$app->request->baseUrl; ?>/img/logo.png" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

				<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
				<div class="ajax-dropdown">

					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							Clientes (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							Proveedores (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							Diferencia (4) </label>
					</div>

					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">

						<div class="alert alert-transparent">
							<h4>Click para seleccionar qué quieres ver</h4>
							Este espacio es para proteger tu privacidad
						</div>

						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					<!-- end notification content -->

					<!-- footer: refresh area -->
					<span> Actualizado en: 15/05/2015 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Cargando..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> 
					</span>
					<!-- end footer -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">Proyectos:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Proyectos recientes <i class="fa fa-angle-down"></i></span>

				<!-- Suggestion: populate this list with fetch and push technique -->
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">Proyecto 1</a>
					</li>
					<li>
						<a href="javascript:void(0);">Proyecto 2</a>
					</li>
					<li>
						<a href="javascript:void(0);">Proyecto 3</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Ver más</a>
					</li>
				</ul>
				<!-- end dropdown-menu-->

			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				
				
				<!-- logout button -->
				<?php if(!\Yii::$app->user->isGuest){ ?>
	        <div class="btn-header pull-right">
	            <span>
	            	<?= Html::a('<i class="fa fa-sign-out"></i>', array("site/logout"), array("title"=>"Cerrar Sesión","data-logout-msg"=>"Mejora la seguridad cerrando el navegado después de haber cerrado sesión")); ?>
	            	
	            </span>
	        </div>
        <?php } ?>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				
				<!-- end search mobile button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				
				
			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?php echo \Yii::$app->request->baseUrl; ?>/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<ul>
					<li><?= Html::a('<i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Trámites</span>', array("tramites/index")); ?></li>
					<li><?= Html::a('<i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Empleados</span>', array("empleado/index")); ?></li>
          <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->username == "dba"){ ?>
		        <li><?= Html::a('<i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Nuevo Usuario</span>', array("site/signup")); ?></li>  
          <?php } ?>
					<?php /*
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Requi</span></a>
						<ul>
							<li>
								<a href="flot.html">Pendientes</a>
							</li>
							<li>
								<a href="morris.html">En Proceso</a>
							</li>
							<li>
								<a href="inline-charts.html">Surtidas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil"></i> <span class="menu-item-parent">Solicitudes</span></a>
						<ul>
							<li>
								<a href="flot.html">Pendientes</a>
							</li>
							<li>
								<a href="morris.html">En Proceso</a>
							</li>
							<li>
								<a href="inline-charts.html">Cotizadas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Coti</span></a>
						<ul>
							<li>
								<a href="flot.html">Pendientes</a>
							</li>
							<li>
								<a href="morris.html">En Proceso</a>
							</li>
							<li>
								<a href="inline-charts.html">Aceptadas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Orden Compra</span></a>
						<ul>
							<li>
								<a href="flot.html">Pendientes</a>
							</li>
							<li>
								<a href="morris.html">En Proceso</a>
							</li>
							<li>
								<a href="inline-charts.html">Surtidas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">Inventario</span></a>
						<ul>
							<li>
								<a href="flot.html">Pendientes</a>
							</li>
							<li>
								<a href="morris.html">En Proceso</a>
							</li>
							<li>
								<a href="inline-charts.html">Surtidas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil"></i> <span class="menu-item-parent">Orden de Entrega</span></a>
						<ul>
							<li>
								<a href="flot.html">Pendientes</a>
							</li>
							<li>
								<a href="morris.html">En Proceso</a>
							</li>
							<li>
								<a href="inline-charts.html">Pagada</a>
							</li>
						</ul>
					</li>
					*/ ?>
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Inicio</li><li>Cuadro de Mando</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
						<article class="col-sm-12">
							 <?= Breadcrumbs::widget([
	                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	            ]) ?>
	           
						</article>
					</div>

				</section>
				<!-- end widget grid -->
				 <?= $content ?>
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Clientes <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Proveedores</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo \Yii::$app->request->baseUrl; ?>/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>	
		<?php $this->endBody() ?>
			<script type="text/javascript">
					$('.tabla').DataTable({
				        "lengthMenu": [[-1,10, 25, 50], ["Todos", 10, 25, 50]],
           
						
				        "language": {
				            "lengthMenu": "Mostrar _MENU_ registros por página",
				            "zeroRecords": "No se encontró coincidencia",
				            "info": "_PAGE_ de _PAGES_",
				            "infoEmpty": "No hay registros",
				            "infoFiltered": "(Filtrar _MAX_ registros totales)",
				            'search':'Buscar',
				        },
				        responsive: {
				            details: {
				                type: 'column'
				            }
				        },
				        columnDefs: [ {
				            className: 'control',
				            orderable: false,
				            targets:   0
				        } ],
				       // order: [ 1, 'asc' ]
				        //'scrollX':true,
			    	});

					$('.tabla2').DataTable({
						"paging":   false,
						"ordering": false,
						"info":     false,
						"bLengthChange" : false,
				        "bFilter" : false,               
						
				        "language": {
				            "lengthMenu": "Mostrar _MENU_ registros por página",
				            "zeroRecords": "No se encontró coincidencia",
				            "info": "_PAGE_ de _PAGES_",
				            "infoEmpty": "No hay registros",
				            "infoFiltered": "(Filtrar _MAX_ registros totales)",
				            'search':'Buscar',
				        },
				        responsive: {
				            details: {
				                type: 'column'
				            }
				        },
				        columnDefs: [ {
				            className: 'control',
				            orderable: false,
				            targets:   0
				        } ],
				       // order: [ 1, 'asc' ]
				        //'scrollX':true,
			    	});
			    	
					
				  $('.select2').select2({
					  placeholder: "Seleccione",
					  allowClear: true
					});		

				  $('.select2tag').select2({
					  placeholder: "Seleccione",
					  allowClear: true,
					  tags: true
					});

					$('.select2min1').select2({
					  minimumInputLength: 1,
					  placeholder: "Seleccione",
					  allowClear: true
					});
					
					$('.select2min4').select2({
					  minimumInputLength: 4,
					  placeholder: "Seleccione",
					  allowClear: true
					});
				  

				  $(function() {
				    $( ".datepicker" ).datepicker();
				  });

				  $(document).ready(function(e) {						
						//Código para la notificaciones
				<?php 
					foreach(Yii::$app->session->getAllFlashes() as $key => $message) { 
						$key = explode("-", $key);
						$key = $key[0];
						if($key == "danger"){ ?>
							$.smallBox({
										title : "<?php echo $message[0]; ?>" ,
										content : "<?php echo $message[1]; ?>",
										color : "#a90329",
										iconSmall : "fa fa-thumbs-down bounce animated",
										timeout : 4000
									});
						<?php } else if($key == "info"){ ?>
							$.smallBox({
										title : "<?php echo $message[0]; ?>",
										content : "<?php echo $message[1]; ?>",
										color : "#57889c",
										iconSmall : "fa fa-thumbs-up bounce animated",
										timeout : 4000
									});						
						<?php } else if($key == "success"){ ?>
							$.smallBox({
										title : "<?php echo $message[0]; ?>",
										content : "<?php echo $message[1]; ?>",
										color : "#739E73",
										iconSmall : "fa fa-thumbs-up bounce animated",
										timeout : 4000
									});		
									
						<?php } else if($key == "warning"){ ?>
							$.smallBox({
										title : "<?php echo $message[0]; ?>",
										content : "<?php echo $message[1]; ?>",
										color : "#c79121",
										iconSmall : "fa fa-thumbs-down bounce animated",
										timeout : 4000
									});				
						<?php } else if($key == "primary"){  ?>
							$.smallBox({
										title : "<?php echo $message[0]; ?>",
										content : "<?php echo $message[1]; ?>",
										color : "#296191",
										iconSmall : "fa fa-thumbs-up bounce animated",
										timeout : 4000
									});														
						<?php }
					} ?>
		     });
		</script>
	</body>

</html>
<?php $this->endPage() ?>