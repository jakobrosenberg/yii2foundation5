<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:50
 */

namespace simpletree\foundation5\bundles;


use yii\web\AssetBundle;

class FoundationJoyrideAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.joyride.js'];
	public $depends = ['simpletree\foundation5\FoundationAsset'];
}