<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "columnista".
 *
 * @property int $id
 * @property string $nombre
 * @property string $url
 *
 * @property Columna[] $columnas
 */
class Columnista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'columnista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nombre', 'url'], 'required'],
            [['id'], 'integer'],
            [['nombre', 'url'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'url' => 'Url',
        ];
    }

    /**
     * Gets query for [[Columnas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColumnas()
    {
        return $this->hasMany(Columna::className(), ['columnista' => 'id']);
    }
}
