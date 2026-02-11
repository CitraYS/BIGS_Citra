<?php

use app\models\Registrasi;
use app\models\DataForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/* @var $registrasi app\models\Registrasi */
/* @var $petugas app\models\User */

$this->title = 'Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Registrasi', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Dashboard Data Form', ['/data-form/index'], ['class' => 'btn btn-warning']) ?>
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
            'nik',
             [
                'label' => 'Petugas',
                'value' => function ($model) {
                    return $model->petugas ? $model->petugas->nama_user : '-';
                },
            ],
            'create_time_at',
            'update_by',
            'update_time_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {input-medis} {view-laporan}', 
                'buttons' => [
                    'input-medis' => function ($url, Registrasi $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-plus"></span> Proses Pengkajian',
                            ['data-form/create', 'id_registrasi' => $model->id_registrasi],
                            ['class' => 'btn btn-primary btn-xs', 'title' => 'Proses Pengkajian']
                        );
                    },
           
                    'view-laporan' => function ($url, Registrasi $model) {
                        $exists = DataForm::find()->where(['id_registrasi' => $model->id_registrasi])->one();
                        if ($exists) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-print"></span> Laporan Pengkajian',
                                ['data-form/view-laporan', 'id_registrasi' => $model->id_registrasi],
                                ['class' => 'btn btn-info btn-xs', 'title' => 'Laporan Pengkajian']
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

