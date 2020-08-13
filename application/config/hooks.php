<?php
// create hook for multi langunage
// $hook['post_controller_constructor'] = array(
//     'class'    => 'MultiLanguageLoader',
//     'function' => 'initialize',
//     'filename' => 'MultiLanguageLoader.php',
//     'filepath' => 'hooks'
// );

// $hook['post_controller_constructor'][] = [
// 	'
// class'	=> 'EloquentHook',
// 	'function' => 'bootEloquent',
// 	'filename' => 'EloquentHook.php',
// 	'filepath' => 'hooks'
// ];

$hook['post_controller_constructor'][] = [
    'class'    => 'EloquentHook',
    'function' => 'bootEloquent',
    'filename' => 'EloquentHook.php',
    'filepath' => 'hooks'
];

?>
