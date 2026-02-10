<?php

use app\models\Registrasi;
use app\models\DataForm; // Tambahkan ini untuk cek data
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Registrasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_registrasi',
            'no_registrasi',
            'no_rekam_medis',
            'nama_pasien',
            'tanggal_lahir',
            //'nik',
            //'create_by',
            //'create_time_at',
            //'update_by',
            //'update_time_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {input-medis} {view-laporan}', // Tambah tombol custom
                'buttons' => [
                    // Tombol untuk Input Data Form (Poin 3.3)
                    'input-medis' => function ($url, Registrasi $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-plus"></span> Input',
                            ['data-form/create', 'id_registrasi' => $model->id_registrasi],
                            ['class' => 'btn btn-primary btn-xs', 'title' => 'Input Medis']
                        );
                    },
                    // Tombol untuk Lihat Laporan seperti Lampiran 1
                    'view-laporan' => function ($url, Registrasi $model) {
                        // Cek apakah sudah ada datanya di tabel data_form
                        $exists = DataForm::find()->where(['id_registrasi' => $model->id_registrasi])->one();
                        if ($exists) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-print"></span> Laporan',
                                ['data-form/view-laporan', 'id_registrasi' => $model->id_registrasi],
                                ['class' => 'btn btn-info btn-xs', 'title' => 'Lihat Laporan Lampiran 1']
                            );
                        }
                        return '';
                    },
                ],
                'urlCreator' => function ($action, Registrasi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_registrasi' => $model->id_registrasi]);
                }
            ],
        ],
    ]); ?>

</div>