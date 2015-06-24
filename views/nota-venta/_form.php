<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\NotaVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nota-venta-form">

    <?php $form = ActiveForm::begin(); 
    $dataProvider=new ActiveDataProvider([
            'query' => \app\models\DetalleNotaVenta::find()->where(['id'=>0]),
        ]);?>
        <?= $form->field($model, 'fecha')->textInput() ?>

        <?= $form->field($model, 'id_empleado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
