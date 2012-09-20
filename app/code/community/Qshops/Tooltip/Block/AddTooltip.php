<?php
class Qshops_Tooltip_Block_AddTooltip extends Mage_Core_Block_Text
{
    protected $_nameInLayout = 'description';
    protected $_alias = 'description';
 
    public function setPassingTransport($transport)
    {
        $csv = Mage::getStoreConfig('tooltip/general/csv');
        debug(gettype($csv));
        //$csv = str_replace('/', '\\', $csv);
        debug($csv);
        $url = Mage::getBaseDir('media').DS.'qshops'.DS.'tootip'.DS.$csv;
        debug($url);
        debug(file_exists($url));
        if (($handle = @fopen("$url", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {     
                $row++;

                $data[0] = str_replace("ö", "&ouml;", $data[0]);
                $data[0] = str_replace("Ö", "&Ouml;", $data[0]);
                $data[0] = str_replace("ä", "&auml;", $data[0]);
                $data[0] = str_replace("Ä", "&Auml;", $data[0]);
                $data[0] = str_replace("ü", "&uuml;", $data[0]);
                $data[0] = str_replace("Ü", "&Uuml;", $data[0]);
                $data[0] = str_replace("ß", "&szlig;", $data[0]);
                $data[0] = str_replace("€", "&euro;", $data[0]);
                $data[0] = str_replace("<", "&lt;", $data[0]);
                $data[0] = str_replace(">", "&gt;", $data[0]);
                $data[0] = str_replace("©", "&copy;", $data[0]);

                $needle = $data[0];
                $replace ='<a style="color: red;" class="tooltip" href="javascript:void()">'.$needle.'<span>'.$data[1].'</span></a>';

                $transport = str_replace($needle, $replace, $transport);

            }
            fclose($handle);
        }
        
        return $transport;
    }
}
?>
