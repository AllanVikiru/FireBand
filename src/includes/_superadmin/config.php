<?php
/**_commander/config.php
 * 
 * Commander Dashboard configuration file
 * 
 */

// INCLUDED VIEWS
$cb->inc_sidebar                = 'includes/_superadmin/views/inc_sidebar.php';
$cb->inc_header                 = 'includes/_superadmin/views/inc_header.php';
$cb->inc_footer                 = 'includes/_superadmin/views/inc_footer.php';

// HEADER SETTINGS
$cb->l_header_fixed             = true;

// MAIN MENU
$cb->main_nav                   = array(
    array(
        'name'  => '<span class="sidebar-mini-hide">Overview</span>',
        'icon'  => 'si si-cup',
        'url'   => 'javascript:void(0)'
    ),
    array(
        'name'  => '<span class="sidebar-mini-visible">MG</span><span class="sidebar-mini-hidden">Manage</span>',
        'type'  => 'heading'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide create-new-user">Add New User</span>',
        'icon'  => 'fa fa-plus',
    ),
    array(
        'name'  => '<span class="sidebar-mini-visible">RS</span><span class="sidebar-mini-hidden">Resources</span>',
        'type'  => 'heading'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide">Knowledge Base</span>',
        'icon'  => 'fa fa-book',
        'sub'   => array(
            array(
                'name'  => '<span class="sidebar-mini-hide">V02 MAX Info</span>',
                'url'   => ''
            )
        )
    ) 
);
