<?php
class Qshops_Tooltip_Model_Observer
{
    const MODULE_NAME = 'Qshops_Tooltip';
     
    public function AddTooltip($observer = NULL)
    {
        if (!$observer) { 
            return;
        }
        
        //debug($observer->getEvent()->getBlock()->getNameInLayout());
        /*
        if ('description' == $observer->getEvent()->getBlock()->getNameInLayout()) {
            $transport = $observer->getEvent()->getTransport();
            debug($transport);
        }
        */
        if ('description' == $observer->getEvent()->getBlock()->getNameInLayout()) {
 
            if (!Mage::getStoreConfig('advanced/modules_disable_output/'.self::MODULE_NAME)) {
 
                $transport = $observer->getEvent()->getTransport();
                debug($transport);
                
                $block = new Qshops_Tooltip_Block_AddTooltip();
                $block->setPassingTransport($transport['html']);
                $block->toHtml();
            }
        }
 
        return $this;
    }
}
?>
