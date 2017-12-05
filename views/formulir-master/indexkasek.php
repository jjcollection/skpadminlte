<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel yii\models\FormulirMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Formulir Master');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>
<div class="panel panel-success">
    <div class="panel-heading"> <?= Html::a(Yii::t('yii', \kartik\icons\Icon::show('plus') . 'Tambah Formulir Baru'), ['create'], ['class' => 'btn btn-success']) ?></div>
    <div class="panel-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'tanggalBuat',
                    'label' => 'Tanggal Pembuatan',
                    'contentOptions' => ['class' => 'col-lg-4'],
                //'format'=>['decimal',2]
                ],
                [
                    'attribute' => 'idUser0.Nama',
                    'label' => 'Nama',
                    'contentOptions' => ['class' => 'col-lg-5'],
                //'format'=>['decimal',2]
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
