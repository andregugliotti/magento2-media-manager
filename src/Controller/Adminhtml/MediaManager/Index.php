<?php
/**
 * Gugliotti Media Manager
 */
namespace Gugliotti\MediaManager\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Index
 * @author Andre Gugliotti <andre@gugliotti.com.br>
 * @since 0.1.0
 * @package Gugliotti\MediaManager
 * @license GNU General Public License, version 3
 */
class Index extends Action
{
    /**
     * Authorization level of a basic admin session
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Gugliotti_MediaManager::media_manager';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * execute
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Gugliotti_MediaManager::media');
        $resultPage->addBreadcrumb(__('CMS'), __('CMS'));
        $resultPage->addBreadcrumb(__('Media'), __('Media'));
        $resultPage->addBreadcrumb(__('Media Manager'), __('Media Manager'));
        $resultPage->getConfig()->getTitle()->prepend(__('Media Manager'));

        return $resultPage;
    }
}
