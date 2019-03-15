<?php
/**
 * Observer.php
 *
 * @category Cammino
 * @package  Cammino_Checkoutsubscriber
 * @author   Cammino Digital <suporte@cammino.com.br>
 * @license  http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link     https://github.com/cammino/magento-checkoutsubscriber
 */

class Cammino_Checkoutsubscriber_Model_Observer
{
    /**
     * Function responsible for add customer as subscriber
     * after finish order
     *
     * @param string $observer Magento default observer
     *
     * @return null
     */
    public function subscribe($observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $customer = $quote->getCustomer();

        switch ($quote->getCheckoutMethod()) {
        case Mage_Sales_Model_Quote::CHECKOUT_METHOD_REGISTER:
            $customer->setIsSubscribed(1);
            break;

        case Mage_Sales_Model_Quote::CHECKOUT_METHOD_LOGIN_IN:
            $customer->setIsSubscribed(1);
            break;
        }
    }
}