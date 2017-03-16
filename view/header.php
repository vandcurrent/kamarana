<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php title(); ?></title>

    <link rel="icon" type="image/ico" href="themes/images/favicon.ico">

    <link href="themes/css/bootstrap.min.css" rel="stylesheet">
    <link href="themes/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="themes/css/select2-bootstrap.css" rel="stylesheet">
    <link href="themes/css/select2.css" rel="stylesheet">
    <link href="themes/css/datepicker3.css" rel="stylesheet">
    <link href="themes/css/style.css" rel="stylesheet">
    <link href="themes/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="plugins/social-buttons/social-buttons.css" rel="stylesheet">

    <script src="themes/js/jquery-1.10.2.js"></script>
    <script src="themes/js/jquery-ui-1.10.4.min.js"></script>
    <script src="themes/js/bootstrap.min.js"></script>
    <script src="themes/js/bootstrapValidator.min.js"></script>
    <script src="themes/js/select2.min.js"></script>
    <script src="themes/js/select2_locale_id.js"></script>
    <script src="themes/js/bootstrap-datepicker.js"></script>
    <script src="themes/js/bootstrap-datepicker.id.js"></script>
    <script src="plugins/tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: "postContentEditor",
        theme: "modern",
        skin: "light",
        height: "300",
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>

    <!-- Main JS -->
    <script src="themes/js/main.js"></script>
</head>

<body>
<?php include("view/nav.php"); ?>