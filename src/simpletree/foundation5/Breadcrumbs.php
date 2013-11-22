<?php
/**
 * Created by Jakob
 * Date: 12-09-13
 * Time: 21:28
 */

namespace simpletree\foundation5;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    /**
     * @var array the HTML attributes for the breadcrumb container tag.
     */
    public $options = array('class' => 'breadcrumbs');

    /**
     * @var string the template used to render each active item in the breadcrumbs. The token `{link}`
     * will be replaced with the actual HTML link for each active item.
     */
    public $activeItemTemplate = "<li class=\"current\">{link}</li>\n";

    /**
     * @var string the template used to render each unavailable item in the breadcrumbs. The token `{link}`
     * will be replaced with the actual HTML link for each active item.
     */
    public $unavailableItemTemplate = "<li class=\"unavailable\">{link}</li>\n";

    /**
     * Renders a single breadcrumb item.
     * @param array $link the link to be rendered. It must contain the "label" element. The "url" element is optional.
     * @param string $template the template to be used to rendered the link. The token "{link}" will be replaced by the link.
     * @return string the rendering result
     * @throws InvalidConfigException if `$link` does not have "label" element.
     */
    protected function renderItem($link, $template)
    {
        if (!isset($link['url']))
            $link['url'] = '#';

        if(isset($link['available']) && !$link['available'])
            $template = $this->unavailableItemTemplate;

        return parent::renderItem($link, $template);
    }
} 