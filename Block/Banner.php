<?php

/**
 * A Magento 2 module named Magestat/CookieLawBanner
 *
 * This file included in Magestat/CookieLawBanner is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Magestat\CookieLawBanner\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Block\Product\Context;
use Magestat\CookieLawBanner\Helper\Data;

/**
 * @package \Magestat\CookieLawBanner\Block
 */
class Banner extends Template
{
    /**
     * @var Data
     */
    private $helperData;

    /**
     * @param Context $context
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->helperData = $helper;
    }

    /**
     * @inheritDoc
     */
    protected function _toHtml()
    {
        if (!$this->helperData->isActive()) {
            return '';
        }
        return parent::_toHtml();
    }

    /**
     * Retrieve banner title.
     *
     * @return null|string
     */
    public function getTitle()
    {
        return $this->helperData->getTitle();
    }

    /**
     * Retrieve banner message content.
     *
     * @return null|string
     */
    public function getMessage()
    {
        return $this->helperData->getMessage();
    }

    /**
     * Retrieve banner more info text.
     *
     * @return null|string
     */
    public function getInfoMessage()
    {
        return $this->helperData->getInfoMessage();
    }

    /**
     * Retrieve banner more info link to.
     *
     * @return null|string
     */
    public function getInfoLink()
    {
        return $this->helperData->getInfoLink();
    }

    /**
     * Retrieve banner accept button text.
     *
     * @return string
     */
    public function getButton()
    {
        $button = $this->helperData->getButton();
        if (empty($button)) {
            return __('Accept');
        }
        return $button;
    }

    /**
     * Responsible to vuild the style classes together.
     *
     * @return string
     */
    public function getAdditionalStyle()
    {
        return $this->getPosition() . $this->getDefaultStyle();
    }

    /**
     * Retrieve banner place position.
     *
     * @return string
     */
    private function getPosition()
    {
        $position = $this->helperData->getPosition();
        if (empty($position)) {
            return 'bottom-left';
        }
        return $position;
    }

    /**
     * Return class to apply default style from Magento.
     *
     * @return string
     */
    private function getDefaultStyle()
    {
        if ($this->helperData->isDefaultStyle()) {
            return ' default-style';
        }
    }
}
