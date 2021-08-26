<?php
namespace AHT\CustomChekout\Observer;

class SaveCheckout implements \Magento\Framework\Event\ObserverInterface
{
    protected $_quoteFactory;

    public function __construct(\Magento\Quote\Model\QuoteFactory $quoteFactory)
    {
        $this->_quoteFactory = $quoteFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        try {
            $order = $observer->getEvent()->getOrder();
            $quoteId = $order->getQuoteId();
            $quote  = $this->_quoteFactory->create()->load($quoteId);
            $order->setData('delivery_date', $quote->getDeliveryDate());
            $order->setData('delivery_comment', $quote->getDeliveryComment());
            $order->save();
        }catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
}
