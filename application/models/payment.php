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
     * @type integer
     */
    protected $_user;
}
