<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:51
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;

class FoundationOrbitAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.orbit.js'];
	public $depends = ['simpletree\foundation5\FoundationAsset'];
}