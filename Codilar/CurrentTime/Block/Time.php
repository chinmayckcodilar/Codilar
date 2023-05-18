<?php
/**
 *
 * @package     magento2
 * @author      Codilar Technologies
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License v. 3.0 (OSL-3.0)
 * @link        https://www.codilar.com/
 */

namespace Codilar\CurrentTime\Block;

use Magento\Framework\View\Element\Template;

class Time extends Template
{
    public function getText() {
        return "Hello World";
    }
    public function getCurrentTime()
    {
        date_default_timezone_set('Asia/Kolkata');
        $current_time = date('h:i:s A');
        return $current_time;
    }
}