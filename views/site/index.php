<?php

/* @var $this yii\web\View */
/** @var yii\db\ActiveQueryInterface $columnas */

use app\models\Columnista;
use kartik\grid\GridView;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
//zuse yii\grid\GridView;
//use yii\data\ArrayDataProvider;
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
            <div class="col-lg-12">
                <h2>Columnas</h2>
                <?php
                    $form = ActiveForm::begin([
                        'id' => 'columnas-form',
                        'options' => ['class' => ''],
                        'method' => 'get',
                        'action' => '/columna/leer'
                    ]); 
                ?>
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
                                return Html::checkbox("columnas[$columna->id]", false, $options = ['label' => '']);
                            },
                            'encodeLabel' => false,
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
                    <?= Html::submitButton('Unir Columnas', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end() ?>
                
            </div>
        </div>

    </div>
</div>
