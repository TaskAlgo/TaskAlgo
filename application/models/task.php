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
     * @validate required, alpha, min(3)
     * @label title
     */
    protected $_title;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate min(3)
     * @label description
     */
    protected $_description;
}
