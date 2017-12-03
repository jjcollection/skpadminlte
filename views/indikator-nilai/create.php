<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IndikatorNilai */

$this->title = 'Create Indikator Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Indikator Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-nilai-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
