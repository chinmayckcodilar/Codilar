<?php
namespace Codilar\VendorTable\Plugin;

class Cart
{
    public function beforeaddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null)
    {
        $requestInfo['qty'] = 2;

        return array($productInfo, $requestInfo);
    }


}
