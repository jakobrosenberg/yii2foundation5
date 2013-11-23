<?php
/**
 * Created by Jakob
 * Date: 23-11-13
 * Time: 09:58
 */

namespace simpletree\foundation5\bundles;


class FoundationBasePluginAsset
{
	public $sourcePath = '@vendor/zurb/foundation/js';
	public $depends = array(
		'simpletree\foundation5\FoundationPluginAsset',
	);
} 