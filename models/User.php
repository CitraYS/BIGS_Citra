<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string|null $nama_user
 * @property string|null $poliklinik
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_user', 'poliklinik'], 'default', 'value' => null],
            [['id_user'], 'required'],
            [['id_user'], 'default', 'value' => null],
            [['id_user'], 'integer'],
            [['nama_user', 'poliklinik'], 'string', 'max' => 255],
            [['id_user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id Petugas',
            'nama_user' => 'Nama Petugas',
            'poliklinik' => 'Poliklinik',
        ];
    }
    
}
