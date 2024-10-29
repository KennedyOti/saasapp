<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Clients Management</title>

    <!-- Default Theme CSS -->
    <link id="theme-css" rel="stylesheet" href="{{ asset('assets/gridphp/themes/redmond/jquery-ui.custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/gridphp/jqgrid/css/ui.jqgrid.css') }}">

    <!-- Include jQuery and jqGrid -->
    <script src="{{ asset('assets/gridphp/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/gridphp/themes/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('assets/gridphp/jqgrid/js/i18n/grid.locale-en.js') }}"></script>
    <script src="{{ asset('assets/gridphp/jqgrid/js/jquery.jqGrid.min.js') }}"></script>

    <script type="text/javascript">
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        // Function to change themes dynamically
        function changeTheme(theme) {
            var themeCssPath = "{{ asset('assets/gridphp/themes/') }}/" + theme + "/jquery-ui.custom.css";
            document.getElementById('theme-css').setAttribute('href', themeCssPath);
        }
    </script>
</head>

<body>
    <div>
        <label for="theme-selector">Select Theme:</label>
        <select id="theme-selector" onchange="changeTheme(this.value)">
            <option value="redmond">Redmond</option>
            <option value="smoothness">Smoothness</option>
            <option value="south-street">South Street</option>
            <option value="start">Start</option>
            <option value="sunny">Sunny</option>
            <option value="swanky-purse">Swanky Purse</option>
            <option value="trontastic">Trontastic</option>
            <option value="ui-darkness">UI Darkness</option>
            <option value="ui-lightness">UI Lightness</option>
            <option value="vader">Vader</option>
        </select>
    </div>

    <!-- Grid Output -->
    <div>{!! $grid !!}</div>
</body>

</html>
