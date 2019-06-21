<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MinedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mineds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mined-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mined', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=> 'typeName', 'label'=>'jewel\'s type', 'value'=>'type.type'],
            'gnome_id',
            'status_mineral_id',
            ['attribute'=> 'mined_at', 'format'=>'datetime'],
            'elf_id',
            'master_gnome_id',
            ['attribute'=> 'purporsed_at', 'format'=>'datetime'],
            ['attribute'=> 'conformed_at_elf', 'format'=>'datetime'],
            'automatic:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
