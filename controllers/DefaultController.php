<?php

namespace suver\users\controllers;

use yii\web\Controller;

/**
 * Default controller for the `settings` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionView($id)
    {

        return $this->render('index');
    }
}
