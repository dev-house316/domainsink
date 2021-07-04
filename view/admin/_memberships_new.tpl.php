<?php
  /**
   * Membership Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2018
   * @version $Id: _memberships_new.tpl.php, v1.00 2018-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3 class="header"><?php echo Lang::$word->META_T6;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form card">
    <ul class="wojo basic wide tabs">
      <?php foreach($this->langlist as $lang):?>
      <li<?php echo ($lang->abbr == $this->core->lang) ? ' class="active"' : null;?>><a style="background:<?php echo $lang->color;?>;color:#fff" data-tab="#lang_<?php echo $lang->abbr;?>"><span class="flag icon <?php echo $lang->abbr;?>"></span><?php echo $lang->name;?></a>
      </li>
      <?php endforeach;?>
    </ul>
    <div class="content">
      <?php foreach($this->langlist as $lang):?>
      <div id="lang_<?php echo $lang->abbr;?>" class="wojo tab item">
        <div class="wojo fields">
          <div class="field five wide">
            <label><?php echo Lang::$word->NAME;?>
              <i class="icon asterisk"></i></label>
            <div class="wojo huge fluid input">
              <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title_<?php echo $lang->abbr?>">
            </div>
          </div>
          <div class="field five wide">
            <label><?php echo Lang::$word->DESCRIPTION;?></label>
            <div class="wojo huge fluid input">
              <input type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" name="description_<?php echo $lang->abbr;?>">
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <div class="wojo segment form">
    <div class="row">
      <div class="columns screen-70 tablet-70 mobile-100 phone-100 padding">
        <div class="wojo fields align-middle">
          <div class="field four wide labeled">
            <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_PRICE;?>
              <i class="icon asterisk"></i></label>
          </div>
          <div class="field">
            <div class="wojo fluid labeled input">
              <div class="wojo label"><?php echo Utility::currencySymbol();?></div>
              <input type="text" placeholder="<?php echo Lang::$word->MEM_PRICE;?>" name="price">
            </div>
          </div>
        </div>
        <div class="wojo fields align-middle">
          <div class="field four wide labeled">
            <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_DAYS;?>
              <i class="icon asterisk"></i></label>
          </div>
          <div class="field">
            <div class="wojo fluid input">
              <input type="text" placeholder="<?php echo Lang::$word->MEM_DAYS;?>" name="days">
              <select class="wojo small dropdown" name="period">
                <?php echo Utility::loopOptionsSimpleAlt(Date::getMembershipPeriod());?>
              </select>
            </div>
          </div>
        </div>
        <div class="wojo fields align-middle">
          <div class="field four wide labeled">
            <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_PRIVATE;?></label>
          </div>
          <div class="field">
            <div class="wojo checkbox radio fitted inline">
              <input name="private" type="radio" value="1" id="private_1">
              <label for="private_1"><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio fitted inline">
              <input name="private" type="radio" value="0" id="private_0" checked="checked">
              <label for="private_0"><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="wojo fields align-middle">
          <div class="field four wide labeled">
            <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_REC;?></label>
          </div>
          <div class="field">
            <div class="wojo checkbox radio fitted inline">
              <input name="recurring" type="radio" value="1" id="recurring_1" checked="checked">
              <label for="recurring_1"><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio fitted inline">
              <input name="recurring" type="radio" value="0" id="recurring_0">
              <label for="recurring_0"><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="wojo fields align-middle">
          <div class="field four wide labeled">
            <label class="content-right mobile-content-left"><?php echo Lang::$word->PUBLISHED;?></label>
          </div>
          <div class="field">
            <div class="wojo checkbox radio fitted inline">
              <input name="active" type="radio" value="1" id="active_1" checked="checked">
              <label for="active_1"><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio fitted inline">
              <input name="active" type="radio" value="0" id="active_0">
              <label for="active_0"><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="columns screen-30 tablet-30 mobile-100 phone-100 screen-left-divider tablet-left-divider padding">
        <input type="file" name="thumb" data-type="image" accept="image/png, image/jpeg">
      </div>
    </div>
  </div>
  <div class="content-center">
    <a href="<?php echo Url::url("/admin/memberships");?>" class="wojo simple small button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processMembership" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->MEM_SUB1;?></button>
  </div>
</form>