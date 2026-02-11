<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $registrasi app\models\Registrasi */
/* @var $data array */
/* @var $model app\models\DataForm */

$this->title = 'Laporan Pengkajian ' . $registrasi->id_registrasi;
?>

<div class="view-laporan">
    <table class="table">
        <tr>
            <td rowspan="4" style="text-align: center; align-content: center;">
                <h2>PENGKAJIAN KEPERAWATAN <br> POLIKLINIK KEBIDANAN</h2>
            </td>
        </tr>
        <tr>
            <td>Nama Lengkap : </td>
            <td><?= Html::encode($registrasi->nama_pasien) ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir : </td>
            <td><?= Html::encode($registrasi->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td>No. RM : </td>
            <td><?= Html::encode($registrasi->no_rekam_medis) ?></td>
        </tr>
    </table>

    <table style="width: 25%;">
        <tr>
            <td>Tanggal Pengkajian : </td>
            <td><?= Html::encode($registrasi->create_time_at) ?></td>
        </tr>
        <tr>
            <td>Jam Pengkajian : </td>
            <td><?= Html::encode($registrasi->create_time_at) ?></td>
        </tr>
        <tr>
            <td>Poliklinik </td>
            <td><?= Html::encode($registrasi->nama_pasien) ?></td>
        </tr>
    </table>

    <table class="table table-bordered">
        <tr class="">
            <th colspan="2">Pengkajian saat datang (diisi oleh perawat)</th>
        </tr>
    </table>
    
<?= $this->render('_form_isi', [
    'model' => $data,
    'data' => $data, 
    'isView' => true,
]) ?>