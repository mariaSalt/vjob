<?php
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Hello, <?=Yii::$app->user->identity->fname?></h2>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h4>Today you mined : </h4>
<?php
$form = ActiveForm::begin();
foreach ($jewels as $jewel) {
?> <p><label> <input name='Mined[<?=$jewel['id']?>]' class="form-control" type="number" min=0 value="0">  <?=$jewel['type']?> </label><br>
                    <?php }
                    ?> <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
                <?php
                ActiveForm::end()
                ?>

            </div>
        </div>

    </div>
</div>