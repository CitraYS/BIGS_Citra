<?php

use app\models\DataForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_form_data',
            'id_form',
            'id_registrasi',
            'data',
            'is_delete:boolean',
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
