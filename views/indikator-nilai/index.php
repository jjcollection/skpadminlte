<?php

use app\models\IndikatorNilaiSearch;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel IndikatorNilaiSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Indikator Nilai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-nilai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= Html::button('Pelayanan', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>

    <?php
    Modal::begin([
        'header' => '<h4>Aspek Pelayanan</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>

    <?= Html::button('Integritas', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'modalButtonIntegritas']) ?>

    <?php
    Modal::begin([
        'header' => '<h4>Aspek Integritas</h4>',
        'id' => 'Integritas',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContentIntegritas'></div>";

    Modal::end();
    ?>
    <?php Pjax::begin(['id' => 'branchesGrid']); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idIndikatorNilai',
            'idFormulirMaster',
            'idIndikator',
            'nilai',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
