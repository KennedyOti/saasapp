<?php

namespace App\Classes\Gridphp;

use App\Gridphp;

class ClientGrid
{
    public static function createClientGrid()
    {
        $grid = Gridphp::get();

        // Grid options
        $options = [
            "caption" => "Clients",
            "height" => "auto",
            "width" => "100%",
            "autowidth" => true,
            "sortable" => true,
            "editable" => true,
            "add" => true,
            "edit" => true,
            "delete" => true,
            "multiselect" => true,
            // Enable export options
            "export" => [
                "enabled" => true,  // Enable export
                "formats" => ["pdf", "excel", "csv", "html"],  // Supported formats
                "filename" => "clients_export",  // Default filename
                "heading" => "Client Data Export",  // Default heading
                "orientation" => "portrait",  // Default orientation
                "paper" => "A4",  // Default paper size
                "paged" => "all",  // Default to export all pages
                "range" => "all",  // Default to export all data
            ],
        ];
        $grid->set_options($options);

        // Define the table
        $grid->table = "clients";

        // Define the columns
        $columns = [
            ["title" => "ID", "name" => "id", "width" => "30", "editable" => false],
            ["title" => "Client Name", "name" => "client_name", "width" => "150", "editable" => true],
            ["title" => "Email", "name" => "email", "width" => "200", "editable" => true, "editrules" => ["email" => true]],
            ["title" => "Phone Number", "name" => "phone_number", "width" => "150", "editable" => true],
            ["title" => "Address", "name" => "address", "width" => "250", "editable" => true, "edittype" => "textarea"],
            ["title" => "Person In Charge", "name" => "person_in_charge", "width" => "200", "editable" => true],
            [
                "title" => "Date Joined",
                "name" => "date_joined",
                "width" => "150",
                "editable" => true,
                "formatter" => "datetime",
                "edittype" => "text",
                "editoptions" => [
                    "dataInit" => "function(el) { $(el).datetimepicker({dateFormat: 'yy-mm-dd', timeFormat: 'HH:mm:ss'}); }"
                ]
            ],
            [
                "title" => "Created At",
                "name" => "created_at",
                "width" => "150",
                "editable" => false,
                "formatter" => "datetime"
            ],
            [
                "title" => "Updated At",
                "name" => "updated_at",
                "width" => "150",
                "editable" => false,
                "formatter" => "datetime"
            ],
        ];
        $grid->set_columns($columns);

        // Render and return the grid
        return $grid->render("client_grid");
    }
}
