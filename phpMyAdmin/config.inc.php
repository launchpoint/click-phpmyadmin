<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * phpMyAdmin sample configuration, you can use it as base for
 * manual configuration. For easier setup you can use setup/
 *
 * All directives are explained in Documentation.html and on phpMyAdmin
 * wiki <http://wiki.phpmyadmin.net>.
 *
 * @version $Id: config.sample.inc.php 12304 2009-03-24 12:56:58Z nijel $
 * @package phpMyAdmin
 */

/*
 * This is needed for cookie based authentication to encrypt password in
 * cookie
 */
$cfg['blowfish_secret'] = 'some very complicated passphrase';

/*
 * Servers configuration
 */
$i = 0;

/*
 * First server
 */
$i++;
/* Authentication type */

$fname = $_SERVER['DOCUMENT_ROOT']."/config.php";
if(file_exists($fname))
{
  require($fname);
}

$fpath = $_SERVER['DOCUMENT_ROOT']."/core/kernel";
require($fpath."/load_and_connect.php");
$__build = find_build();

$cfg['Servers'][$i]['auth_type'] = 'config';

/* Server parameters */
$cfg['Servers'][$i]['host'] = $__build['db_host'];
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['compress'] = false;

if (isset($phpmyadmin_settings) && $phpmyadmin_settings['username'])
{
  $cfg['Servers'][$i]['user'] = $phpmyadmin_settings['username'];
  $cfg['Servers'][$i]['password'] = $phpmyadmin_settings['password'];
} else {
  $cfg['Servers'][$i]['user'] = $__build['db_username'];
  $cfg['Servers'][$i]['password'] = $__build['db_password'];
}

  $cfg['Servers'][$i]['user'] = 'root';
  $cfg['Servers'][$i]['password'] = 'r00t';

/* Select mysqli if your server has it */
$cfg['Servers'][$i]['extension'] = 'mysql';

/* rajk - for blobstreaming */
$cfg['Servers'][$i]['bs_garbage_threshold'] = 50;
$cfg['Servers'][$i]['bs_repository_threshold'] = '32M';
$cfg['Servers'][$i]['bs_temp_blob_timeout'] = 600;
$cfg['Servers'][$i]['bs_temp_log_threshold'] = '32M';

if(isset($phpmyadmin_settings['allow_drop_db']) && $phpmyadmin_settings['allow_drop_db']) $cfg['AllowUserDropDatabase'] = true;

/* User for advanced features */
// $cfg['Servers'][$i]['controluser'] = 'pma';
// $cfg['Servers'][$i]['controlpass'] = 'pmapass';
/* Advanced phpMyAdmin features */
// $cfg['Servers'][$i]['pmadb'] = 'phpmyadmin';
// $cfg['Servers'][$i]['bookmarktable'] = 'pma_bookmark';
// $cfg['Servers'][$i]['relation'] = 'pma_relation';
// $cfg['Servers'][$i]['table_info'] = 'pma_table_info';
// $cfg['Servers'][$i]['table_coords'] = 'pma_table_coords';
// $cfg['Servers'][$i]['pdf_pages'] = 'pma_pdf_pages';
// $cfg['Servers'][$i]['column_info'] = 'pma_column_info';
// $cfg['Servers'][$i]['history'] = 'pma_history';
// $cfg['Servers'][$i]['designer_coords'] = 'pma_designer_coords';
/* Contrib / Swekey authentication */
// $cfg['Servers'][$i]['auth_swekey_config'] = '/etc/swekey-pma.conf';

/*
 * End of servers configuration
 */

/*
 * Directories for saving/loading files from server
 */
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

$cfg['MaxRows'] = 1000;