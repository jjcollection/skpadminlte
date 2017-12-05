<?php

use app\models\FormulirMasterSearch;
use kartik\icons\Icon;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel FormulirMasterSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'Formulir Master');
$this->params['breadcrumbs'][] = $this->title;
?>
<br/>
  <div class="panel panel-primary">
      <div class="panel-heading"><?= Html::encode($this->title) ?></div>
      <div class="panel-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
    </div>

<div class="panel panel-warning">
    <div class="panel-heading"><?= Html::a(Yii::t('app', Icon::show('plus') . 'Formulir Baru'), ['create'], ['class' => 'btn btn-success right']) ?></div>
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
                    'contentOptions' => ['class' => 'col-lg-9'],
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>




