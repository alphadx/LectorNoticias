<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $columnas app\models\Columna[] */

$this->title = "Columnas múltiples";
$this->params['breadcrumbs'][] = ['label' => 'Columnas', 'url' => ['/columna?sort=-fecha']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
foreach($columnas as $model){
?>

    <div class="columna-view">

    <h1><?= Html::encode($model->titulo) ?></h1>
    <h2><?= Html::encode($model->columnista->nombreAmononado) ?></h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'titulo',
            'fecha',
            'columnista.topWords',
            [
                'label' => 'Texto',
                'format' => 'raw',
                'value' => 'textoWebSinAutor'
            ],
            //'textoWebSinAutor:raw',
            // [
            //     'label' => 'URL',
            //     'format' => 'raw',
            //     'value' => function($columnista) {
            //         return Html::a("Origen", "https://www.elmercurio.com".$columnista->url);
            //     }
            // ],
            //'columnista.nombre',
        ],
    ]) ?>

<?php
}
?>

</div>
