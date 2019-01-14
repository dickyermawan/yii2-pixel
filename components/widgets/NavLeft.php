<?php

namespace app\components\widgets;
use yii\base\InvalidConfigException;
use yii\bootstrap\Html;
use yii\bootstrap\Nav as BootstrapNav;
use yii\helpers\ArrayHelper;

/**
 * Class NavLeft
 *
 * @package app\components\widgets
 */
class NavLeft extends BootstrapNav
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        // load from parent class
        parent::init();
        $this->dropdownClass = 'app\components\widgets\DropdownLeft';

        // this will remove adding 'nav' class to the object
        Html::removeCssClass($this->options, ['widget' => 'nav']);
    }
    /**
     * Renders a widget's item.
     * @param string|array $item the item to render.
     * @return string the rendering result.
     * @throws InvalidConfigException
     */
    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }

        // auto add
        if (empty($items)) {
            Html::addCssClass($options, ['widget' => 'px-nav-item']);
            $items = '';
        } else {
            // Html::addCssClass($options, ['widget' => 'px-nav-item px-nav-dropdown px-open']);
            Html::addCssClass($options, ['widget' => 'px-nav-item px-nav-dropdown']);
            if (is_array($items)) {
                $items = $this->isChildActive($items, $active);
                $items = $this->renderDropdown($items, $item);
            }
        }

        if ($active) {
            Html::addCssClass($options, 'active');
        }

        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }
}