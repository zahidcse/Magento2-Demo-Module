<?php
/**
 *
 * Copyright © 2015 Itheavencommerce. All rights reserved.
 */
namespace Itheaven\Magepress\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

	/**
     * @var \Magento\Framework\App\Cache\TypeListInterface
     */
    protected $_cacheTypeList;

    /**
     * @var \Magento\Framework\App\Cache\StateInterface
     */
    protected $_cacheState;

    /**
     * @var \Magento\Framework\App\Cache\Frontend\Pool
     */
    protected $_cacheFrontendPool;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $blogmodel;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param \Magento\Framework\App\Cache\StateInterface $cacheState
     * @param \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\App\Cache\StateInterface $cacheState,
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Itheaven\Magepress\Model\Index $magemodel
    ) {
        parent::__construct($context);
        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheState = $cacheState;
        $this->_cacheFrontendPool = $cacheFrontendPool;
        $this->resultPageFactory = $resultPageFactory;
        $this->blogmodel = $magemodel;
    }
	
    /**
     * Flush cache storage
     *
     */
    public function execute()
    {
        
        $newsModel = $this->blogmodel;
        // Load the item with ID is 1
        $item = $newsModel->load(1);
       
 
        // Get news collection
        //$newsCollection = $newsModel->getCollection();
        // Load all data of collection
        //var_dump($newsCollection->getData());
        
         /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getLayout()->initMessages();
         $resultPage->getConfig()->getTitle()->set(__('Blogs'));
 
        // Add breadcrumb
        /** @var \Magento\Theme\Block\Html\Breadcrumbs */
        $breadcrumbs = $resultPage->getLayout()->getBlock('breadcrumbs');
        $breadcrumbs->addCrumb('home',
            [
                'label' => __('Home'),
                'title' => __('Home'),
                'link' => $this->_url->getUrl('')
            ]
        );
        $breadcrumbs->addCrumb('itheaven_magepress',
            [
                'label' => __('Blogs'),
                'title' => __('Blogs')
            ]
        );
        $resultPage->getLayout()->getBlock('magepress_index_index')->setvalue($item);
        return $resultPage;
        
    }
}
