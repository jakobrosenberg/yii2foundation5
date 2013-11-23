<?php
/**
 * Created by Jakob
 * Date: 23-11-13
 * Time: 09:57
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;

class FoundationModernizrAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['vendor/custom.modernizr.js'];
} 