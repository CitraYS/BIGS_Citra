<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\DataForm $model */

$this->title = $model->id_form_data;
$this->params['breadcrumbs'][] = ['label' => 'Data Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-form-view">
    <?= Html::a('Dashboard Form', ['index'], ['class' => 'btn btn-success']) ?></p> 
    <p>
        <?= Html::a('Update', ['update', 'id_form_data' => $model->id_form_data], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_form_data' => $model->id_form_data], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_form_data',
            'id_form',
            'id_registrasi',
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
            'is_delete:boolean',
            'create_by',
            'update_by',
            'create_time_at',
            'update_time_at',
        ],
    ]) ?>

</div>