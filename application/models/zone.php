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
     * @validate required, alpha, min(3), max(255)
     * @label full name
     */
    protected $_pincode;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, alpha, min(3), max(255)
     * @label full name
     */
    protected $_city;
}
