<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unsur */

$this->title = $model->IdUnsur;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unsurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unsur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->IdUnsur], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->IdUnsur], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdUnsur',
            'NamaUnsur',
            'Nilai',
            'IdJenisUnsur',
        ],
    ]) ?>

</div>
