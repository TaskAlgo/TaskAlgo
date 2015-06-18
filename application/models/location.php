<?php

/**
 * Description of location
 *
 * @author Faizan Ayubi
 */
class Location extends Shared\Model {
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, alpha, min(3), max(255)
     * @label full name
     */
    protected $_address;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, alpha, min(3), max(255)
     * @label full name
     */
    protected $_latitude;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, alpha, min(3), max(255)
     * @label full name
     */
    protected $_longitude;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_zone;
}
