<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataForm */

$this->title = 'Update Data Pengkajian: ' . $model->id_form_data;

?>
<?= $this->render('_form_isi', [
    'model' => $model,
    'data' => $data,
    'isView' => false, 
]) ?>