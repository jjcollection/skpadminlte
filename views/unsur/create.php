<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Unsur */

$this->title = Yii::t('app', 'Create Unsur');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unsurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unsur-create">

    <h1><?= Html::encode($this->title) ?></h1>
 <?php echo 'tes'.$model->paket?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
