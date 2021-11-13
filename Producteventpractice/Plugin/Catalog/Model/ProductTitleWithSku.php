<?php

namespace Dotsquares\Producteventpractice\Plugin\Catalog\Model;

class ProductTitleWithSku
{
    protected $dataHelper;
    public function __construct(\Dotsquares\Producteventpractice\Helper\Data $dataHelper)
{ $this->dataHelper = $dataHelper; }
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $helper = $this->dataHelper;
        $title = $helper->getAdmintextnow();
        return $title." - ". $result;
    }
}