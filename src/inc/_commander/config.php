<?php
/**_commander/config.php
 * 
 * Commander Dashboard configuration file
 * 
 */

// INCLUDED VIEWS
$cb->inc_sidebar                = 'inc/_commander/views/inc_sidebar.php';
$cb->inc_header                 = 'inc/_commander/views/inc_header.php';
$cb->inc_footer                 = 'inc/_commander/views/inc_footer.php';

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
        'name'  => '<span class="sidebar-mini-hide" data-toggle="modal" data-target="#modal-create-ff">Add New Firefighter</span>',
        'icon'  => 'fa fa-plus',
        'url'   => 'javascript:void(0)'
    ),
    array(
        'name'  => '<span class="sidebar-mini-visible">ST</span><span class="sidebar-mini-hidden">Settings</span>',
        'type'  => 'heading'
    ),
    array(
        'name'  => '<span class="sidebar-mini-hide" data-toggle="modal" data-target="#modal-cmd-info">My Profile</span>',
        'icon'  => 'fa fa-pencil',
        'url'   => 'javascript:void(0)'
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
