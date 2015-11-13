<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\yii2Extended\ExtActiveRecord */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $columns array */

$this->title = Yii::t('app', 'List of {model}', ['model' => $model->getHumanName()]);

$this->params['breadcrumbs'][] = $this->title;

$className =  substr($this->className(), strrpos($this->className(), '\\') + 1);
?>
<div class="box">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $model,
        'columns'      => $columns,
    ]); ?>

</div>
