<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registrasi".
 *
 * @property int $id_registrasi
 * @property int $no_registrasi
 * @property int $no_rekam_medis
 * @property string $nama_pasien
 * @property string $tanggal_lahir
 * @property int $nik
 * @property int $create_by
 * @property string $create_time_at
 * @property int|null $update_by
 * @property string|null $update_time_at
 */
class Registrasi extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['update_by', 'update_time_at'], 'default', 'value' => null],
            [['no_registrasi', 'no_rekam_medis', 'nama_pasien', 'tanggal_lahir', 'nik', 'create_by'], 'required'],
            [['no_registrasi', 'no_rekam_medis', 'nik', 'create_by', 'update_by'], 'default', 'value' => null],
            [['no_registrasi', 'no_rekam_medis', 'nik', 'create_by', 'update_by'], 'integer'],
            [['tanggal_lahir', 'create_time_at', 'update_time_at'], 'safe'],
            [['nama_pasien'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_registrasi' => 'Id Registrasi',
            'no_registrasi' => 'No Registrasi',
            'no_rekam_medis' => 'No Rekam Medis',
            'nama_pasien' => 'Nama Pasien',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nik' => 'NIK',
            'create_by' => 'Create By',
            'create_time_at' => 'Create Time At',
            'update_by' => 'Update By',
            'update_time_at' => 'Update Time At',
        ];
    }

}
