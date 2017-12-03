<?php

use app\models\Indikator;
use app\models\IndikatorNilai;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model IndikatorNilai */
/* @var $form ActiveForm */
?>

<div class="indikator-nilai-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <h3>Penilaian Indkator</h3>

    <?= $form->field($model, 'idFormulirMaster')->textInput() ?>
    <?=
    $form->field($model, 'idIndikator')->label('Indikator')->dropDownList(
            ArrayHelper::map(Indikator::findAll(['idAspek'=>1]), 'idIndikator', 'namaIndikator'), [
        'prompt' => '--Pilih--',
    ]);
    ?>
    <?= $form->field($model, 'nilai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e) 
{
   var \$form = $(this);
    $.post(
        \$form.attr("action"), // serialize Yii2 form
        \$form.serialize()
    )
        .done(function(result) {
        if(result == 1)
        {
            $(\$form).trigger("reset");
            $.pjax.reload({container:'#branchesGrid'});
        }else
        {        
            $("#message").html(result);
        }
        }).fail(function() 
        {
            console.log("server error");
        });
    return false;
});

JS;
$this->registerJs($script);
?>


