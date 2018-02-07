<?php

class TM_AddAndPay_Model_Observer
{
    public function addToCartComplete(Varien_Event_Observer $observer)
    {
        if ($observer->getRequest()->getParam('return_url')) {
            return; // paypal express checkout button was clicked
        }

        if ($observer->getRequest()->getParam('redirect_to_checkout')) {
            $observer->getResponse()
                ->setRedirect(
                    Mage::helper('checkout/url')->getCheckoutUrl()
                );
            Mage::getSingleton('checkout/session')->setNoCartRedirect(true);
        }
    }
}
