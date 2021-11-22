<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "columna".
 *
 * @property int $id
 * @property string $titulo
 * @property string $url
 * @property string $fecha
 * @property string $texto
 * @property int $columnista
 *
 * @property Columnista $columnista0
 */
class Columna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'columna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'url', 'fecha', 'texto', 'columnista'], 'required'],
            [['fecha'], 'safe'],
            [['columnista'], 'integer'],
            [['titulo', 'url', 'texto'], 'string', 'max' => 255],
            [['columnista'], 'exist', 'skipOnError' => true, 'targetClass' => Columnista::className(), 'targetAttribute' => ['columnista' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'url' => 'Url',
            'fecha' => 'Fecha',
            'texto' => 'Texto',
            'columnista' => 'Columnista',
        ];
    }

    /**
     * Gets query for [[Columnista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColumnista0()
    {
        return $this->hasOne(Columnista::className(), ['id' => 'columnista']);
    }
}
