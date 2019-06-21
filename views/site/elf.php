<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2><?=Yii::$app->user->identity->fname?>'s page</h2>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h4> specify your preferences </h4>
                <?php
                $form = ActiveForm::begin();
                foreach ($jewels as $jewel) {
                ?> <p><label><input type="hidden" value="0" name='Priority[<?=$jewel['id']?>]'>
                        <input name='Priority[<?=$jewel['id']?>]' type="checkbox" value="1">  <?=$jewel['type']?> </label><br>
                    <?php }
                    ?> <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
                <?php
                ActiveForm::end()
                ?>

            </div>
            <div class="col-lg-4">
                <h4> information about you </h4>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'fname')->textInput() ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?php //$model->role_id=2 ?>

                last login : <?=date('l jS \of F Y h:i:s A', $model->last_login)?> <br>

                last logout : <?=date('l jS \of F Y h:i:s A', $model->last_logout)?> <br>

                <?php // $form->field($model, 'role_id')->checkbox(['value'=>3,'label'=>" Master" ]) ?>


                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>


        </div>


    </div>
</div>