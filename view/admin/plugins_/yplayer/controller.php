<?php
  /**
   * Controller
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: controller.php, v1.00 2015-12-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../../../init.php");
  
  if (!App::Auth()->is_Admin())
      exit;
	  
  Bootstrap::Autoloader(array(APLUGPATH . 'yplayer/'));

  $delete = Validator::post('delete');
  $trash = Validator::post('trash');
  $action = Validator::post('action');
  $restore = Validator::post('restore');
  $title = Validator::post('title') ? Validator::sanitize($_POST['title']) : null;

  /* == Delete == */
  switch ($delete):
      /* == Delete Player == */
      case "deletePlayer":
		  $res = Db::run()->delete(Yplayer::mTable, array("id" => Filter::$id));
		  if($row = Db::run()->first(Plugins::mTable, array("id", "plugalias"), array("plugin_id" => Filter::$id, "groups" => "yplayer"))) :
		      Db::run()->delete(Content::lTable, array("plug_id" => $row->id));
			  Db::run()->delete(Plugins::mTable, array("id" => $row->id));
			  
			  File::deleteDirectory(FPLUGPATH . $row->plugalias);
		  endif;
		  
		  $message = str_replace("[NAME]", $title, Lang::$word->_PLG_YPL_DEL_OK);
          Message::msgReply($res, 'success', $message);
		  Logger::writeLog($message);

          break;
  endswitch;
  
  /* == Actions == */
  switch ($action):
      /* == Process Player == */
      case "processPlayer":
          App::Yplayer()->processPlayer();
      break;
  endswitch;