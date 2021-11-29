<?php

namespace app\models;

use app\utiles\ProcesadorPalabras;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "columna".
 *
 * @property int $id
 * @property string $titulo
 * @property string $url
 * @property string $fecha
 * @property string $texto
 * @property int $columnista_id
 *
 * @property Columnista $columnista
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
            [['titulo', 'url', 'fecha', 'texto', 'columnista_id'], 'required'],
            [['fecha'], 'safe'],
            [['texto'], 'string'],
            [['columnista_id'], 'integer'],
            [['titulo', 'url'], 'string', 'max' => 255],
            [['columnista_id'], 'exist', 'skipOnError' => true, 'targetClass' => Columnista::className(), 'targetAttribute' => ['columnista_id' => 'id']],
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
            'columnista_id' => 'Columnista ID',
        ];
    }

    /**
     * Gets query for [[Columnista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColumnista()
    {
        return $this->hasOne(Columnista::className(), ['id' => 'columnista_id']);
    }

    /**
     * elimina las StopWords de la columna
     * @return string
     */
    public function getTextoSinStopWords(){
        return ProcesadorPalabras::removeFirstLineAndStopWords($this->texto);
    }

    /**
     * @return string[]
     */
    public function getTopWords($n = 10){
        $palabras = ProcesadorPalabras::ArrayMapCantidadPalabras($this->getTextoSinStopWords(), null, true);
        return array_slice(array_keys($palabras), 0, $n);
    }

    /**
     * @return string
     */
    public function getTop10Words()
    {
        return implode(" ", $this->topWords);
    }
    


    /**
     * Obtiene las 10 palabras más repetidas (sin stop words)
     */
}
