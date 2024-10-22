<?php

namespace App\Classes\Gridphp;

use App\Gridphp;

class DataEntryForm
{
    public static function createForm($title, $parentTable, $childTable = null)
    {
        // Initialize GridPHP
        $grid = Gridphp::get();

        // Grid options
        $options = [
            "caption" => $title,
            "height" => "auto",
            "width" => "100%",
            "autowidth" => true,
            "sortable" => true,
            "editable" => true,
        ];
        $grid->set_options($options);

        // Define the table (Parent table)
        $grid->table = $parentTable;

        // Set child relationship if available
        if ($childTable) {
            // Select specific columns to avoid duplicate column errors
            $grid->select_command = "
                SELECT 
                    p.id AS parent_id, 
                    p.*, 
                    c.id AS child_id, 
                    c.*
                FROM $parentTable p
                LEFT JOIN $childTable c ON p.id = c.form_id
            ";
        }

        // Return the rendered grid
        return $grid->render("form_grid");
    }
}
