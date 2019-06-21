<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MinedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mined-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'gnome_id') ?>

    <?= $form->field($model, 'status_mineral_id') ?>

    <?= $form->field($model, 'mined_at') ?>

    <?php // echo $form->field($model, 'elf_id') ?>

    <?php // echo $form->field($model, 'master_gnome_id') ?>

    <?php // echo $form->field($model, 'purporsed_at') ?>

    <?php // echo $form->field($model, 'conformed_at_elf') ?>

    <?php // echo $form->field($model, 'automatic')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
