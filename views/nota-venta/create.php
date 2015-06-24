<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NotaVenta */

$this->title = 'Create Nota Venta';
$this->params['breadcrumbs'][] = ['label' => 'Nota Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nota-venta-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
