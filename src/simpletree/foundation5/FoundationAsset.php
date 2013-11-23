<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace simpletree\foundation5;



use Yii;
use yii\web\View;
use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use yii\base\ErrorException;


/**
 * @author Jakob Rosenberg <jakobrosenberg@gmail.com>
 */
class FoundationAsset extends AssetBundle
{
	public $sourcePath = '@simpletree/foundation5/assets';

	public $css = array(
//		'css/app.css',
	);
    public $jsOptions = array(
        'position'=>View::POS_HEAD
    );

	public $depends = [
		'simpletree\foundation5\bundles\FoundationModernizrAsset',
		'simpletree\foundation5\bundles\FoundationStylesheetAsset'
	];

	public function registerAssetFiles($view)
	{
		$view->registerMetaTag([
			"name" => "viewport",
			"content" => "initial-scale=1.0"]);
		parent::registerAssetFiles($view);
	}


}

