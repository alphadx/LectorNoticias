<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColumnistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Columnistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columnista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Columnista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'url:url',
            'topWords',
            [
                'label' => 'Columnas',
                'format' => 'raw',
                'value' => function($columnista) {
                    return '<a href="'.Url::toRoute(['columna/index', 'sort'=> '-fecha', 'ColumnaSearch[columnista_id]' => $columnista->id]).'">'. 'columnas' .'</a>';
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
