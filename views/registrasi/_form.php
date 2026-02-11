<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Registrasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'no_rekam_medis')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->input('date', ['class' => 'form-control','max' => date('d-m-Y') ]) ?>

    <?= $form->field($model, 'nik')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'create_by')->dropDownList([1 => 'Ani', 2 => 'Cici', 3 => 'Budi'  ]) ?>

    <?= $form->field($model, 'create_time_at')->textInput(['value' => $model->isNewRecord ? date('H:i') : $model->create_time_at,'readonly' => true]) ?>

    <?= $form->field($model, 'update_by')->dropDownList([1 => 'Ani', 2 => 'Cici', 3 => 'Budi'  ]) ?>

    <?= $form->field($model, 'update_time_at')->textInput(['value' => $model->isNewRecord ? date('H:i') : $model->create_time_at,'readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
