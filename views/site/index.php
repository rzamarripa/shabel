<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
use yii\helpers\Html;
use app\models\USUARIOS;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?php if(Yii::$app->user->isGuest) echo "Necesitas Iniciar Sesión"; else echo "Bienvenido " . Yii::$app->user->identity->username; ?>!</h1>
        <p class="lead">Sistema Integral</p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
	            1987. Se funda Proveedora agroindustrial de Sinaloa, S.A. de C.V. con el fin de atender las necesidades agrícola del centro de Sinaloa.

Incursionamos en la industria de los agroquímicos como formuladores en 1989, lo cual fue un gran éxito para nuestra empresa y decidimos establecer sucursales en las distintas regiones agrícolas de México, en la actualidad suman veintitrés.

Nos consolidamos bajo políticas de calidad y desarrollo que hasta hoy día nos rigen, lo cual nos han permitido un crecimiento constante. 
                
            </div>           
        </div>
    </div>
</div>
