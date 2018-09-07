<?php
function query_check($q)
{
    global $connection;
    if (!$q) {
        die("MySQL Query Failed.<br>" . mysqli_error($connection));
    }
    return true;
}

function redirect($location = 'ComingSoon.php')
{
    header("Location: $location");
    exit;
}

function getUserById($id)
{
    global $connection;
    $user = mysqli_query($connection, "SELECT * FROM `user` WHERE `id`=$id");
    query_check($user);

    return mysqli_fetch_array($user);
}

function isAuthorized()
{
    session_start();
    if (!isset($_SESSION['user_id'])) {
        redirect();
    }
}

function flash_message()
{
    if (isset($_SESSION['flash_message'])) {
        $type = $_SESSION['flash_message']['type'];
        $message = $_SESSION['flash_message']['message'];
        if ($type == "success") {
            $alert = '<div style="font-family: IRANSans;" class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong></strong> ' . $message . '</div>';
        } else {
            $alert = '<div style="font-family: IRANSans;" class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong></strong> ' . $message . '</div>';
        }
        $_SESSION['flash_message'] = "";
        unset($_SESSION['flash_message']);
        return $alert;
    }
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array())
{
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function truncate($text, $count = 10, $ending = "&hellip;")
{
    $text2 = explode(" ", $text);
    $text = '';
    $count = min($count, count($text2));
    for ($i = 0; $i < $count; $i++) {
        $text .= $text2[$i] . " ";
    }
    $text .= $ending;

    return $text;
}

function html_truncate($text, $count = 5, $ending = "&hellip;")
{
    return truncate(strip_tags($text), $count, $ending);
}
