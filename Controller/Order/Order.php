<?php

namespace Mageget\OrderTracking\Controller\Order;

class Order extends \Magento\Framework\App\Action\Action
{

// You need this so you can assign \M\S\M\Order in your constructor.
protected $_order;

protected $resultPageFactory;

public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Sales\Model\Order $_order, // <-- new line 
    \Magento\Framework\View\Result\PageFactory $resultPageFactory
)
{
    parent::__construct($context);
    $this->_order = $_order; // <-- new line
    $this->resultPageFactory = $resultPageFactory;
}


public function execute()
{


    $_orderId =49; 

    /** @var $_order \Magento\Sales\Model\Order  */
    $_order = $this->_order->load($_orderId);

    // Get all items from your order
    $_items = $_order->getAllItems();

    // Iterate through all of the items in the order
    foreach ($_items as $_item) {


        echo "<pre>";
        print_r($_item->getData());


        // Get sku, item_id and price
        // $_orderItems[] = [
        //     'sku' => $_item->getSku(),
        //     'item_id' => $_item->getId(),
        //     'price' => $_item->getPrice(),
        // ];

    }

    return $this->resultPageFactory->create(); 
}

}