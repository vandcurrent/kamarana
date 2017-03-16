<?php
switch($_GET['ref']) {
    default :
        include "view/homepage.php";
    break;

    case "explore":
        include "view/explore.php";
    break;
            
    case "create_post":
        include "view/post.php";
    break;

    case "edit_post":
        include "view/post.php";
    break;
            
    case "view_post":
        include "view/post-view.php";
    break;

    case "view_profile":
        include "view/profile-view.php";
    break;

    case "edit_profile";
        include "view/profile-edit.php";
    break;

    case "auth":
        include "view/auth.php";
    break;
    case "about":
        include "view/about.php";
    break;
}
?>