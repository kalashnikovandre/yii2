<?php

namespace app\controllers;

use app\models\Contact;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\Response;

class ContactController extends Controller
{
    public $layout = 'empty';

    public function actionIndex()
    {
        $contact = new Contact();
        if ($contact->load(Yii::$app->request->post()) && $contact->save()) {
            Yii::$app->session->setFlash('success', 'Контакт успешно добавлен.');
            return $this->redirect(['index']);
        } elseif ($contact->getErrors()) {
            Yii::$app->session->setFlash('error', 'Не удалось сохранить контакт.');
        }

        $contacts = Contact::find()->all();
        return $this->render('index', compact('contacts', 'contact'));
    }

    /**
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id): Response
    {
        $contact = Contact::findOne($id);

        if ($contact) {
            $contact->delete();
            Yii::$app->session->setFlash('success', 'Контакт успешно удален.');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при удалении контакта.');
        }

        return $this->redirect(['index']);
    }
}
