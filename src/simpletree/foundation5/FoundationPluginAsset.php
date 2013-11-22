<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace simpletree\foundation5;

use yii\base\View;
use yii\web\AssetBundle;

\Yii::setAlias('simpletree/foundation5',__DIR__);
/**
 *
 * @author Jakob Rosenberg <jakobrosenberg@gmail.com>
 */
class FoundationPluginAsset extends AssetBundle
{
	public $sourcePath = '@simpletree/foundation5/assets';
	public $js = array(
		'js/foundation/foundation.js',
		'js/foundation/foundation.forms.js',
	);
	public $depends = array(
		'yii\web\JqueryAsset',
		'simpletree\foundation5\FoundationAsset',
	);

	/**
	 * @param \yii\web\View $view
	 */
	public function registerAssetFiles($view)
    {
        $view->registerJs('$(document).foundation();', $view::POS_END);
        parent::registerAssetFiles($view);
    }
}

class FoundationPluginBaseAsset extends AssetBundle {
	public $sourcePath = '@simpletree/foundation5/assets';
	public $depends = array(
		'simpletree\foundation5\FoundationPluginAsset',
	);
}

class FoundationaTopbarAsset extends FoundationPluginBaseAsset
{
	public $js = ['js/foundation/foundation.atopbar.js'];
}

class FoundationAbideAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.abide.js']; }
class FoundationAlertsAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.alerts.js']; }
class FoundationClearingAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.clearing.js']; }
class FoundationCookieAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.cookie.js']; }
class FoundationDropdownAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.dropdown.js']; }
class FoundationFormsAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.forms.js']; }
class FoundationInterchangeAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.interchange.js']; }
class FoundationJoyrideAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.joyride.js']; }
class FoundationMagellanAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.magellan.js']; }
class FoundationOrbitAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.orbit.js']; }
class FoundationPlaceholderAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.placeholder.js']; }
class FoundationRevealAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.reveal.js']; }
class FoundationSectionAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.section.js']; }
class FoundationTooltipsAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.tooltips.js']; }
class FoundationTopbarAsset extends FoundationPluginBaseAsset { public $js = ['js/foundation/foundation.topbar.js']; }