<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View; // Add this use statement

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = 'Update Employee: ' . $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name . ' ' . $model->last_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="employee-form">

        <?php $form = ActiveForm::begin(['id' => 'employee-form']); ?>

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hire_date')->textInput() ?>

        <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'id' => 'update-button', 'disabled' => true]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?= Html::a('Back to Employees', ['index'], ['class' => 'btn btn-lilac']) ?>

    </div>

</div>

<?php
$this->registerJs(
    <<<JS
    const form = document.getElementById('employee-form');
    const updateButton = document.getElementById('update-button');
    const initialFormData = new FormData(form);

    form.addEventListener('input', () => {
        const currentFormData = new FormData(form);
        let changed = false;
        for (const [name, value] of currentFormData) {
            if (initialFormData.get(name) !== value) {
                changed = true;
                break;
            }
        }
        updateButton.disabled = !changed;
    });
JS,
    View::POS_READY
);
?>