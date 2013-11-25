<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:48
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;

class FoundationCookieAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.cookie.js'];
	public $depends = ['simpletree\foundation5\FoundationAsset'];
}