<?php

/**
 * Description of zone
 *
 * @author Faizan Ayubi
 */
class Zone extends Shared\Model {
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(4), max(255)
     * @label pincode
     */
    protected $_pincode;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(3)
     * @label full name
     */
    protected $_landmark;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(3), max(255)
     * @label city
     */
    protected $_city;
}
