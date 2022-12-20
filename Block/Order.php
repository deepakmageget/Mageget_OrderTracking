<?php
namespace Mageget\OrderTracking\Block;

class Order extends \Magento\Framework\View\Element\Template
{    
  
     protected $_orderCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,       
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory 
    ) {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context);

    }


   public function getOrderCollection($increment_id)
   {
    try {
       $collection = $this->_orderCollectionFactory->create()
         ->addAttributeToSelect('*');
        //  ->addFieldToFilter('increment_id', $increment_id);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            throw new \Magento\Framework\Exception\LocalizedException(__('This order no longer exists.'));
         }
     return $collection;
     
    }


//    public function getOrderCollectionByCustomerId($customerId)
//    {
//        $collection = $this->_orderCollectionFactory()->create($customerId)
//          ->addFieldToSelect('*')
//          ->addFieldToFilter('status',
//                 ['in' => $this->_orderConfig->getVisibleOnFrontStatuses()]
//             )
//          ->setOrder(
//                 'created_at',
//                 'desc'
//             );
 
//      return $collection;

//     }
}