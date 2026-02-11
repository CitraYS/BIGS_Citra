<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
?>

<div class="data-form-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::hiddenInput('DataForm[id_registrasi]', Yii::$app->request->get('id_registrasi')) ?>
    <div class="panel panel-primary">
        <hr>
        <div class="panel-heading" style="text-align: center;"><h1>PENGKAJIAN KEPERAWATAN POLIKLINIK KEBIDANAN</h1></div>
        <hr>
        <div class="panel-body">

            <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">1. Cara Masuk : </label>
                <div class="radio-container">
                    <?= Html::radioList('DataForm[cara_masuk]', '', [
                        'Jalan tanpa bantuan' => 'Jalan tanpa bantuan',
                        'Kursi tanpa bantuan' => 'Kursi tanpa bantuan',
                        'Tempat tidur dorong' => 'Tempat tidur dorong',
                        'Lain-lain' => 'Lain-lain'
                    ]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label style="min-width: 120px; font-weight: bold;">2. Anamnesis</label>
                    <?= Html::dropDownList('DataForm[anamnesis_tipe]', '', [
                        'Autoanamnesis' => 'Autoanamnesis',
                        'Alonemnesis' => 'Alonemnesis'
                    ], ['class' => 'form-control', 'id' => 'select_anamnesis']) ?>

                    <div id="box_alonemnesis" style="display: none; margin-top: 10px; background: #f9f9f9; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Diperoleh dari:</label>
                                <?= Html::textInput('DataForm[alonemnesis_diperoleh]', '', ['class' => 'form-control']) ?>
                            </div>
                            <div class="col-md-6">
                                <label>Hubungan:</label>
                                <?= Html::textInput('DataForm[alonemnesis_hubungan]', '', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <label>Alergi</label>
                        <?= Html::textInput('DataForm[alergi]', '', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <label style="min-width: 120px; font-weight: bold;">3. Keluhan Utama</label>
                    <?= Html::textInput('DataForm[keluhan_utama]', '', ['class' => 'form-control']) ?>
                </div>
            </div>
            <label style="min-width: 120px; font-weight: bold;">4. Pemeriksaan Fisik :</label>
            <div class="row" style="margin-left: 10px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">A. Keadaan Umum : </label>
                    <div class="radio-container">
                        <?= Html::radioList('DataForm[keadaan_umum]', '', [
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
                        <?= Html::radioList('DataForm[warna_kulit]', '', [
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
                        <?= Html::radioList('DataForm[kesadaran]', '', [
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
                        <?= Html::textInput('DataForm[td]', '', ['class' => 'form-control']) ?>
                        <label>Pernafasan</label>
                        <?= Html::textInput('DataForm[p]', '', ['class' => 'form-control']) ?>
                        <label>Nadi (x/mnt)</label>
                        <?= Html::textInput('DataForm[nadi]', '', ['class' => 'form-control']) ?>
                        <label>Suhu (OC)</label>
                        <?= Html::textInput('DataForm[suhu]', '', ['class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Fungsional : </label><br>
                        <label>1. Alat Bantu</label>
                        <?= Html::textInput('DataForm[alat_bantu]', '', ['class' => 'form-control']) ?>
                        <label>2. Prothesa</label>
                        <?= Html::textInput('DataForm[prothesa]', '', ['class' => 'form-control']) ?>
                        <label>3. Cacat Tubuh</label>
                        <?= Html::textInput('DataForm[cacat_tubuh]', '', ['class' => 'form-control']) ?>
                        <label>4. ADL</label>
                        <?= Html::radioList('DataForm[adl]', '', [
                            'Mandiri' => 'Mandiri',
                            'Dibantu' => 'Dibantu'
                        ], [
                            'separator' => '<br>', 
                        ]) ?>
                        <label>5. Riwayat Jatuh :</label>
                        <?= Html::radioList('DataForm[riwayat_jatuh]', '', [
                            '+' => '+',
                            '-' => '-'
                        ], [
                            'separator' => '<br>', 
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">Antrapometri : </label><br>
                        <label>Berat Badan : </label>
                        <?= Html::textInput('DataForm[bb]', '', ['class' => 'form-control','id' => 'bb']) ?>
                        <label>Tinggi Badan : </label>
                        <?= Html::textInput('DataForm[tb]', '', ['class' => 'form-control','id' => 'tb']) ?>
                        <label>Panjang Badan : </label>
                        <?= Html::textInput('DataForm[pb]', '', ['class' => 'form-control','id' => 'pb']) ?>
                        <label>Lingkar Kepala : </label>
                        <?= Html::textInput('DataForm[lk]', '', ['class' => 'form-control','id' => 'lk']) ?>
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
                    <?= Html::textarea('DataForm[r_penyakit_baru]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                    <label style="min-width: 120px; margin-bottom: 0; font-weight: bold;">6. Riwayat Penyakit Sebelumnya : </label>
                    <div class="radio-container">
                        <?= Html::radioList('DataForm[r_penyakit_lama]', '', [
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
                        <?= Html::radioList('DataForm[r_penyakit]', '', [
                            'Tidak' => 'Tidak',
                            'Ya' => 'Ya'
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <label style="min-width: 120px; font-weight: bold;">8. Riwayat Penyakit Keluarga : </label>
                    <?= Html::textarea('DataForm[r_penyakit_keluarga]', '', ['class' => 'form-control', 'rows' => 1]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label style="min-width: 120px; font-weight: bold;">9. Riwayat Operasi</label>
                    <?= Html::dropDownList('DataForm[is_operasi]', 'Tidak', ['Tidak' => 'Tidak', 'Ya' => 'Ya'], ['class' => 'form-control', 'id' => 'is_operasi']) ?>
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
                    <?= Html::dropDownList('DataForm[is_dirawat]', 'Tidak', ['Tidak' => 'Tidak', 'Ya' => 'Ya'], ['class' => 'form-control', 'id' => 'is_dirawat']) ?>
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
                    <td><?= Html::dropDownList('DataForm[skor_jatuh_1]', '', [0 =>'0',25 =>'25'], ['class' => 'skor-input form-control', 'style' => 'text-align: center; align-content: center;']) ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="2">Diagnosa medis sekunder > 1</td>
                    <td style="text-align: center;">Tidak = 0 <br> Ya = 15 </td>
                    <td><?= Html::dropDownList('DataForm[skor_jatuh_2]', '', [0 =>'0',15 =>'15'], ['class' => 'skor-input form-control','style' => 'text-align: center; align-content: center;']) ?></td>
                </tr>
                <!-- Baris 3 -->
                <tr>
                    <td rowspan="3" style="vertical-align: middle;">3</td>
                    <td rowspan="3" style="vertical-align: middle;">Alat Bantu Jalan</td>

                    <td>Mandiri, Bedrest, Dibantu Perawat, Kursi Roda</td>
                    <td style="text-align: center;">0</td>
                    <td rowspan="3"><?= Html::dropDownList('DataForm[resiko_3]', '',[0 =>'0',15 =>'15',15 =>'15'] , ['class' => 'skor-input form-control','style' => 'height: 100px; text-align: center;'])?></td>
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
                    <td><?= Html::dropDownList('DataForm[skor_jatuh_4]', 0, [0 =>'0',20 =>'20'], ['class' => 'skor-input form-control','style' => 'text-align: center; align-content: center;']) ?></td>
                </tr>
                <!-- Baris 5 -->
                <tr>
                    <td rowspan="3" style="vertical-align: middle;">5</td>
                    <td rowspan="3" style="vertical-align: middle;">Cara Berjalan/Berpindah</td>

                    <td>Normal</td>
                    <td style="text-align: center;">0</td>
                    <td rowspan="3"><?= Html::dropDownList('DataForm[resiko_5]', '', [0 =>'0',10 =>'10',20 =>'20'] , ['class' => 'skor-input form-control','style' => 'height: 100px; text-align: center;'])?></td>
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
                    <td rowspan="2"><?= Html::dropDownList('DataForm[resiko_6]', '', [0 =>'0',15 =>'15'] , ['class' => 'skor-input form-control','style' => 'height: 100px; text-align: center;'])?></td>
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