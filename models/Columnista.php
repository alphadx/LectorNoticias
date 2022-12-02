<?php

namespace app\models;

use app\utiles\ProcesadorPalabras;
use Yii;

/**
 * This is the model class for table "columnista".
 *
 * @property int $id
 * @property string $nombre
 * @property string $url
 * @property string $nombreAmononado
 * @property string $topWords
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
        return $this->hasMany(Columna::class, ['columnista_id' => 'id']);
    }

    /**
     * retorna el nombre del columnista, pero más bonito
     * @return string
     */
    public function getNombreAmononado()
    {
        $foo = explode(", ", $this->nombre);
        if(count($foo) > 1){
            return $foo[1] . " " . $foo[0];
        }
        return $this->nombre;
    }

    /**
     * retorna las 10 palabras más repetidas en las columnas por el autor
     * @return string
     */

     public function getTopWords(){
        $top_words = [];
        foreach($this->columnas as $columna)
        {
            $top_words = ProcesadorPalabras::ArrayMapCantidadPalabras($columna->getTextoSinStopWords(), $top_words, true);
        }
        return implode(" ", array_slice(array_keys($top_words), 0, 10));
    }
    
}
