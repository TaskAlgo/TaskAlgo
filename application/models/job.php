<?php

/**
 * Description of job
 *
 * @author Faizan Ayubi
 */
class Job extends Shared\Model {

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
    protected $_task;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_location;

    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @label comment
     */
    protected $_comment;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_cost;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_scheduled;
    
    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @label status
     */
    protected $_status;
}
