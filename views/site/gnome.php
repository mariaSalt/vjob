<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 21.06.19
 * Time: 15:30
 */


use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2> <?=Yii::$app->user->identity->fname?>'s page </h2>

    </div>

    <div class="body-content">

        <div class="row">
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



                <p><label><input type="hidden" value="2" name='User[role_id]'>
                        <input name='User[role_id]' type="checkbox" value="3" <?=$model->role_id == 3 ? 'checked' : null?>>  Master </label><br>



                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-lg-4 pull-right" >
                <h4> mined minerals </h4>
                <table class="table"> <tr>
                    <th>type</th>
                    <th>count</th>
                    </tr>
                <?php foreach ($jewels as $jewel) {
                    ?>
                    <tr> <td> <?=$jewel['type']?></td>
                        <td>
                            <?php $a=0;
                            for($i=0; $i<count($mined); $i++)
                            {
                                if ($mined[$i]['type_id']==$jewel['id'])
                                {++$a;}
                            }
                            echo $a;?> </td>
                    </tr>
                   <?php } ?>
                </table>
                </div>


            </div>
        </div>

    </div>
</div>
