<?php
use yii\helpers\Html;
?>

<div class="print-container" style="padding: 20px; font-family: Arial, sans-serif; border: 1px solid #000;">
    <div class="text-center" style="text-align: center; margin-bottom: 20px;">
        <h3>PENGKAJIAN KEPERAWATAN POLIKLINIK KEBIDANAN</h3>
    </div>

    <table style="width: 100%; margin-bottom: 20px;">
        <tr>
            <td style="width: 20%;">Nama Lengkap</td><td>: <?= $registrasi->nama_pasien ?></td>
            <td style="width: 20%;">No. RM</td><td>: <?= $registrasi->no_rekam_medis ?></td>
        </tr>
        <tr>
            <td>Tgl Lahir</td><td>: <?= date('d-m-Y', strtotime($registrasi->tanggal_lahir)) ?></td>
            <td>Tgl Pengkajian</td><td>: <?= date('d/m/Y', strtotime($model->create_time_at)) ?></td>
        </tr>
    </table>

    <table class="table table-bordered" style="border: 1px solid #000; width: 100%; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>1. Cara Masuk</strong></td>
            <td style="border: 1px solid #000; padding: 5px;"><?= $data['cara_masuk'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>3. Keluhan Utama</strong></td>
            <td style="border: 1px solid #000; padding: 5px;"><?= $data['keluhan_utama'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>4. Pemeriksaan Fisik</strong></td>
            <td style="border: 1px solid #000; padding: 5px;">
                TD: <?= $data['td'] ?> mmHg, Nadi: <?= $data['nadi'] ?> x/mnt, Suhu: <?= $data['suhu'] ?> °C<br>
                BB: <?= $data['bb'] ?> kg, TB: <?= $data['tb'] ?> cm<br>
                <strong>IMT: <?= $data['imt'] ?> (<?= $data['status_gizi'] ?>)</strong>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>15. Skor Resiko Jatuh</strong></td>
            <td style="border: 1px solid #000; padding: 5px;"><?= $data['total_skor_jatuh'] ?></td>
        </tr>
    </table>

    <div style="margin-top: 30px; text-align: right;">
        <p>Pemeriksa,</p>
        <br><br>
        <p>( ____________________ )</p>
    </div>
</div>

<button onclick="window.print()" class="btn btn-primary no-print" style="margin-top: 20px;">Cetak Sekarang</button>

<style>
@media print {
    .no-print { display: none; }
    .print-container { border: none !important; }
}
</style>