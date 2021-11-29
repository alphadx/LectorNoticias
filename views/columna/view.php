<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Columna */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Columnas', 'url' => ['/columna?sort=-fecha']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="columna-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?= Html::encode($model->columnista->nombreAmononado) ?></h2>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'titulo',
            'fecha',
            'columnista.topWords',
            'texto:ntext',
            [
                'label' => 'URL',
                'format' => 'raw',
                'value' => function($columnista) {
                    return Html::a("Origen", "https://www.elmercurio.com".$columnista->url);
                }
            ],
            //'columnista.nombre',
        ],
    ]) ?>

</div>
