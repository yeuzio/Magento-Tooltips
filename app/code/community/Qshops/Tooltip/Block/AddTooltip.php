<?php
class Qshops_Tooltip_Block_AddTooltip extends Mage_Core_Block_Text
{
    protected $_nameInLayout = 'description';
    //protected $_alias = 'description';
 
    public function setPassingTransport($transport)
    {
        $this->setData('text', $transport.$this->_generateTooltipDescription());
    }
 
    private function _generateTooltipDescription()
    {
        
        
        /*
        return '
            <script type="text/javascript">
            //<![CDATA[
 
            document.observe("dom:loaded", function() {
                $("qty").replace(\'<select class="input-text qty" title="Qty" value="1" id="qty" name="qty"><option selected="selected" value="1">1</option><option value="2">2</option><option value="3">3</option></select>\');
            });
 
            //]]>
            </script>
        ';
         * */
        
        
         return '
            <script type="text/javascript">
                window.alert("test1");
            </script>
         ';
    }
}
?>
