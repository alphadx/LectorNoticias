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
 * @property Columnista2 $elColumnista
 */
class Columna2 extends BaseModel
{
    //Base de datos de la db2
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

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
            [['titulo', 'url'], 'string', 'max' => 255],
            [['texto'], 'string'],
            [['columnista'], 'exist', 'skipOnError' => true, 'targetClass' => Columnista2::className(), 'targetAttribute' => ['columnista' => 'id']],
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
    public function getElColumnista()
    {
        return $this->hasOne(Columnista2::className(), ['id' => 'columnista']);
    }
}
