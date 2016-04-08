<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>

    <!-- Photon -->
    <link href="{{ asset('assets/plugins/photon-ui/css/photon.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Sweet -->
    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Wrap your entire app inside .window -->
<div class="window">
    <!-- .toolbar-header sits at the top of your app -->
    <header class="toolbar toolbar-header">
        <h1 class="title">@yield("title")</h1>
        <div class="toolbar-actions">
            <div class="btn-group">
                <button class="btn btn-default">
                    <span class="icon icon-home"></span>
                </button>
                @yield("actions")
                <button class="btn btn-default btn-new-folder">
                    <span class="icon icon-plus"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Your app's content goes inside .window-content -->
    <div class="window-content">
        <div class="pane-group">
            <div class="pane-sm sidebar">
                @include("include.sidebar")
            </div>
            @yield("window-content")
        </div>
    </div>
</div>

<script src="{{ asset('assets/plugins/jquery/jquery-1.12.3.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
<script>
    $(".btn-new-folder").bind('click', function(){
        swal({
            title: "<span class='icon icon-folder'></span>",
            html: true,
            text: "New Folder Name",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write Folder Name"
        },function(inputValue){
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("Please write any folder name");
                return false
            }
            if(inputValue == "eray") {
                swal.showInputError("Folder already exists!");
            } else {
                swal.close();
                console.log(inputValue);
            }
        });
    });

    $(".table-file-manager tr").bind('click', function(){
        var path = $(this).data("path");
        window.location = "http://file.localhost/index.php?path="+path;
    });
</script>
</body>
</html>