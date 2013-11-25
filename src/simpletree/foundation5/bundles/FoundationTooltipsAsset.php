<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:52
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;

class FoundationTooltipsAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.tooltips.js'];
	public $depends = ['simpletree\foundation5\FoundationAsset'];
}