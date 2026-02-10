<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
?>

<div class="data-form-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <hr>
        <div class="panel-heading" style="text-align: center;"><h1>PENGKAJIAN KEPERAWATAN POLIKLINIK KEBIDANAN</h1></div>
        <hr>
        <div class="panel-body">

            <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">1. Cara Masuk : </label>
                <div class="radio-container">
                    <?= Html::radioList('DataRawat[cara_masuk]', '', [
                        'Jalan tanpa bantuan' => 'Jalan tanpa bantuan',
                        'Kursi tanpa bantuan' => 'Kursi tanpa bantuan',
                        'Tempat tidur dorong' => 'Tempat tidur dorong',
                        'Lain-lain' => 'Lain-lain'
                    ]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label>2. Anamnesis</label>
                    <?= Html::dropDownList('DataRawat[anamnesis_tipe]', '', [
                        'Autoanamnesis' => 'Autoanamnesis',
                        'Alonemnesis' => 'Alonemnesis'
                    ], ['class' => 'form-control', 'id' => 'select_anamnesis']) ?>

                    <div id="box_alonemnesis" style="display: none; margin-top: 10px; background: #f9f9f9; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Diperoleh dari:</label>
                                <?= Html::textarea('DataRawat[alonemnesis_diperoleh]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                            </div>
                            <div class="col-md-6">
                                <label>Hubungan:</label>
                                <?= Html::textarea('DataRawat[alonemnesis_hubungan]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <label>Alergi</label>
                        <?= Html::textarea('DataRawat[alergi]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <label>3. Keluhan Utama</label>
                    <?= Html::textarea('DataRawat[keluhan_utama]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                </div>
            </div>
            <label>4. Pemeriksaan Fisik :</label>
            <div class="row" style="margin-left: 10px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">A. Keadaan Umum : </label>
                    <div class="radio-container">
                        <?= Html::radioList('DataRawat[keadaan_umum]', '', [
                            'Tidak Tampak Sakit' => 'Tidak Tampak Sakit',
                            'Sakit Ringan' => 'Sakit Ringan',
                            'Sedang' => 'Sedang',
                            'Berat' => 'Berat'
                        ]) ?>
                    </div>
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">B. Warna Kulit : </label>

                    <div class="radio-container">
                        <?= Html::radioList('DataRawat[warna_kulit]', '', [
                            'Normal' => 'Normal',
                            'Sianosis' => 'Sianosis',
                            'Pucat' => 'Pucat',
                            'Kemerahan' => 'Kemerahan'
                        ]) ?>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Kesadaran : </label><br>
                        <?= Html::radioList('DataRawat[kesadaran]', '', [
                            'Compos Mentis' => 'Compos Mentis',
                            'Apatis' => 'Apatis',
                            'Somnolent' => 'Somnolent',
                            'Sopor' => 'Sopor',
                            'Soporokoma' => 'Soporokoma',
                            'Koma' => 'Koma'
                        ], [
                            'separator' => '<br>', 
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Tanda Vital : </label><br>
                        <label>TD (mmHg)</label>
                        <?= Html::textInput('DataRawat[td]', '', ['class' => 'form-control']) ?>
                        <label>Pernafasan</label>
                        <?= Html::textInput('DataRawat[p]', '', ['class' => 'form-control']) ?>
                        <label>Nadi (x/mnt)</label>
                        <?= Html::textInput('DataRawat[nadi]', '', ['class' => 'form-control']) ?>
                        <label>Suhu (OC)</label>
                        <?= Html::textInput('DataRawat[suhu]', '', ['class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Fungsional : </label><br>
                        <label>1. Alat Bantu</label>
                        <?= Html::textInput('DataRawat[alat_bantu]', '', ['class' => 'form-control']) ?>
                        <label>2. Prothesa</label>
                        <?= Html::textInput('DataRawat[prothesa]', '', ['class' => 'form-control']) ?>
                        <label>3. Cacat Tubuh</label>
                        <?= Html::textInput('DataRawat[cacat_tubuh]', '', ['class' => 'form-control']) ?>
                        <label>4. ADL</label>
                        <?= Html::radioList('DataRawat[adl]', '', [
                            'Mandiri' => 'Mandiri',
                            'Dibantu' => 'Dibantu'
                        ], [
                            'separator' => '<br>', 
                        ]) ?>
                        <label>5. Riwayat Jatuh :</label>
                        <?= Html::radioList('DataRawat[riwayat_jatuh]', '', [
                            '+' => '+',
                            '-' => '-'
                        ], [
                            'separator' => '<br>', 
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Antrapometri : </label><br>
                        <label>Berat Badan : </label>
                        <?= Html::textInput('DataRawat[bb]', '', ['class' => 'form-control','id' => 'bb']) ?>
                        <label>Tinggi Badan : </label>
                        <?= Html::textInput('DataRawat[tb]', '', ['class' => 'form-control','id' => 'tb']) ?>
                        <label>Panjang Badan : </label>
                        <?= Html::textInput('DataRawat[pb]', '', ['class' => 'form-control','id' => 'pb']) ?>
                        <label>Lingkar Kepala : </label>
                        <?= Html::textInput('DataRawat[lk]', '', ['class' => 'form-control','id' => 'lk']) ?>
                        <label>IMT :</label>
                        <input type="text" id="imt" name="DataRawat[imt]" class="form-control" style="text-align: center;" readonly>
                    </div>
                </div>

                <div class="row" style="margin-top:10px;">
                    <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">C. Status Gizi : </label>
                        <!--<input type="text" id="status_gizi" name="DataRawat[status_gizi]" class="form-control" style="text-align: center;" readonly> -->
                        <div class="radio-container">
                            <?= Html::radioList('DataRawat[status_gizi]', '', [
                                'Ideal' => 'Ideal',
                                'Kurang' => 'Kurang',
                                'Obesitas/Overweight' => 'Obesitas/Overweight'
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <label>5. Riwayat Penyakit Sekarang : </label>
                    <?= Html::textarea('DataRawat[r_penyakit_baru]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">6. Riwayat Penyakit Sebelumnya : </label>
                    <div class="radio-container">
                        <?= Html::radioList('DataRawat[r_penyakit_lama]', '', [
                            'DM' => 'DM',
                            'Hipertensi' => 'Hipertensi',
                            'jantung' => 'jantung',
                            'Lain-lain' => 'Lain-lain'
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">7. Riwayat Penyakit : </label>
                    <div class="radio-container">
                        <?= Html::radioList('DataRawat[r_penyakit]', '', [
                            'Tidak' => 'Tidak',
                            'Ya' => 'Ya'
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <label>8. Riwayat Penyakit Keluarga : </label>
                    <?= Html::textarea('DataRawat[r_penyakit_keluarga]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>9. Riwayat Operasi</label>
                    <?= Html::dropDownList('DataRawat[is_operasi]', 'Tidak', ['Tidak' => 'Tidak', 'Ya' => 'Ya'], ['class' => 'form-control', 'id' => 'is_operasi']) ?>
                    <div id="box_operasi" style="display:none; margin-top:10px; background: #eee; padding: 10px;">
                        <label>Operasi apa & Kapan?</label>
                        <input type="text" name="DataRawat[operasi_apa]" class="form-control" placeholder="Nama Operasi">
                        <input type="text" name="DataRawat[operasi_kapan]" class="form-control" placeholder="Tahun" style="margin-top:5px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>10. Pernah Dirawat di RS?</label>
                    <?= Html::dropDownList('DataRawat[is_dirawat]', 'Tidak', ['Tidak' => 'Tidak', 'Ya' => 'Ya'], ['class' => 'form-control', 'id' => 'is_dirawat']) ?>
                    <div id="box_dirawat" style="display:none; margin-top:10px; background: #eee; padding: 10px;">
                        <label>Penyakit apa & Kapan?</label>
                        <input type="text" name="DataRawat[penyakit_apa]" class="form-control" placeholder="Nama Penyakit">
                        <input type="text" name="DataRawat[penyakit_kapan]" class="form-control" placeholder="Tahun" style="margin-top:5px;">
                    </div>
                </div>
            </div>

            <hr>
            <label>15. Pengkajian Resiko Jatuh</label>
            <table class="table table-bordered">
                <th>No</th>
                <th colspan="2">Resiko</th>
                <th>Skala</th>
                <th>Hasil</th>
                <tr>
                    <td>1</td>
                    <td colspan="2">Riwayat jatuh 3 bulan terakhir?</td>
                    <td><?= Html::dropDownList('DataRawat[skor_jatuh_1]', '', [0 => 'Tidak (0)', 25 => 'Ya (25)'], ['class' => 'skor-input form-control', 'id' => 'drop_1']) ?></td>
                    <td style="text-align: center;"><span id="val_1">0</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="2">Diagnosa medis sekunder > 1</td>
                    <td><?= Html::dropDownList('DataRawat[skor_jatuh_2]', 0, [0 => 'Tidak (0)', 15 => 'Ya (15)'], ['class' => 'skor-input form-control', 'id' => 'drop_2']) ?></td>
                    <td style="text-align: center;"><span id="val_2">0</span></td>
                </tr>
                <!-- Baris 3 -->
                <tr>
                    <td rowspan="3" style="vertical-align: middle;">3</td>
                    <td rowspan="3" style="vertical-align: middle;">Alat Bantu Jalan</td>

                    <td>Mandiri, Bedrest, Dibantu Perawat, Kursi Roda</td>
                    <td><?= Html::textInput('DataRawat[resiko_31]', '', ['class' => 'skor-input-3 form-control', 'id' => 'drop_31']) ?></td>

                    <td rowspan="3" style="vertical-align: middle; text-align: center;">
                        <span id="val_3" styles="">0</span>
                    </td>
                </tr>
                <!-- Baris 3 Merge -->
                <tr>
                    <td>Penopang, Tongkat/Walker</td>
                    <td><?= Html::textInput('DataRawat[resiko_32]', '', ['class' => 'skor-input-3 form-control', 'id' => 'drop_32']) ?></td>
                </tr>
                <!-- Baris 3 Merge -->
                <tr>
                    <td>Mencengkeram Furniture/sesuatu untuk topangan</td>
                    <td><?= Html::textInput('DataRawat[resiko_33]', '', ['class' => 'skor-input-3 form-control', 'id' => 'drop_33']) ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td colspan="2">Ad akses IV / Heparin Lock?</td>
                    <td><?= Html::dropDownList('DataRawat[skor_jatuh_4]', 0, [0 => 'Tidak (0)', 20 => 'Ya (20)'], ['class' => 'skor-input form-control', 'id' => 'drop_4']) ?></td>
                    <td style="text-align: center;"><span id="val_4">0</span></td>
                </tr>
                <!-- Baris 5 -->
                <tr>
                    <td rowspan="3" style="vertical-align: middle;">5</td>
                    <td rowspan="3" style="vertical-align: middle;">Cara Berjalan/Berpindah</td>

                    <td>Normal</td>
                    <td><?= Html::textInput('DataRawat[resiko_51]', '', ['class' => 'skor-input-5 form-control', 'id' => 'drop_51']) ?></td>

                    <td rowspan="3" style="vertical-align: middle; text-align: center;">
                        <span id="val_5" styles="">0</span>
                    </td>
                </tr>
                <!-- Baris 5 Merge -->
                <tr>
                    <td>Lemah, Langkah, Diseret</td>
                    <td><?= Html::textInput('DataRawat[resiko_52]', '', ['class' => 'skor-input-5 form-control', 'id' => 'drop_52']) ?></td>
                </tr>
                <!-- Baris 5 Merge -->
                <tr>
                    <td>Terganggu, Perlu Bantuan, Keseimbangan Produk</td>
                    <td><?= Html::textInput('DataRawat[resiko_53]', '', ['class' => 'skor-input-5 form-control', 'id' => 'drop_53']) ?></td>
                </tr>
                <!-- Baris 5 -->
                <tr>
                    <td rowspan="2" style="vertical-align: middle;">6</td>
                    <td rowspan="2" style="vertical-align: middle;">Status Mental </td>

                    <td>Normal</td>
                    <td><?= Html::textInput('DataRawat[resiko_61]', '', ['class' => 'skor-input-6 form-control', 'id' => 'drop_61']) ?></td>

                    <td rowspan="2" style="vertical-align: middle; text-align: center;">
                        <span id="val_6" styles="">0</span>
                    </td>
                </tr>
                <!-- Baris 5 Merge -->
                <tr>
                    <td>Lemah, Langkah, Diseret</td>
                    <td><?= Html::textInput('DataRawat[resiko_62]', '', ['class' => 'skor-input-6 form-control', 'id' => 'drop_62']) ?></td>
                </tr>
                <tr class="warning">
                    <th colspan="4" style="text-align: center; vertical-align: middle;">Total Skor</th>
                    <td>
                        <input type="text" id="total_skor" name="DataRawat[total_jatuh]" class="form-control" style="text-align: center;" readonly>
                        <small id="label_intervensi" class="text-danger" style="font-weight:bold;"></small>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <?= Html::submitButton('Simpan Data Form', ['class' => 'btn btn-success btn-lg btn-block']) ?>
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
    
    function hitungSkorJatuh() {
        let total = 0;
        $('.skor-input').each(function() {
            total += parseInt($(this).val()) || 0;
        });

        $('#val_1').text($('#drop_1').val());
        $('#val_2').text($('#drop_2').val());
        $('#val_3').text($('#drop_3').val());
        $('#val_4').text($('#drop_4').val());

        $('#total_skor').val(total);
        let label = (total >= 45) ? "Lakukan Intervensi Jatuh Resiko Tinggi" : (total >= 25) ? "Lakukan Intervensi Jatuh Resiko Rendah" : "Perawatan yang Baik";
        $('#label_intervensi').text(label);
    }

    // TOGGLE LOGIC
    $(document).on('change', '#select_anamnesis', function() {
        $('#box_alonemnesis').toggle($(this).val() === 'Alonemnesis');
    });

    $(document).on('change', '#is_operasi', function() {
        $('#box_operasi').toggle($(this).val() === 'Ya');
    });

    $(document).on('change', '#is_dirawat', function() {
        $('#box_dirawat').toggle($(this).val() === 'Ya');
    });

    $(document).on('input', '#bb, #tb', kalkulasiIMT);
    $(document).on('change', '.skor-input', hitungSkorJatuh);

    // Initial Load
    kalkulasiIMT();
    hitungSkorJatuh();
    $('#box_alonemnesis').toggle($('#select_anamnesis').val() === 'Alonemnesis');
    $('#box_operasi').toggle($('#is_operasi').val() === 'Ya');
    $('#box_dirawat').toggle($('#is_dirawat').val() === 'Ya');
JS;
$this->registerJs($script);
?>