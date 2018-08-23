<?php
namespace common\components;

use yii\base\BaseObject;
use yii\web\UrlRuleInterface;

class CatUrlRule extends BaseObject implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
        if ($route == 'cats/view' && !empty($params['name'])) {
            return 'cat/'.$params['name'];
        }
        return false;
    }

    public function parseRequest($manager, $request)
    {
        $path = $request->getPathInfo();
        if (preg_match('#^cat/([^\/]+)$#', $path, $matches)) {
            $name = $matches[1];
            return ['cats/view', ['name' => $name]];
        }
        return false;
    }
}