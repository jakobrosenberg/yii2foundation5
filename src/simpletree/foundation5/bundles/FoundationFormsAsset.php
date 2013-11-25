<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:49
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;

class FoundationFormsAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.forms.js'];
}
