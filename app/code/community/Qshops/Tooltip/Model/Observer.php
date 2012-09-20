<?php
class Qshops_Tooltip_Model_Observer
{
    const MODULE_NAME = 'Qshops_Tooltip';
     
    public function AddTooltip($observer = NULL)
    {
        if (!$observer) { 
            return;
        }
        
        if ('description' == $observer->getEvent()->getBlock()->getNameInLayout()) {
 
            if (!Mage::getStoreConfig('advanced/modules_disable_output/'.self::MODULE_NAME) && Mage::getStoreConfig('tooltip/general/enabled')) {
 
                $transport = $observer->getEvent()->getTransport();
                
                $block = new Qshops_Tooltip_Block_AddTooltip();
                $transport['html'] = $block->setPassingTransport($transport['html']);
            }
        }
 
        return $this;
    }
}
?>
