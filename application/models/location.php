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
     * @validate required, min(3), max(255)
     * @label street name
     */
    protected $_street;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_zone;
}
