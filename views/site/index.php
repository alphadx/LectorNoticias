<?php

/** @var yii\web\View $this */
/** @var yii\db\ActiveQueryInterface $columnas */

use app\models\Columnista;
use kartik\grid\GridView;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
//zuse yii\grid\GridView;
//use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = getenv("TITULO_WEB");
?>

<?php
$url = Url::to('/columna/leer');

$this->registerJs(<<<JS
    
    var lectura = function (){
       let url = "$url";
       let params = $('.columna-id:checked').map(function(){return escape("id[]") + "=" + escape(this.value)}).get().join("&");
       if(params.length > 0){
           window.location = url + '?' + params;
       }else{
           alert("Seleccione a lo menos una columna");
       }
   }
JS
, View::POS_END, 'Generador de URL');

?>

<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>Columnas</h2>
                <?= gridView::widget([
                    'dataProvider' => new ActiveDataProvider([
                        'query' => $columnas,
                        'pagination' => [
                            'pageSize' => 20,
                        ],
                        'sort' => [
                            'defaultOrder' => [
                                'fecha' => SORT_DESC,
                            ]
                        ],
                    ]),
                    'tableOptions' => [
//                        'id' => 'theDatatable',
                        'class'=>'table-sm'
                        ],
                    'columns' => [
                        //'id',
                        [
                            'label' => '<span class="fa fa-fw fa-cubes">',
                            'format' => 'raw',
                            'value' => function ($columna) {
                                return Html::checkbox("columna", false, $options = ['label' => '', "class" => 'columna-id', "value" => $columna->id]);
                            },
                            'encodeLabel' => false,
                            'contentOptions' => ['style' => 'width:2%;'],
                        ],
                        [
                            'label' => 'URL',
                            'format' => 'raw',
                            'value' => function($columna) {
                                return Html::a($columna->id, Url::to('/columna/view?id='. $columna->id));
                            }
                        ],
                    'titulo', 'fecha', 
                    'columnista.nombreAmononado',
                    'columnista.topWords',
                ],

                ]);

                ?>

                <div class="form-group">
                    <?= Html::button('Unir Columnas', ['class' => 'btn btn-success', 'onclick' => 'lectura()']) ?>
                </div>
                
            </div>
        </div>

    </div>
</div>
