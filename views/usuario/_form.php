<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Grupo')->textInput() ?>

    <?= $form->field($model, 'Cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Contrasena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Id_Empleado')->textInput() ?>

    <?= $form->field($model, 'Eliminado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
