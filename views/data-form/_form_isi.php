<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataForm */
/* @var $data array */
/* @var $isView bool */

// Fungsi pembantu agar tidak error "undefined index" jika data belum diisi
if (!function_exists('val')) {
    function val($array, $key, $default = '')
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}
?>

<div class="data-form-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::hiddenInput('DataForm[id_registrasi]', $model->id_registrasi ?? val($data, 'id_registrasi') ?? Yii::$app->request->get('id_registrasi')) ?>
    <div class="panel panel-primary">
    
    <?php if (!$isView): ?>
        <hr>
        <div class="panel-heading" style="text-align: center;">
            <h1>PENGKAJIAN KEPERAWATAN POLIKLINIK KEBIDANAN</h1>
        </div>
    <?php endif; ?>    
        <hr>
        <div class="panel-body">

            <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                <label style="min-width: 120px; font-weight: bold;">1. Cara Masuk : </label>
                <div class="radio-container">
                    <?= Html::radioList('DataForm[cara_masuk]', val($data, 'cara_masuk'), [
                        'Jalan tanpa bantuan' => 'Jalan tanpa bantuan',
                        'Kursi tanpa bantuan' => 'Kursi tanpa bantuan',
                        'Tempat tidur dorong' => 'Tempat tidur dorong',
                        'Lain-lain' => 'Lain-lain'
                    ], ['itemOptions' => ['disabled' => $isView]]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label style="min-width: 120px; font-weight: bold;">2. Anamnesis</label>
                    <?= Html::dropDownList('DataForm[anamnesis_tipe]', val($data, 'anamnesis_tipe'), [
                        'Autoanamnesis' => 'Autoanamnesis',
                        'Alonemnesis' => 'Alonemnesis'
                    ], ['class' => 'form-control', 'id' => 'select_anamnesis', 'disabled' => $isView]) ?>

                    <div id="box_alonemnesis" style="display: none; margin-top: 10px; background: #f9f9f9; padding: 10px; border: 1px solid #ddd;">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Diperoleh dari:</label>
                                <?= Html::textInput('DataForm[alonemnesis_diperoleh]', val($data, 'alonemnesis_diperoleh'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                            </div>
                            <div class="col-md-6">
                                <label>Hubungan:</label>
                                <?= Html::textInput('DataForm[alonemnesis_hubungan]', val($data, 'alonemnesis_hubungan'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <label>Alergi</label>
                        <?= Html::textInput('DataForm[alergi]', val($data, 'alergi'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <label style="min-width: 120px; font-weight: bold;">3. Keluhan Utama</label>
                    <?= Html::textInput('DataForm[keluhan_utama]', val($data, 'keluhan_utama'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                </div>
            </div>

            <label style="min-width: 120px; font-weight: bold;">4. Pemeriksaan Fisik :</label>
            <div class="row" style="margin-left: 10px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">A. Keadaan Umum : </label>
                    <div class="radio-container">
                        <?= Html::radioList('DataForm[keadaan_umum]', val($data, 'keadaan_umum'), [
                            'Tidak Tampak Sakit' => 'Tidak Tampak Sakit',
                            'Sakit Ringan' => 'Sakit Ringan',
                            'Sedang' => 'Sedang',
                            'Berat' => 'Berat'
                        ], ['itemOptions' => ['disabled' => $isView]]) ?>
                    </div>
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">B. Warna Kulit : </label>

                    <div class="radio-container">
                        <?= Html::radioList('DataForm[warna_kulit]', val($data, 'warna_kulit'), [
                            'Normal' => 'Normal',
                            'Sianosis' => 'Sianosis',
                            'Pucat' => 'Pucat',
                            'Kemerahan' => 'Kemerahan'
                        ],['itemOptions' => ['disabled' => $isView]]) ?>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Kesadaran : </label><br>
                        <?= Html::radioList('DataForm[kesadaran]', val($data, 'kesadaran'), [
                            'Compos Mentis' => 'Compos Mentis',
                            'Apatis' => 'Apatis',
                            'Somnolent' => 'Somnolent',
                            'Sopor' => 'Sopor',
                            'Soporokoma' => 'Soporokoma',
                            'Koma' => 'Koma'
                        ], [
                            'separator' => '<br>','itemOptions' => ['disabled' => $isView]
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Tanda Vital : </label><br>
                        <label>TD (mmHg)</label>
                        <?= Html::textInput('DataForm[td]', val($data, 'td'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                        <label>Pernafasan</label>
                        <?= Html::textInput('DataForm[p]', val($data, 'p'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                        <label>Nadi (x/mnt)</label>
                        <?= Html::textInput('DataForm[nadi]', val($data, 'nadi'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                        <label>Suhu (OC)</label>
                        <?= Html::textInput('DataForm[suhu]', val($data, 'suhu'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Fungsional : </label><br>
                        <label>1. Alat Bantu</label>
                        <?= Html::textInput('DataForm[alat_bantu]', val($data, 'alat_bantu'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                        <label>2. Prothesa</label>
                        <?= Html::textInput('DataForm[prothesa]', val($data, 'prothesa'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                        <label>3. Cacat Tubuh</label>
                        <?= Html::textInput('DataForm[cacat_tubuh]', val($data, 'cacat_tubuh'), ['class' => 'form-control', 'disabled' => $isView]) ?>
                        <label>4. ADL</label>
                        <?= Html::radioList('DataForm[adl]', val($data, 'adl'), [
                            'Mandiri' => 'Mandiri',
                            'Dibantu' => 'Dibantu'
                        ], [
                            'separator' => '<br>','itemOptions' => ['disabled' => $isView]
                        ]) ?>
                        <label>5. Riwayat Jatuh :</label>
                        <?= Html::radioList('DataForm[riwayat_jatuh]', val($data, 'riwayat_jatuh'), [
                            '+' => '+',
                            '-' => '-'
                        ], [
                            'separator' => '<br>','itemOptions' => ['disabled' => $isView]
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Antrapometri : </label><br>
                        <label>Berat Badan : </label>
                        <?= Html::textInput('DataForm[bb]', val($data, 'bb'), ['class' => 'form-control', 'id' => 'bb', 'disabled' => $isView]) ?>
                        <label>Tinggi Badan : </label>
                        <?= Html::textInput('DataForm[tb]', val($data, 'tb'), ['class' => 'form-control', 'id' => 'tb', 'disabled' => $isView]) ?>
                        <label>Panjang Badan : </label>
                        <?= Html::textInput('DataForm[pb]', val($data, 'pb'), ['class' => 'form-control', 'id' => 'pb', 'disabled' => $isView]) ?>
                        <label>Lingkar Kepala : </label>
                        <?= Html::textInput('DataForm[lk]', val($data, 'lk'), ['class' => 'form-control', 'id' => 'lk', 'disabled' => $isView]) ?>
                        <label>IMT :</label>
                        <input type="text" id="imt" name="DataForm[imt]" class="form-control" style="text-align: center;" readonly>
                    </div>
                </div>

                <div class="row" style="margin-top:10px;">
                    <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">C. Status Gizi : </label>
                        <input type="text" id="status_gizi" name="DataForm[status_gizi]" class="form-control" style="text-align: center;" readonly>
                        <!-- <div class="radio-container">
                            <?= Html::radioList('DataForm[status_gizi]', '', [
                                'Ideal' => 'Ideal',
                                'Kurang' => 'Kurang',
                                'Obesitas/Overweight' => 'Obesitas/Overweight'
                            ]) ?> -->
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" style="margin-top:15px;">
            <div class="col-md-12">
                <label style="min-width: 120px; font-weight: bold;">5. Riwayat Penyakit Sekarang : </label>
                <?= Html::textInput('DataForm[r_penyakit_baru]', val($data, 'r_penyakit_baru'), ['class' => 'form-control', 'rows' => 1, 'disabled' => $isView]) ?>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
            <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">6. Riwayat Penyakit Sebelumnya : </label>
                <div class="radio-container">
                    <?= Html::radioList('DataForm[r_penyakit_lama]', val($data, 'r_penyakit_lama'), [
                        'DM' => 'DM',
                        'Hipertensi' => 'Hipertensi',
                        'jantung' => 'jantung',
                        'Lain-lain' => 'Lain-lain'
                    ], ['itemOptions' => ['disabled' => $isView]]) ?>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
            <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">7. Riwayat Penyakit : </label>
                <div class="radio-container">
                    <?= Html::radioList('DataForm[r_penyakit]', val($data, 'r_penyakit'), [
                        'Tidak' => 'Tidak',
                        'Ya' => 'Ya'
                    ], ['itemOptions' => ['disabled' => $isView]]) ?>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
            <div class="col-md-12">
                <label style="min-width: 120px; font-weight: bold;">8. Riwayat Penyakit Keluarga : </label>
                <?= Html::textInput('DataForm[r_penyakit_keluarga]', val($data, 'r_penyakit_keluarga'), ['class' => 'form-control', 'rows' => 1, 'disabled' => $isView]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="min-width: 120px; font-weight: bold;">9. Riwayat Operasi</label>
                <?= Html::dropDownList('DataForm[is_operasi]', val($data, 'is_operasi'), ['Tidak' => 'Tidak', 'Ya' => 'Ya'], ['class' => 'form-control', 'id' => 'is_operasi', 'disabled' => $isView]) ?>
                <div id="box_operasi" style="display:none; margin-top:10px; background: #eee; padding: 10px;">
                    <label>Operasi apa & Kapan?</label>
                    <input type="text" name="DataForm[operasi_apa]" class="form-control" placeholder="Nama Operasi">
                    <input type="text" name="DataForm[operasi_kapan]" class="form-control" placeholder="Tahun" style="margin-top:5px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="min-width: 120px; font-weight: bold;">10. Pernah Dirawat di RS?</label>
                <?= Html::dropDownList('DataForm[is_dirawat]', val($data, 'is_dirawat'), ['Tidak' => 'Tidak', 'Ya' => 'Ya'], ['class' => 'form-control', 'id' => 'is_dirawat', 'disabled' => $isView]) ?>
                <div id="box_dirawat" style="display:none; margin-top:10px; background: #eee; padding: 10px;">
                    <label>Penyakit apa & Kapan?</label>
                    <input type="text" name="DataForm[penyakit_apa]" class="form-control" placeholder="Nama Penyakit">
                    <input type="text" name="DataForm[penyakit_kapan]" class="form-control" placeholder="Tahun" style="margin-top:5px;">
                </div>
            </div>
        </div>

        <hr>
        <label style="min-width: 120px; font-weight: bold;">15. Pengkajian Resiko Jatuh</label>
        <table class="table table-bordered">
            <th>No</th>
            <th colspan="2">Resiko</th>
            <th>Skala</th>
            <th>Hasil</th>
            <tr>
                <td>1</td>
                <td colspan="2">Riwayat jatuh 3 bulan terakhir?</td>
                <td style="text-align: center;">Tidak = 0 <br> Ya = 25 </td>
                <td><?= Html::dropDownList('DataForm[skor_jatuh_1]', val($data, 'skor_jatuh_1'), [0 => '0', 25 => '25'], ['class' => 'skor-input form-control', 'style' => 'text-align: center; align-content: center;', 'disabled' => $isView]) ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td colspan="2">Diagnosa medis sekunder > 1</td>
                <td style="text-align: center;">Tidak = 0 <br> Ya = 15 </td>
                <td><?= Html::dropDownList('DataForm[skor_jatuh_2]', val($data, 'skor_jatuh_2'), [0 => '0', 15 => '15'], ['class' => 'skor-input form-control', 'style' => 'text-align: center; align-content: center;', 'disabled' => $isView]) ?></td>
            </tr>
            <!-- Baris 3 -->
            <tr>
                <td rowspan="3" style="vertical-align: middle;">3</td>
                <td rowspan="3" style="vertical-align: middle;">Alat Bantu Jalan</td>

                <td>Mandiri, Bedrest, Dibantu Perawat, Kursi Roda</td>
                <td style="text-align: center;">0</td>
                <td rowspan="3"><?= Html::dropDownList('DataForm[resiko_3]', val($data, 'resiko_3'), [0 => '0', 15 => '15', 15 => '15'], ['class' => 'skor-input form-control', 'style' => 'height: 100px; text-align: center;', 'disabled' => $isView]) ?></td>
            </tr>
            <!-- Baris 3 Merge -->
            <tr>
                <td>Penopang, Tongkat/Walker</td>
                <td style="text-align: center;">15</td>
            </tr>
            <!-- Baris 3 Merge -->
            <tr>
                <td>Mencengkeram Furniture/sesuatu untuk topangan</td>
                <td style="text-align: center;">15</td>
            </tr>
            <tr>
                <td>4</td>
                <td colspan="2">Ad akses IV / Heparin Lock?</td>
                <td style="text-align: center;">Tidak = 0 <br> Ya = 20 </td>
                <td><?= Html::dropDownList('DataForm[skor_jatuh_4]', val($data, 'skor_jatuh_4'), [0 => '0', 20 => '20'], ['class' => 'skor-input form-control', 'style' => 'text-align: center; align-content: center;', 'disabled' => $isView]) ?></td>
            </tr>
            <!-- Baris 5 -->
            <tr>
                <td rowspan="3" style="vertical-align: middle;">5</td>
                <td rowspan="3" style="vertical-align: middle;">Cara Berjalan/Berpindah</td>

                <td>Normal</td>
                <td style="text-align: center;">0</td>
                <td rowspan="3"><?= Html::dropDownList('DataForm[resiko_5]', val($data, 'resiko_5'), [0 => '0', 10 => '10', 20 => '20'], ['class' => 'skor-input form-control', 'style' => 'height: 100px; text-align: center;', 'disabled' => $isView]) ?></td>
            </tr>
            <!-- Baris 5 Merge -->
            <tr>
                <td>Lemah, Langkah, Diseret</td>
                <td style="text-align: center;">10</td>
            </tr>
            <!-- Baris 5 Merge -->
            <tr>
                <td>Terganggu, Perlu Bantuan, Keseimbangan Produk</td>
                <td style="text-align: center;">20</td>
            </tr>
            <!-- Baris 6 -->
            <tr>
                <td rowspan="2" style="vertical-align: middle;">6</td>
                <td rowspan="2" style="vertical-align: middle;">Status Mental </td>

                <td>Orientasi Sesuai Kemampuan Diri</td>
                <td style="text-align: center;">0</td>
                <td rowspan="2"><?= Html::dropDownList('DataForm[resiko_6]', val($data, 'resiko_6'), [0 => '0', 15 => '15'], ['class' => 'skor-input form-control', 'style' => 'height: 100px; text-align: center;', 'disabled' => $isView]) ?></td>
            </tr>
            <!-- Baris 6 Merge -->
            <tr>
                <td>Lupa Keterbatasan Diri</td>
                <td style="text-align: center;">15</td>
            </tr>
            <tr class="warning">
                <th colspan="4" style="text-align: center; vertical-align: middle;">Total Skor</th>
                <td>
                    <input type="text" id="total_skor" name="DataForm[total_jatuh]" class="form-control" style="text-align: center;" readonly>
                    <small id="label_intervensi" class="text-danger" style="font-weight:bold;"></small>
                </td>
            </tr>
        </table>

    </div>
</div>
<?php if (!$isView): ?>
        <div class="form-group" style="margin-bottom: 50px;">
            <?= Html::submitButton('Simpan Perubahan Data', ['class' => 'btn btn-success btn-lg btn-block']) ?>
        </div>
    <?php endif; ?>
<?php ActiveForm::end(); ?>
</div>

<?php
$script = <<< JS
    function kalkulasiIMT() {
        let bb = parseFloat($('#bb').val()) || 0;
        let tb = parseFloat($('#tb').val()) / 100 || 0;
        if (bb > 0 && tb > 0) {
            let imt = bb / (tb * tb);
            $('#imt').val(imt.toFixed(2));
            let status = (imt < 18.5) ? "Kurus" : (imt <= 25) ? "Normal" : (imt <= 27) ? "Gemuk" : "Obesitas";
            $('#status_gizi').val(status);
        }
    }
    
    
    $(document).on('change', '#is_operasi', function() {
        $('#box_operasi').toggle($(this).val() === 'Ya');
    });

    $(document).on('change', '#is_dirawat', function() {
        $('#box_dirawat').toggle($(this).val() === 'Ya');
    });

    function hitungSkorJatuh() {
        let total = 0;
        $('.skor-input').each(function() {
            total += parseInt($(this).val()) || 0;
        });
        $('#total_skor').val(total);
        let label = (total >= 45) ? "Lakukan Intervensi Jatuh Resiko Tinggi" : (total >= 25) ? "Lakukan Intervensi Jatuh Resiko Rendah" : "Perawatan yang Baik";
        $('#label_intervensi').text(label);
    }

    $(document).on('change', '#select_anamnesis', function() { $('#box_alonemnesis').toggle($(this).val() === 'Alonemnesis'); });
    $(document).on('input', '#bb, #tb', kalkulasiIMT);
    $(document).on('change', '.skor-input', hitungSkorJatuh);

    // Jalankan saat halaman dibuka (Edit Mode)
    kalkulasiIMT();
    hitungSkorJatuh();
    $('#box_alonemnesis').toggle($('#select_anamnesis').val() === 'Alonemnesis');
     $('#box_operasi').toggle($('#is_operasi').val() === 'Ya');
    $('#box_dirawat').toggle($('#is_dirawat').val() === 'Ya');

    if ("$isView" == "1") {
        $('.isi-form-dynamic .form-control').css({
            'border': 'none',
            'background': 'transparent',
            'box-shadow': 'none',
            'padding': '0'
        });
        $('.isi-form-dynamic select').css('appearance', 'none');
    }
    
JS;
$this->registerJs($script);
?>