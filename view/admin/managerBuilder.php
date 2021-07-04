<?php
  /**
   * File Manager Page Builder
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2018
   * @version $Id: managerBuilder.php, v1.00 2018-01-08 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../init.php");
	  
  if (!App::Auth()->is_Admin())
      exit;
	  
  if(!Auth::hasPrivileges('manage_files')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<div id="fm">
  <div class="wojo top simple attached card">
    <div class="row horizontal-gutters align-middle">
      <div class="shrink columns phone-100">
        <div class="wojo secondary button uploader" id="drag-and-drop-zone">
          <i class="icon plus alt"></i>
          <label><?php echo Lang::$word->UPLOAD;?>
            <input type="file" multiple name="files[]">
          </label>
        </div>
      </div>
      <div class="columns phone-100 content-center">
        <div class="wojo right transparent labeled input">
          <input placeholder="<?php echo Lang::$word->FM_NEWFLD_S1;?>..." name="foldername" type="text">
          <a id="addFolder" class="wojo basic label">
            <?php echo Lang::$word->ADD;?>
          </a>
        </div>
        <div class="wojo negative button disabled is_delete"><?php echo Lang::$word->DELETE;?></div>
        <div id="displyType" class="wojo buttons">
          <a data-type="table" class="wojo simple icon button active"><i class="icon reorder"></i></a>
          <a data-type="list" class="wojo simple icon button"><i class="icon unordered list"></i></a>
          <a data-type="grid" class="wojo simple icon button"><i class="icon apps"></i></a>
        </div>
        <a id="fInsert" class="wojo small secondary button hidden"><?php echo Lang::$word->INSERT;?></a>
      </div>
      <div class="columns shrink phone-hide mobile-hide">
        <a id="togglePreview" class="wojo simple icon button"><i class="icon compress"></i></a>
      </div>
    </div>
  </div>
  <div class="row gutters">
    <div class="shrink columns phone-hide mobile-hide">
      <div class="wojo basic segment">
        <h4><?php echo Lang::$word->FM_DISPLAY;?></h4>
        <div id="ftype" class="wojo very relaxed flex link list align-middle">
          <a data-type="all" class="item active">
            <i class="icon inbox"></i>
            <div class="content">
              <div class="header"><?php echo Lang::$word->FM_ALL_F;?></div>
            </div>
          </a>
          <a data-type="pic" class="item">
            <i class="icon photo"></i>
            <div class="content">
              <div class="header"><?php echo Lang::$word->FM_AMG_F;?></div>
            </div>
          </a>
          <a data-type="vid" class="item">
            <i class="icon camera retro"></i>
            <div class="content">
              <div class="header"><?php echo Lang::$word->FM_VID_F;?></div>
            </div>
          </a>
          <a data-type="aud" class="item">
            <i class="icon volume"></i>
            <div class="content">
              <div class="header"><?php echo Lang::$word->FM_AUD_F;?></div>
            </div>
          </a>
          <a data-type="doc" class="item">
            <i class="icon files"></i>
            <div class="content">
              <div class="header"><?php echo Lang::$word->FM_DOC_F;?></div>
            </div>
          </a>
        </div>
        <input type="hidden" name="dir" value="">
      </div>
    </div>
    <div class="phone-100 columns" style="min-height:500px">
      <div class="row">
        <div class="column align-middle">
          <div id="fcrumbs"><span class="wojo small bold text"><?php echo Lang::$word->HOME;?></span></div>
        </div>
        <div class="column align-middle shrink">
          <div id="done"></div>
        </div>
      </div>
      <div id="fileList" class="wojo small attached relaxed middle aligned celled list"></div>
      <div class="wojo basic divider"></div>
      <div id="result"></div>
    </div>
    <div class="shrink columns phone-hide mobile-hide">
      <div id="preview" class="padding"><img src="<?php echo ADMINVIEW;?>/images/blank.png" class="wojo medium image" alt="">
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="wojo small horizontal relaxed divided list">
      <div class="item"><?php echo Lang::$word->FM_SPACE;?>: <span class="wojo bold text"><?php echo File::directorySize(UPLOADS, true);?></span></div>
      <div id="tsizeDir" class="item"><?php echo Lang::$word->FM_DIRS;?>: <span class="wojo bold text">0</span></div>
      <div id="tsizeFile" class="item"><?php echo Lang::$word->FM_FILES;?>: <span class="wojo bold text">0</span></div>
    </div>
  </div>
</div>
<script src="<?php echo ADMINVIEW;?>/js/manager.js"></script>
<script type="text/javascript"> 
// <![CDATA[	
$(document).ready(function() {
    $("#result").Manager({
        url: "<?php echo ADMINVIEW;?>",
        dirurl: "<?php echo UPLOADURL;?>",
		is_editor: true,
		is_mce: false,
        lang: {
            delete: "<?php echo Lang::$word->DELETE;?>",
			insert: "<?php echo Lang::$word->INSERT;?>",
			download: "<?php echo Lang::$word->DOWNLOAD;?>",
			unzip: "<?php echo Lang::$word->FM_UNZIP;?>",
			size: "<?php echo Lang::$word->FM_FSIZE;?>",
			lastm: "<?php echo Lang::$word->FM_LASTM;?>",
			items: "<?php echo strtolower(Lang::$word->ITEMS);?>",
			done: "<?php echo Lang::$word->DONE;?>",
			home: "<?php echo Lang::$word->HOME;?>",
        }
    });
});
// ]]>
</script>