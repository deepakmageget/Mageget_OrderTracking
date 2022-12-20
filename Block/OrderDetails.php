<?php
namespace Mageget\OrderTracking\Block;

class OrderDetails extends \Magento\Framework\View\Element\Template
{
    protected $_order;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        
        \Magento\Sales\Model\Order $_order,
        array $data = []
    ) {
        $this->_order = $_order;
        parent::__construct($context, $data);
    }

    /* Load Order data by order_id */
    public function getOrderData($order_id)
    {
        try {
        $_order = $this->_order->load($order_id);
        // Get all items from your order
        $_items = $_order->getAllItems();

          } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
              throw new \Magento\Framework\Exception\LocalizedException(__('This order no longer exists.'));
           }
        return  $_items;

    }

}