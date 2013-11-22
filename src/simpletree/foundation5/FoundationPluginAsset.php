<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace simpletree\foundation5;

use yii\base\View;
use yii\web\AssetBundle;

\Yii::setAlias('simpletree/foundation',__DIR__);
/**
 *
 * @author Jakob Rosenberg <jakobrosenberg@gmail.com>
 */
class FoundationPluginAsset extends AssetBundle
{
	public $sourcePath = '@simpletree/foundation/assets';
	public $js = array(
		'js/foundation/foundation.js',
		'js/foundation/foundation.forms.js',
	);
    public $jsOptions = array(
//        'position' => View::POS_HEAD,
    );
	public $depends = array(
		'yii\web\JqueryAsset',
		'simpletree\foundation5\FoundationAsset',
	);

    public function registerAssetFiles($view)
    {
        $view->registerJs('$(document).foundation();', $view::POS_END);
        parent::registerAssetFiles($view);
    }
}
