<?php

use app\models\Formulir;
use app\models\Jenisunsur;
use app\models\Unsur;
use app\models\User;
use kartik\icons\Icon;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Formulir */
/* @var $form ActiveForm */
?>



    
       
    <?php $form = ActiveForm::begin(); ?>
 

    <?=
    $form->field(($model->isNewRecord) ? $model : $model->idUnsur, 'IdJenisUnsur')->label('Jenis Unsur')->dropDownList(
            ArrayHelper::map(Jenisunsur::find()->all(), 'IdJenisUnsur', 'NamaUnsur'), [
        'prompt' => 'Pilih',
        'onchange' => '
                    $.post( "../unsur/lists?id=' . '"+$(this).val(), function( data ) {
                        $("select#formulir-idunsur" ).html( data );
                    });',
        'style' => 'height:auto;width:auto;'
    ]);
    ?>

    <?php
    echo $form->field($model, 'IdUnsur')->label('Unsur')->dropDownList(
            ArrayHelper::map(Unsur::find()->all(), 'IdUnsur', 'NamaUnsur'), [
        'prompt' => '--Pilih Jenis Unsur--',
        'onchange' => '
                        $.post("../unsur/nilai?id=' . '"+$(this).val(), function(data) {
                            $("#formulir-nilai" ).val(data);
                        });',
            //'class' =>'col-xs-12',
    ]);
    ?>  
    <?= $form->field($model, 'nilai')->label('Nilai')->textInput(['readonly' => true, 'value' => 0, 'style' => 'width:80px']) ?>
    <?=
    $form->field($model, 'Waktu')->label('Waktu/Bulan')->dropDownList(range(0, 12), [
        'style' => 'width:200px',
        'prompt' => '--Pilih--',
        'onchange' => '
            $.post("../unsur/nilai2?id=' . '"+$(this).val(), function(data) {
                $("#formulir-ak" ).val(data);
            });',
    ])
    ?>
    <?= $form->field($model, 'Kuantitas')->textInput(['maxlength' => true, 'style' => 'width:80px']) ?>
    <?= $form->field($model, 'Output')->dropDownList(Formulir::getOutput(), ['prompt' => '--Pilih--', 'style' => 'width:200px']) ?>
    <?= $form->field($model, 'Biaya')->textInput(['value' => 0, 'style' => 'width:200px']) ?>
    <?= $form->field($model, 'Mutu')->label('Mutu (%)')->dropDownList(range(0, 100), ['prompt' => '--Pilih--', 'style' => 'width:200px']) ?>
    <?= $form->field($model, 'AK')->label('Angka Kredit')->textInput(['readonly' => true, 'style' => 'width:80px']) ?>

    <?php
    $rolename = User::getRoleName();
    if ($rolename == 'kasek') {
        echo Html::submitButton(Icon::show('pencil') . 'Simpan', ['formulir/createks', 'class' => 'btn btn-info']);
    } else {
        echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Simpan') : Yii::t('app', 'Ubah'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    }
    ?>
    <?php ActiveForm::end(); ?>
