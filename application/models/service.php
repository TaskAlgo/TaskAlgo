<?php

/**
 * Description of service
 *
 * @author Faizan Ayubi
 */
class Service extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_user;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_zone;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_task;
}
