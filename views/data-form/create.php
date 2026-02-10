<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DataForm $model */

$this->title = 'Create Data Form';
$this->params['breadcrumbs'][] = ['label' => 'Data Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
