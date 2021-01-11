<?php
/**
 * Basic class used for storing template options and providing
 * various helper functions for populating the template with
 * random content
 *
 * @author pixelcave
 *
 */
class Template {
    // Template Variables
    public  $name               = '',
            $version            = '',
            $author             = '',
            $template_author    = '',
            $template_name      = '',
            $template_version   = '',
            $robots             = '',
            $title              = '',
            $description        = '',
            $og_url_site        = '',
            $og_url_image       = '',
            $assets_folder      = '',
            $main_nav           = array(),
            $main_nav_active    = '',
            $theme              = '',
            $cookies,
            $google_maps_api_key,
            $l_sidebar_left,
            $l_sidebar_mini,
            $l_sidebar_visible_desktop,
            $l_sidebar_visible_mobile,
            $l_sidebar_inverse,
            $l_side_overlay_hoverable,
            $l_side_overlay_visible,
            $l_page_overlay,
            $l_side_scroll,
            $l_header_fixed,
            $l_header_style,
            $l_m_content,
            $inc_side_overlay,
            $inc_sidebar,
            $inc_header,
            $inc_footer;

    private $nav_html           = '',
            $page_classes       = '';

    /**
     * Class constructor
     */
    public function __construct($name = '', $version = '', $assets_folder = '') {
        // Set Template's name, version and assets folder
        $this->name                 = $name;
        $this->version              = $version;
        $this->assets_folder        = $assets_folder;
    }

    /**
     * Builds #page-container classes
     *
     * @param   boolean $print True to print the classes and False to return them
     *
     * @return  string  Returns the classes if $print is set to false
     */
    public function page_classes($print = true) {
        // Build page classes
        if ($this->cookies) {
            $this->page_classes .= ' enable-cookies';
        }

        // If sidebar is included
        if ($this->inc_sidebar) {
            if ( ! $this->l_sidebar_left) {
                $this->page_classes .= ' sidebar-r';
            }

            if ($this->l_sidebar_mini) {
                $this->page_classes .= ' sidebar-mini';
            }

            if ($this->l_sidebar_visible_desktop) {
                $this->page_classes .= ' sidebar-o';
            }

            if ($this->l_sidebar_visible_mobile) {
                $this->page_classes .= ' sidebar-o-xs';
            }

            if ($this->l_sidebar_inverse) {
                $this->page_classes .= ' sidebar-inverse';
            }
        }

        // If side overlay is included
        if ($this->inc_side_overlay) {
            if ($this->l_side_overlay_hoverable) {
                $this->page_classes .= ' side-overlay-hover';
            }

            if ($this->l_side_overlay_visible) {
                $this->page_classes .= ' side-overlay-o';
            }

            if ($this->l_page_overlay) {
                $this->page_classes .= ' enable-page-overlay';
            }
        }

        // if sidebar or side overlay is included
        if ($this->inc_sidebar || $this->inc_side_overlay) {
            if ($this->l_side_scroll) {
                $this->page_classes .= ' side-scroll';
            }
        }

        // If header is included
        if ($this->inc_header) {
            if ($this->l_header_fixed) {
                $this->page_classes .= ' page-header-fixed';
            }

            if ($this->l_header_style == 'modern') {
                $this->page_classes .= ' page-header-modern';
            } else if ($this->l_header_style == 'inverse') {
                $this->page_classes .= ' page-header-inverse';
            } else if ($this->l_header_style == 'glass') {
                $this->page_classes .= ' page-header-glass';
            } else if ($this->l_header_style == 'glass-inverse') {
                $this->page_classes .= ' page-header-glass page-header-inverse';
            }
        }

        // Main content classes
        if ($this->l_m_content == 'boxed') {
            $this->page_classes .= ' main-content-boxed';
        } else if ($this->l_m_content == 'narrow') {
            $this->page_classes .= ' main-content-narrow';
        }

        // Print or return page classes
        if ($this->page_classes) {
            if ($print) {
                echo ' class="'. trim($this->page_classes) .'"';
            } else {
                return trim($this->page_classes);
            }
        } else {
            return false;
        }
    }

    /**
     * Builds main navigation
     *
     * @param   boolean     $nav_header True if the menu is for the header (it will not return headings and icons)
     * @param   boolean     $nav_header_icons True to print icons in the header menu as well
     * @param   boolean     $print True to print the navigation and False to return it
     *
     * @return  string      Returns the navigation if $print is set to false
     */
    public function build_nav($nav_header = false, $nav_header_icons = false, $print = true) {
        // Clean navigation HTML
        $this->nav_html = '';

        // Build navigation
        $this->build_nav_array($this->main_nav, $nav_header, $nav_header_icons);

        // Print or return navigation
        if ($print) {
            echo $this->nav_html;
        } else {
            return $this->nav_html;
        }
    }

    /**
     * Build navigation helper - Builds main navigation one level at a time
     *
     * @param   string      $nav_array A multi dimensional array with menu/sub menus links
     * @param   boolean     $nav_header True if the menu is for the header (it will not return headings and icons)
     * @param   boolean     $nav_header_icons True to print icons in the header menu
     */
    private function build_nav_array($nav_array, $nav_header, $nav_header_icons) {
        foreach ($nav_array as $node) {
            // Get all vital link info
            $link_name      = isset($node['name']) ? $node['name'] : '';
            $link_icon      = isset($node['icon']) && ( ! $nav_header || ($nav_header && $nav_header_icons)) ? '<i class="' . $node['icon'] . '"></i>' : '';
            $link_url       = isset($node['url']) ? $node['url'] : '#';
            $link_sub       = isset($node['sub']) && is_array($node['sub']) ? true : false;
            $link_type      = isset($node['type']) ? isset($node['type']) : '';
            $sub_active     = false;
            $link_active    = $link_url == $this->main_nav_active ? true : false;

            // If link type is a header and
            if ($link_type == 'heading') {
                if ( ! $nav_header) {
                    $this->nav_html .= "<li class=\"nav-main-heading\">$link_name</li>\n";
                }
            } else {
                // If it is a submenu search for an active link in all sub links
                if ($link_sub) {
                    $sub_active = $this->build_nav_array_search($node['sub']) ? true : false;
                }

                // Set menu properties
                $li_toggle      = ' data-toggle="nav-submenu"';
                $li_prop        = $sub_active ? ' class="open"' : '';
                $link_prop      = $link_sub ? ' class="nav-submenu' . ($link_active ? ' active' : '') . '"' . $li_toggle : ($link_active ? ' class="active"' : '');

                // Add the link
                $this->nav_html .= "<li$li_prop>\n";
                $this->nav_html .= "<a$link_prop href=\"$link_url\">$link_icon$link_name</a>\n";

                // If it is a submenu, call the function again
                if ($link_sub) {
                    $this->nav_html .= "<ul>\n";
                    $this->build_nav_array($node['sub'], $nav_header, $nav_header_icons);
                    $this->nav_html .= "</ul>\n";
                }

                $this->nav_html .= "</li>\n";
            }
        }
    }

    /**
     * Build navigation helper - Search navigation array for active menu links
     *
     * @param   string      $nav_array A multi dimensional array with menu/sub menus links
     *
     * @return  boolean     Returns true if an active link is found
     */
    private function build_nav_array_search($nav_array) {
        foreach ($nav_array as $node) {
            if (isset($node['url']) && ($node['url'] == $this->main_nav_active)) {
                return true;
            } else if (isset($node['sub']) && is_array($node['sub'])) {
                if ($this->build_nav_array_search($node['sub'])) {
                    return true;
                }
            }
        }
    }

    /**
     * Helper function to include a CSS file from the assets folder
     *
     * @param string $asset_css The url of the CSS file in the assets folder
     *
     */
    public function get_css($asset_css) {
        echo "<link rel=\"stylesheet\" href=\"$this->assets_folder/$asset_css\">\n";
    }

    /**
     * Helper function to include a JS file from the assets folder
     *
     * @param string $asset_js The url of the JS file in the assets folder
     *
     */
    public function get_js($asset_js) {
        echo "<script src=\"$this->assets_folder/$asset_js\"></script>\n";
    }

    /**
     * Prints a random or a specific avatar from the avatars folder
     *
     * @param int       $id     A number for printing a specific avatar
     * @param string    $gender 'female' or 'male' for a specific gender
     * @param int       $size   16, 20, 32, 48, 96 or 128 pixels
     * @param boolean   $thumb  Add avatar thumb class or not
     * @param string    $class  Add a custom class to the image
     */
    public function get_avatar($id = 0, $gender = '', $size = 0, $thumb = false, $class = '') {
        $id_f       = ($id ? $id : ($gender ? ($gender == 'female' ? rand(1, 8) : rand(9, 16)) : rand(1, 16)));
        $class_f    = '';

        if ($size == 16) {
            $class_f = ' img-avatar16';
        } else if ($size == 32) {
            $class_f = ' img-avatar32';
        } else if ($size == 48) {
            $class_f = ' img-avatar48';
        } else if ($size == 96) {
            $class_f = ' img-avatar96';
        } else if ($size == 128) {
            $class_f = ' img-avatar128';
        }
        if ($thumb) {
            $class_f .= ' img-avatar-thumb';
        }

        if ($class) {
            $class_f .= ' ' . $class;
        }

        echo '<img class="img-avatar' . $class_f . '" src="' . $this->assets_folder . '/media/avatars/avatar' . $id_f . '.jpg" alt="">'. "\n";
    }
}