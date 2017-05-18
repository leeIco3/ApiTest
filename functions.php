<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 17/05/2017
 * Time: 11:47
 */


function pre_r($v, $str = null, $return = false, $limit = 5, $class = ''){
    if(is_object($v) || is_array($v)){
        $v = parse_print_r($v, $limit);
    }

    //print "<pre style='white-space : normal'>\n";
    $output = "<pre class=\"{$class}\">\n";
    if($str != null){
        $output .= $str."\n";
    }
    $output .= print_r($v, true);
    $output .= "</pre>\n";

    if($return === true){
        return $output;
    }
    else{
        echo $output;
    }
}

/**
 * Parses print r (yes thats right :) parses pre_r into an array.
 * this has been set to ignore the db connection class
 *
 */
function parse_print_r($data, $level = 5){
    static $innerLevel = 1;
    static $tabLevel = 1;
    static $cache = array();

    $self = __FUNCTION__;

    $type       = gettype($data);
    $tabs       = str_repeat('    ', $tabLevel);
    $quoteTabes = str_repeat('    ', $tabLevel - 1);

    $recrusiveType = array('object', 'array');
    $output        = "";

    // Recrusive
    if(in_array($type, $recrusiveType)){
        // If type is object, try to get properties by Reflection.
        if($type == 'object'){
            if(in_array($data, $cache)){
                return "\n{$quoteTabes}*RECURSION*\n";
            }

            // Cache the data
            $cache[] = $data;

            $output     = get_class($data).' '.ucfirst($type);
            $ref        = new ReflectionObject($data);
            $properties = $ref->getProperties();

            $elements = array();

            foreach($properties as $property){

                $property->setAccessible(true);

                $pType = $property->getName();

                if(get_class($data) == "DatabaseMysqli"){
                    continue;
                }
                if($property->getName() == "_cached_loading"){
                    continue;
                }

                if($property->isProtected()){
                    $pType .= ":protected";
                }
                elseif($property->isPrivate()){
                    $pType .= ":".$property->class.":private";
                }

                if($property->isStatic()){
                    $pType .= ":static";
                }

                //cannot acces statics as they are private
                if(false && $property->isStatic()){
                    ob_start();
                    print_r($data);
                    $output .= ob_get_clean();
                }
                else{
                    $elements[$pType] = $property->getValue($data);
                }
            }
        }
        // If type is array, just retun it's value.
        elseif($type == 'array'){
            $output   = ucfirst($type);
            $elements = $data;
        }

        // Start dumping datas
        if($level == 0 || $innerLevel < $level){
            // Start recrusive print
            $output .= "\n{$quoteTabes}(";

            foreach($elements as $key => $element){
                $output .= "\n{$tabs}[{$key}] => ";

                // Increment level
                $tabLevel = $tabLevel + 2;
                $innerLevel++;

                $output .= in_array(gettype($element), $recrusiveType)? $self($element, $level): $element;

                // Decrement level
                $tabLevel = $tabLevel - 2;
                $innerLevel--;
            }

            $output .= "\n{$quoteTabes})\n";
        }
        else{
            $output .= "\n{$quoteTabes}*MAX LEVEL*\n";
        }
    }

    // Clean cache
    if($innerLevel == 1){
        $cache = array();
    }

    return $output;
}