<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-catalogo">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',
            'precio',
            'id_tipo_producto',
            // 'Eliminado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>