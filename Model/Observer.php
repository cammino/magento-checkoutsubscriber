<?php
class Cammino_Checkoutsubscriber_Model_Observer {
    public function subscribe($observer) {
        $quote = $observer->getEvent()->getQuote();
        $customer = $quote->getCustomer();

        switch ($quote->getCheckoutMethod()){
            case Mage_Sales_Model_Quote::CHECKOUT_METHOD_REGISTER:
                $customer->setIsSubscribed(1);
                break;
            case Mage_Sales_Model_Quote::CHECKOUT_METHOD_LOGIN_IN:
                $customer->setIsSubscribed(1);
                break;
        }
    }
}