<?php

namespace suver\users;
use yii\base\BootstrapInterface;
use Yii;

/**
 * user module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'suver\users\controllers';

    public $dataViewWidget = '\yii\widgets\DetailView';
    public $gridViewWidget = '\yii\grid\GridView';

    public $defaultUsersPerPage = 25;

    public $defaultRbakPerPage = 25;

    public $menu = [];

    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->id, 'route' => $this->id . '/default/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->id . '/<controller:[\w-]+>', 'route' => $this->id . '/<controller>/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->id . '/<controller:[\w-]+>/<id:[\d]+>', 'route' => $this->id . '/<controller>/view'],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->id . '/<controller:[\w-]+>/<action:[\w-]+>', 'route' => $this->id . '/<controller>/<action>'],
            ], false);
        } elseif ($app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'suver\users\commands';

            /*$app->controllerMap[$this->id] = [
                'class' => 'yii\gii\console\GenerateController',
                'generators' => array_merge($this->coreGenerators(), $this->generators),
                'module' => $this,
            ];*/
        }
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // инициализация модуля с помощью конфигурации, загруженной из config.php
        \Yii::configure($this, require(__DIR__ . '/config.php'));

        if(empty($this->menu)) {
            $this->menu = [
                [
                    'label' => 'Пользователи',
                    'icon' => 'fa fa-users',
                    'url' => ['/' . $this->id],
                    'alias' => [$this->id],
                    'items' => [
                        [
                            'label' => 'Права доступа',
                            'url' => ['/' . $this->id . '/permissions'],
                            'alias' => [$this->id . '/permissions'],
                        ],
                    ],
                ],
            ];
        }


        // custom initialization code goes here
    }
}
