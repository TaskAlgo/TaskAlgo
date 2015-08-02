<?php

/**
 * Description of payment
 *
 * @author Faizan Ayubi
 */
class Payment extends Shared\Model {

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
    protected $_amount;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_job;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(3)
     * @label status
     */
    protected $_status;
}
