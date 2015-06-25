<?php

/**
 * Description of task
 *
 * @author Faizan Ayubi
 */
class Task extends Shared\Model {
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(3)
     * @label title
     */
    protected $_title;
    
    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @validate min(3)
     * @label description
     */
    protected $_description;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_parent;
}
