<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:43
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;
use yii\web\View;

class FoundationJsAsset extends AssetBundle
{
	public $jsOptions = array(
		'position'=>View::POS_END
	);
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.js'];
}