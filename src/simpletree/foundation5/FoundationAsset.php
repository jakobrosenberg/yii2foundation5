<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace simpletree\foundation5;


use yii\web\AssetBundle;
use Yii;


/**
 * @author Jakob Rosenberg <jakobrosenberg@gmail.com>
 */
class FoundationAsset extends AssetBundle
{
	public $sourcePath = '@simpletree/foundation5/assets';
	public $css = ['foundation.css'];
	public $depends = [
		'yii\web\JqueryAsset',
		'simpletree\foundation5\bundles\FoundationModernizrAsset',
		'simpletree\foundation5\bundles\FoundationJsAsset',
		'simpletree\foundation5\bundles\FoundationFormsAsset',
	];

	public function registerAssetFiles($view)
	{
		$view->registerMetaTag([
			"name" => "viewport",
			"content" => "initial-scale=1.0"]);
		$view->registerJs('$(document).foundation();', $view::POS_END);
		parent::registerAssetFiles($view);
	}

}

