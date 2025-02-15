<?php

namespace Calculogic\Includes;

class Calculogic_Workflow {

    public static function sum_fields($fields) {
        $sum = 0;
        foreach ($fields as $field) {
            $sum += intval($field);
        }
        return $sum;
    }

    public static function filter_fields($fields, $condition) {
        return array_filter($fields, $condition);
    }

    public static function sort_fields($fields, $order = 'desc') {
        if ($order === 'asc') {
            sort($fields);
        } else {
            rsort($fields);
        }
        return $fields;
    }

    public static function map_fields($fields, $function) {
        return array_map($function, $fields);
    }

    public static function helper_function($fields, $expression) {
        // Implement custom logic based on the expression
        // Example: concatenate strings, perform advanced math, etc.
        // This is a placeholder for more complex logic
        return eval($expression);
    }
}