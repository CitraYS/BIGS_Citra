<style>
    @media print {
        nav.navbar, footer.footer, .no-print {
            display: none !important; 
        }
    }
    input:disabled, select:disabled, textarea:disabled {
        background-color: #ffffff !important; 
    }

    .radio-container input[type="radio"]:disabled + label {
        color: #ff0000;
    }
</style>
<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $registrasi app\models\Registrasi */
/* @var $data array */
/* @var $model app\models\DataForm */
/* @var $formulir app\models\DataForm */
/* @var $petugas app\models\User */

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
            <td style="font-weight: bold;">Nama Lengkap : </td>
            <td><?= Html::encode($registrasi->nama_pasien) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Tanggal Lahir : </td>
            <td><?= Html::encode(date('d-m-Y', strtotime($registrasi->tanggal_lahir))) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">No. RM : </td>
            <td><?= Html::encode($registrasi->no_rekam_medis) ?></td>
        </tr>
    </table>

    <table style="width: 25%;">
        <tr>
            <td style="font-weight: bold;">Tanggal Pengkajian : </td>
            <td><?= Html::encode(date('d-m-Y', strtotime($formulir->create_time_at))) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Jam Pengkajian : </td>
            <td><?= Html::encode(date('H:i', strtotime($formulir->create_time_at))) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Poliklinik </td>
            <td><?= Html::encode($petugas->poliklinik) ?></td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered">
        <tr>
            <th colspan="2" style="background: aqua;">Pengkajian saat datang (diisi oleh perawat)</th>
        </tr>
    </table>

    <?= $this->render('_form_isi', [
        'model' => $data,
        'data' => $data,
        'isView' => true,
    ]) ?>
    <p><br>
    <table class="table table-bordered" style="width: 300px;">
        <tr class="">
            <td colspan="2" style="font-weight: bold;text-align: center;">Petugas</td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Tanggal / Pukul</td>
            <td><?= date('d-m-Y H:i') ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Nama Lengkap</td>
            <td><?= Html::encode($petugas->nama_user) ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Tanda Tangan</td>
            <td></td>
        </tr>
    </table>

    <div class="no-print" style="margin-bottom: 50px;">
            <button type="button" onclick="window.print()" class="btn btn-primary btn-block">Cetak Laporan</button>
    </div>