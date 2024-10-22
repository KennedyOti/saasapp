<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Gridphp\DataEntryForm;

class FormController extends Controller
{
    public function create(Request $request)
    {
        // Retrieve form parameters from the request or set defaults
        $formTitle = $request->input('title', 'Common Data Entry Form');
        // Use the correct table name from the documentation
        $parentTable = $request->input('parent_table', 'forms'); // Changed 'default_table' to 'forms'
        $childTable = $request->input('child_table', 'form_fields'); // Changed to match the child table from documentation

        // Generate the form using the DataEntryForm class
        $gridOutput = DataEntryForm::createForm($formTitle, $parentTable, $childTable);

        // Return the view with the grid rendered
        return view('forms.create', [
            'grid' => $gridOutput
        ]);
    }
}
