<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kredit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kredit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Kegiatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIlai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
