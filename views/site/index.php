<?php

/* @var $this yii\web\View */
/** @var \app\models\Columnistas[] $columnistas */

use app\models\Columnista;
use kartik\grid\GridView;
//zuse yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = getenv("TITULO_WEB");
?>
<div class="site-index">

    <!-- <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?=getenv("TITULO_WEB")?></h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->
    <div class="body-content">

        <div class="row">
            <!-- <div class="col-lg-6">
                <h2>Columnistas</h2>

                <?= gridView::widget([
                    'dataProvider' => new ArrayDataProvider([
                        'allModels' => $columnistas,
                    ]),
                    'columns' => //array_keys(Columnista::getTableSchema()->columns),
                    [
                        [
                            'label' => 'ID',
                            'attribute' => 'id',
                            'format' => ['decimal', 0],
                        ],
                        "nombre",
                        [
                            'label' => 'URL',
                            'format' => 'raw',
                            'value' => function($columnista) {
                                return Html::a("Origen", "https://www.elmercurio.com".$columnista->url);
                            }
                        ],
                    ]

                ]);

                ?>
            </div> -->
            <div class="col-lg-12">
                <h2>Columnas</h2>
                <?= gridView::widget([
                    'dataProvider' => new ArrayDataProvider([
                        'allModels' => $columnas,
                    ]),
                    'columns' => [
                        //'id',
                        [
                            'label' => 'URL',
                            'format' => 'raw',
                            'value' => function($columna) {
                                return Html::a($columna->id, Url::to('columna/view?id='. $columna->id));
                            }
                        ],
                    'titulo', 'fecha', 
                    'columnista.nombreAmononado',
                    'columnista.topWords',
                ],

                ]);

                ?>
                
            </div>
        </div>

    </div>
</div>
