<?php

use app\models\DataForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $registrasi app\models\Registrasi */
/* @var $data array */
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

     <?= Html::a('Dashboard Registrasi', ['/registrasi/index'], ['class' => 'btn btn-success']) ?></p> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_form_data',
            'id_form',
            'id_registrasi',
            'nama_pasien',
            [
                'attribute' => 'data',
                'format' => 'raw', 
                'value' => function ($model) {
                    $isiData = json_decode($model->data, true);
                    if (!$isiData) return '-';
                    $html = '<table class="table table-bordered table-striped" style="margin-top:10px">';
                    foreach ($isiData as $key => $val) {
                        $label = ucwords(str_replace('_', ' ', $key));
                        $html .=    "<tr>
                                        <th style='width:30%'>$label</th>
                                        <td>$val</td>
                                    </tr>";
                    }
                    $html .= '</table>';
                    return $html;
                }
            ],
            //'is_delete:boolean',
            //'create_by',
            //'update_by',
            //'create_time_at',
            //'update_time_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DataForm $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_form_data' => $model->id_form_data]);
                 }
            ],
        ],
    ]); ?>


</div>
