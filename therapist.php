<?php
/**
 * @package Therapist
 */
/*
Plugin Name: Therapist
Plugin URI:  https://therapistapp.tk/
Description: Create medical papers for therapist in an easy way.
Version:     1.0.0
Author:      Eventises
Author URI:  http://www.eventises.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: therapist
Repository: https://github.com/treefy/therapist
*/

/*
 *
 * This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

if (!defined('ABSPATH')){
    die;
}

defined('ABSPATH') or die('You can not access this file');

if (!function_exists(('add_action'))) {
    echo "You can not access this file";
    exit;
}

class Therapist
{

    function __construct()
    {
        add_action('init',array($this, 'custom_post_type'));
    }

    function activate()
    {
        wp_mail("m.garces@treefy.com", "Plugin installed", "OK");
        $this->custom_post_type();
        flush_rewrite_rules();

    }

    function deactivate()
    {
        flush_rewrite_rules();

    }

    function uninstall()
    {

    }

    function custom_post_type()
    {
        register_post_type('medical-paper', ['public' => true, 'label' => 'Therapists']);
    }

}

if (class_exists('Therapist')) {
    $therapist = new Therapist();
}

//activation
register_activation_hook(__FILE__, array($therapist, 'activate'));

//deactivation
register_activation_hook(__FILE__, array($therapist, 'deactivate'));



