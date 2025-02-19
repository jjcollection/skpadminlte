<?php

use app\models\Formulir;
use app\models\FormulirMaster;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Formulir */

$this->title = Yii::t('app', 'Formulir SKP');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formulirs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-warning">
    <div class="panel-heading">Selamat Datang - Pengukuran SKP</div>
    <div class="panel-body">
        <div class="col-lg-6">
            <?=
            DetailView::widget([
                'model' => $modelUser,
                'attributes' =>
                [
                    [
                        'attribute' => 'idUser0.idGolongan0.KodeGolongan',
                        'label' => 'Golongan',
                        'contentOptions' => ['class' => 'col-lg-8'],
                    // 'format'=>['decimal',2]
                    ],
                    // 'UnitKerja',
                    [
                        'attribute' => 'idUser0.idJabatan.NamaJabatan',
                        'label' => 'Jabatan',
                        'contentOptions' => ['class' => 'col-lg-8'],
                    ],
                    [
                        'attribute' => 'idUser0.UnitKerja',
                        'label' => 'Unit Kerja',
                        'contentOptions' => ['class' => 'col-lg-8'],
                    ],
                ],
            ])
            ?>
        </div>

        <div class="col-lg-6">
            <?=
            DetailView::widget([
                'model' => $modelUser,
                'attributes' =>
                [
                    [
                        'attribute' => 'idUser0.NIP',
                        'label' => 'NIP',
                        'contentOptions' => ['class' => 'col-lg-8'],
                    ],
                    'attributes' =>
                    [
                        'attribute' => 'idUser0.Nama',
                        'label' => 'Nama',
                        'contentOptions' => ['class' => 'col-lg-8'],
                    ],
                    [
                        'attribute' => 'idUser0.Agama',
                        'label' => 'Agama',
                        'contentOptions' => ['class' => 'col-lg-8'],
                    ],
                ],
            ])
            ?>
        </div>
    </div>
</div>
<div class="panel panel-danger">
    <div class="panel-heading">UNSUR UTAMA</div>
    <div class="panel-body">  <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nama Unsur</td>
                    <td class="text-center">Angka Kredit</td>
                    <td class="text-center">Kuantitas</td>
                    <td class="text-center">Output</td>
                    <td class="text-center">Kualitas/Mutu</td>
                    <td class="text-center">Waktu</td>
                    <td class="text-center">Biaya</td>
                </tr>
            </thead>

            <?php
            $i = 1;
            foreach ($formulirUtamaGuru as $form) {
                echo "<tr>";
                echo "<td class='text-center'>" . $i++ . "</td>";
                echo "<td class='text-left'>" . $form['NamaUnsur'] . "</td>";
                echo "<td class='text-center'>" . $form['AK'] . "</td>";
                echo "<td class='text-center'>" . $form['Kuantitas'] . "</td>";
                echo "<td class='text-center'>" . $form['Output'] . "</td>";
                echo "<td class='text-center'>" . $form['Mutu'] . "</td>";
                echo "<td class='text-center'>" . $form['Waktu'] . "</td>";
                echo "<td class='text-center'>" . $form['Biaya'] . "</td>";
                echo "<td class='text-center'>";
                echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['formulir/update', 'id' => $form['IdFormulir']]);
                //echo Html::a('<i class="glyphicon glyphicon-trash"></i>', ['formulir/delete', 'id' => $form['IdFormulir']], ['onclick' => 'return(confirm("apakah mau dihapus?")?true:false);', 'data-method' => 'post']);
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>


<div class="panel panel-warning">
    <div class="panel-heading">UNSUR PENUNJANG</div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nama Unsur</td>
                    <td class="text-center">Angka Kredit</td>
                    <td class="text-center">Kuantitas</td>
                    <td class="text-center">Output</td>
                    <td class="text-center">Kualitas/Mutu</td>
                    <td class="text-center">Waktu</td>
                    <td class="text-center">Biaya</td>

                </tr>
            </thead>
            <?php
            $i = 1;
            foreach ($formulirPenunjangGuru as $form) {
                echo "<tr>";
                echo "<td class='text-center'>" . $i++ . "</td>";
                echo "<td class='text-left'>" . $form['NamaUnsur'] . "</td>";
                echo "<td class='text-center'>" . $form['AK'] . "</td>";
                echo "<td class='text-center'>" . $form['Kuantitas'] . "</td>";
                echo "<td class='text-center'>" . $form['Output'] . "</td>";
                echo "<td class='text-center'>" . $form['Mutu'] . "</td>";
                echo "<td class='text-center'>" . $form['Waktu'] . "</td>";
                echo "<td class='text-center'>" . $form['Biaya'] . "</td>";
                echo "<td class='text-center'>";
                echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['formulir/update', 'id' => $form['IdFormulir']]);
                //echo  Html::a('<i class="glyphicon glyphicon-trash"></i>', ['formulir/delete', 'id' => $form['IdFormulir']], ['onclick' => 'return(confirm("apakah mau dihapus?")?true:false);', 'data-method' => 'post']);
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">PENILAIAN KEPALA SEKOLAH</div>
    <div class="panel-body">
        <p>
            <?php
            if (Yii::$app->session['idFB'] != "") {
                $rata = FormulirMaster::akrata(Yii::$app->session['idFB'], 'FG');
                if ($rata == "") {
                    $rata = 0;
                }
                $rataUkur = FormulirMaster::akrata(Yii::$app->session['idFB'], 'FK');
                if ($rata == "") {
                    $rata = 0;
                }
                $idKriteria = FormulirMaster::pilihid(Yii::$app->session['idFB']);
                $namaKriteria = FormulirMaster::namakriteria($idKriteria);
                $totalrata = "Jumlah Angka Kredit Sebelumnya : $rata setelah diubah : ";
                echo "<h4>Kriteria Pilihan adalah : <strong>$namaKriteria</strong>, ";
                echo $totalrata;
                echo $jml != '' ? 0 : $rataUkur;
                echo "</h4>";
            } else {
                $pilihanKriteria = "Kriteria Belum Dipilih";
            }
            echo $content;
            ?>
        </p>
    </div>
</div>
<div class="panel panel-warning">
    <div class="panel-heading">UNSUR UTAMA</div>
    <div class="panel-body">  <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nama Unsur</td>
                    <td class="text-center">Angka Kredit</td>
                    <td class="text-center">Kuantitas</td>
                    <td class="text-center">Output</td>
                    <td class="text-center">Kualitas/Mutu</td>
                    <td class="text-center">Waktu</td>
                    <td class="text-center">Biaya</td>
                    <td class="text-center">Aksis</td>
                </tr>
            </thead>

            <?php
            $i = 1;
            foreach ($formulirUtama as $form) {
                echo "<tr>";
                echo "<td class='text-center'>" . $i++ . "</td>";
                echo "<td class='text-left'>" . $form['NamaUnsur'] . "</td>";
                echo "<td class='text-center'>" . $form['AK'] . "</td>";
                echo "<td class='text-center'>" . $form['Kuantitas'] . "</td>";
                echo "<td class='text-center'>" . $form['Output'] . "</td>";
                echo "<td class='text-center'>" . $form['Mutu'] . "</td>";
                echo "<td class='text-center'>" . $form['Waktu'] . "</td>";
                echo "<td class='text-center'>" . $form['Biaya'] . "</td>";
                echo "<td class='text-center'>";
                //echo Html::a('<i class="glyphicon glyphicon-pencil"></i>',['formulir/update','id'=>$form['IdFormulir']]);
                echo Html::a('<i class="glyphicon glyphicon-trash"></i>', ['formulir/delete', 'id' => $form['IdFormulir']], ['onclick' => 'return(confirm("apakah mau dihapus?")?true:false);', 'data-method' => 'post']);
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">UNSUR PENUNJANG</div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nama Unsur</td>
                    <td class="text-center">Angka Kredit</td>
                    <td class="text-center">Kuantitas</td>
                    <td class="text-center">Output</td>
                    <td class="text-center">Kualitas/Mutu</td>
                    <td class="text-center">Waktu</td>
                    <td class="text-center">Biaya</td>
                    <td class="text-center">Aksi</td>
                </tr>
            </thead>
            <?php
            $i = 1;
            foreach ($formulirPenunjang as $form) {
                echo "<tr>";
                echo "<td class='text-center'>" . $i++ . "</td>";
                echo "<td class='text-left'>" . $form['NamaUnsur'] . "</td>";
                echo "<td class='text-center'>" . $form['AK'] . "</td>";
                echo "<td class='text-center'>" . $form['Kuantitas'] . "</td>";
                echo "<td class='text-center'>" . $form['Output'] . "</td>";
                echo "<td class='text-center'>" . $form['Mutu'] . "</td>";
                echo "<td class='text-center'>" . $form['Waktu'] . "</td>";
                echo "<td class='text-center'>" . $form['Biaya'] . "</td>";
                echo "<td class='text-center'>";
                echo Html::a('<i class="glyphicon glyphicon-trash"></i>', ['formulir/delete', 'id' => $form['IdFormulir']], ['onclick' => 'return(confirm("apakah mau dihapus?")?true:false);', 'data-method' => 'post']);
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

