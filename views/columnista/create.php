<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Columnista */

$this->title = 'Create Columnista';
$this->params['breadcrumbs'][] = ['label' => 'Columnistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columnista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
