<?php
// **************************************************************************************************
// INCLUDED VIEWS
// **************************************************************************************************

$cb->inc_side_overlay           = 'includes/_firefighter/views/inc_side_overlay.php';
$cb->inc_sidebar                = 'includes/_firefighter/views/inc_sidebar.php';
$cb->inc_header                 = 'includes/_firefighter/views/inc_header.php';
$cb->inc_footer                 = 'includes/_firefighter/views/inc_footer.php';


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************

$cb->main_nav                   = array(
    array(
        'name'  => '<span class="sidebar-mini-hide">Dashboard</span>',
        'icon'  => 'si si-cup'
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
                'name'  => '<a class="sidebar-mini-hide" target=_blank href="https://www.verywellfit.com/what-is-vo2-max-3120097">V02 MAX Info</a>'
            )
        )
    ) 
);