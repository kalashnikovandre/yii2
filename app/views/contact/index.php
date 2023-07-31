<?php

use app\models\Contact;
use floor12\phone\PhoneFormatter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавить контакт';
$this->params['breadcrumbs'][] = $this->title;

/** @var Contact $contact */
?>

<div class="container">
    <div class="block contact-form">
        <div class="row">
            <span class="header-text">Добавить контакт</span>
        </div>
        <div class="row">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($contact, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>

            <?= $form->field($contact, 'phone')->textInput(['placeholder' => 'Телефон'])->label(false) ?>

            <div class="form-group clearfix mb-0">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-success float-end']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="block contacts-list">
        <div class="row">
            <span class="header-text">Список контактов</span>
        </div>
        <?php /** @var Contact[] $contacts */
        foreach ($contacts as $contact): ?>
            <div class="row">
                <div class="user-name">
                    <?= Html::encode($contact->name) ?>
                    <?= Html::a('<div class="close"></div>', ['delete', 'id' => $contact->id], ['class' => 'delete-button', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите удалить этот контакт?']) ?>
                </div>
                <div class="user-phone"><?= PhoneFormatter::format($contact->phone) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
