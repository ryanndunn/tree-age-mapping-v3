<?php

namespace BlockTheme\PostTypes;
/**
 * Generate Labels for Custom Post Types
 */
function label_factory( $name, $singular = false, $plural = false ) {
  $singular = $singular ? $singular : $name;
  $plural = $plural ? $plural : $name;
  $labels = array(
    'name'                  => $name,
    'singular_name'         => $singular,
    'menu_name'             => $name,
    'name_admin_bar'        => $name,
    'parent_item_colon'     => 'Parent ' . $singular . ':',
    'all_items'             => 'All ' . $plural,
    'add_new_item'          => 'Add New ' . $singular,
    'add_new'               => 'Add New',
    'new_item'              => 'New ' . $singular,
    'edit_item'             => 'Edit ' . $singular,
    'update_item'           => 'Update ' . $singular,
    'view_item'             => 'View ' . $singular,
    'search_items'          => 'Search ' . $singular,
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'items_list'            => $plural . ' list',
    'items_list_navigation' => $plural . ' list navigation',
    'filter_items_list'     => 'Filter ' . $plural . ' list',
    'plural'                => $plural
  );
  return $labels;
}

//-------TREES--------//
function trees_cpt() {
  $labels = label_factory('Trees', 'Tree', 'Trees');
  $args = array(
    'label'                 => $labels['name'],
    'labels'                => $labels,
    'supports'              => array('title'),
    'public'                => true,
  );
  register_post_type( 'tree', $args );
}
add_action( 'init', __NAMESPACE__ . '\\trees_cpt', 0 );
