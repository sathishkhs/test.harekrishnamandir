<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define('SETTINGS_UPLOAD_PATH', '../uploads/settings/');
if (!file_exists('../uploads/settings/')) {
    mkdir('../uploads/settings/', 0777, true);
}

define('BANNER_IMAGE_PATH', '../uploads/banners/');
if (!file_exists('../uploads/banners/')) {
    mkdir('../uploads/banners/', 0777, true);
}
define('FESTIVAL_BANNER_PATH', '../uploads/festival_banner/');
if (!file_exists('../uploads/festival_banner/')) {
    mkdir('../uploads/festival_banner/', 0777, true);
}
define('SEVA_IMAGE_PATH', '../uploads/seva_image/');
if (!file_exists('../uploads/seva_image/')) {
    mkdir('../uploads/seva_image/', 0777, true);
}
define('DONATIONS_PATH', '../uploads/donations/');
if (!file_exists('../uploads/donations/')) {
    mkdir('../uploads/donations/', 0777, true);
}
define('CHARITABLE_PROGRAM_BANNER_PATH', '../uploads/charitable_program/');
if (!file_exists('../uploads/charitable_program/')) {
    mkdir('../uploads/charitable_program/', 0777, true);
}
define('VIDEO_COVER_IMAGE_PATH', '../uploads/video_cover/');
if (!file_exists('../uploads/video_cover/')) {
    mkdir('../uploads/video_cover/', 0777, true);
}
define('SEVA_PAGE_BANNER_PATH', '../uploads/seva_page_banner/');
if (!file_exists('../uploads/seva_page_banner/')) {
    mkdir('../uploads/seva_page_banner/', 0777, true);
}
define('SEVAS_PHOTO_UPLOAD_PATH', '../uploads/seva_image/');
if (!file_exists('../uploads/seva_image/')) {
    mkdir('../uploads/seva_image/', 0777, true);
}
define('BLOG_PHOTO_UPLOAD_PATH', '../uploads/blog/');
if (!file_exists('../uploads/blog/')) {
    mkdir('../uploads/blog/', 0777, true);
}

define('POST_PHOTO_UPLOAD_PATH', '../uploads/blog/post/');
if (!file_exists('../uploads/blog/post/')) {
    mkdir('../uploads/blog/post/', 0777, true);
}

define('TESTIMONIALS_IMAGE_PATH', 'uploads/testimonials/');
if (!file_exists('uploads/testimonials/')) {
    mkdir('uploads/testimonials/', 0777, true);
}
define('BANNERS_PHOTO_UPLOAD_PATH', '../uploads/banners/');
if (!file_exists('../uploads/banners/')) {
    mkdir('../uploads/banners/', 0777, true);
}
define('PAGES_VIDEO_IMAGE_PATH ', 'uploads/pages_video/');
if (!file_exists('uploads/pages_video_image/')) {
    mkdir('uploads/pages_video_image/', 0777, true);
}
define('PAGES_VIDEO_URL_PATH  ', 'uploads/pages_video/');
if (!file_exists('uploads/pages_video/')) {
    mkdir('uploads/pages_video/', 0777, true);
}

define('GALLERY_UPLOAD_PATH', '../uploads/gallery/');
if (!file_exists('../uploads/gallery/')) {
    mkdir('../uploads/gallery/', 0777, true);
}
define('GALLERY_IMG_UPLOAD_PATH', '../uploads/gallery/profile_img/');
if (!file_exists('../uploads/gallery/profile_img/')) {
    mkdir('../uploads/gallery/profile_img/', 0777, true);
}

define('GALLERY_VIDEO_UPLOAD_PATH', '../uploads/video_gallery/');
if (!file_exists('../uploads/video_gallery/')) {
    mkdir('../uploads/video_gallery/', 0777, true);
}
define('EVENT_COVER_IMAGE_UPLOAD_PATH', '../uploads/event_cover_image/');
if (!file_exists('../uploads/event_cover_image/')) {
    mkdir('../uploads/event_cover_image/', 0777, true);
}