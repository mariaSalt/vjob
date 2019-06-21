<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mined */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mined-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'gnome_id')->textInput() ?>

    <?= $form->field($model, 'status_mineral_id')->textInput() ?>

    <?= $form->field($model, 'mined_at')->textInput() ?>

    <?= $form->field($model, 'elf_id')->textInput() ?>

    <?= $form->field($model, 'master_gnome_id')->textInput() ?>

    <?= $form->field($model, 'purporsed_at')->textInput() ?>

    <?= $form->field($model, 'conformed_at_elf')->textInput() ?>

    <?= $form->field($model, 'automatic')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
