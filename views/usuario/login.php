<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingreso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-form">

    <?php $form = ActiveForm::begin([
        'action'=>['iniciar']
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Iniciar',['btn btn-primary','name'=>'parametro','value'=>'validar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

