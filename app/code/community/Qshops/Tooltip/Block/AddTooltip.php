<?php
class Qshops_Tooltip_Block_AddTooltip extends Mage_Core_Block_Text
{
    protected $_nameInLayout = 'description';
    protected $_alias = 'description';
 
    public function setPassingTransport($transport)
    {
        $csv = Mage::getStoreConfig('tooltip/general/csv');

        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'qshops/tooltip/'.$csv;

        if (($handle = @fopen("$url", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {     
                $row++;
                
                $needle = $data[0];
                $data[1] = iconv(mb_detect_encoding($data[1], mb_detect_order(), true), "UTF-8", $data[1]);
                $replace ='<a class="qshops-tooltip" href="javascript:void()">'.$needle.'<span>'.$data[1].'</span></a>';

                $transport = str_replace($needle, $replace, $transport);

            }
            fclose($handle);
        
            $css = '
                <style>
                    /* Tooltip */

                    .qshops-tooltip {
                        position:relative;
                        z-index:24; 
                            border-bottom: 2px dotted #555;
                    }

                    .qshops-tooltip:hover{ z-index:25; }

                    .qshops-tooltip span{ display: none }

                    .qshops-tooltip:hover span {
                        display:block;
                        position:absolute;
                        bottom:2em; left:2em; width:15em;
                        border:1px solid #000;
                            border-radius: 5px;
                            box-shadow: 4px 4px 4px rgba(0,0,0,0.5);
                        background-color: #000; 
                        background-color: rgba(0,0,0,0.8); 
                            color:#fff;
                            font-weight: normal;
                            text-align: left;
                            padding: 5px;
                    }

                </style>
            ';
            return $transport.$css;
        }
        else {
            return $transport;
        }
    }
}
?>
