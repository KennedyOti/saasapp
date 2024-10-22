<?php

namespace App\Classes\Gridphp;

use App\Gridphp;

class AppGrid
{
    public static function createAppGrid($clientId)
    {
        $grid = Gridphp::get();

        // Grid options
        $options = [
            "caption" => "Applications for Client ID: " . $clientId,
            "height" => "auto",
            "width" => "100%",
            "autowidth" => true,
            "sortable" => true,
            "editable" => true,
            "add" => true,
            "edit" => true,
            "delete" => true,
        ];
        $grid->set_options($options);

        // Define the table
        $grid->table = "apps";

        // Define the columns
        $columns = [
            ["title" => "ID", "name" => "id", "width" => "30", "editable" => false],
            ["title" => "App Name", "name" => "app_name", "width" => "150", "editable" => true],
            ["title" => "Description", "name" => "description", "width" => "250", "editable" => true, "edittype" => "textarea"],
            [
                "title" => "Client ID",
                "name" => "client_id",
                "editable" => false,
                "hidden" => true,
                "default" => $clientId,
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

        // Set the select command to filter apps by client ID
        $grid->select_command = "SELECT * FROM apps WHERE client_id = $clientId";

        // Add event handler for inserting a new record
        $grid->actions["add"] = [
            "onclick" => function ($data) use ($clientId) {
                $data["params"]["client_id"] = $clientId; // Explicitly set the client_id before insertion
                return true; // Proceed with the insertion
            }
        ];

        // Set the grid actions
        $grid->set_actions([
            "add" => true,
            "edit" => true,
            "delete" => true,
        ]);

        // Render and return the grid
        return $grid->render("app_grid");
    }
}
