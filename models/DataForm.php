<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_form".
 *
 * @property int $id_form_data
 * @property int|null $id_form
 * @property int|null $id_registrasi
 * @property string|null $data
 * @property bool|null $is_delete
 * @property int|null $create_by
 * @property int|null $update_by
 * @property string|null $create_time_at
 * @property string|null $update_time_at
 */
class DataForm extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_form', 'id_registrasi', 'data', 'create_by', 'update_by'], 'default', 'value' => null],
            [['is_delete'], 'default', 'value' => 0],
            // [['id_form_data'], 'required'],
            [['id_form_data', 'id_form', 'id_registrasi', 'create_by', 'update_by'], 'default', 'value' => null],
            [['id_form_data', 'id_form', 'id_registrasi', 'create_by', 'update_by'], 'integer'],
            [['data', 'create_time_at', 'update_time_at'], 'safe'],
            [['is_delete'], 'boolean'],
            //[['id_form_data'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_form_data' => 'Id Form Data',
            'id_form' => 'Id Form',
            'id_registrasi' => 'Id Registrasi',
            'data' => 'Data',
            'is_delete' => 'Is Delete',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_time_at' => 'Create Time At',
            'update_time_at' => 'Update Time At',
        ];
    }
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::class, ['id_registrasi' => 'id_registrasi']);
    }
}
