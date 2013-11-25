<?php
/**
 * Created by Jakob
 * Date: 24-11-13
 * Time: 19:43
 */

namespace simpletree\foundation5\bundles;


class FoundationAbideAsset extends AssetBundle
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $js = ['foundation/foundation.abide.js'];
	public $depends = ['simpletree\foundation5\FoundationAsset'];
}