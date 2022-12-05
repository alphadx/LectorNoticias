<?php

use app\models\Columnista;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColumnaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Columnas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columna-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        <?= Html::a('Create Columna', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'titulo',
            /*
            [
                'label' => 'URL',
                'format' => 'raw',
                'value' => function($columna) {
                    return Html::a("Origen", "https://www.elmercurio.com".$columna->url);
                }
            ],
            */
            'fecha',
            'textoWeb:raw:Texto',
            /*
            [
                'label' => 'Columnista',
                'value' => 'columnista.nombreAmononado',
                'attribute'=>'columnista_id',
                'filter'=>ArrayHelper::map(Columnista::find()->orderBy('nombre')->all(), 'id', 'nombreAmononado'),
                //'filter'=>ArrayHelper::map(Columnista::find()->orderBy('nombre')->asArray()->all(), 'id', 'nombreAmononado'), //esto retorna una 3-tupla (nombre => a, id => 1, url => www)
            ],
            */

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
