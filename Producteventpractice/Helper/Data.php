<?php 
namespace Dotsquares\Producteventpractice\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
/**
 * 
 */
class Data extends AbstractHelper
{
    const MODULE_ENABLE = "productevent/general/display_text";

    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
    	Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
    	parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;        
        $this->_scopeConfig = $scopeConfig;
    }
	 /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    
     public function getDefaultConfig($path)
   {
       return $this->_scopeConfig->getValue($path, \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
   }
   
	 public function execute()
    {
        return $this->resultPageFactory->create();
    }
     /*
     * @return bool
     */
    public function isEnabled($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->_scopeConfig->isSetFlag(
            'productevent/general/enable',
            $scope
        );
    }
    public function getAdmintextnow($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
       return $this->getDefaultConfig(self::MODULE_ENABLE);
    }
    
  
	
}
