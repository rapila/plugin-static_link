<?php
/**
* @package modules-filter
*/
class StaticLinkFilterModule extends FilterModule {
  public function onRichtextWriteTagForIdentifier($sTagName, $aParameters, $oIdentifier, $sTagContent, $oLink) {
    if(Manager::getCurrentManager() instanceof BackendManager || $oIdentifier->getName() !== 'external_link' || !StringUtil::startsWith($aParameters[0]['href'], 'subs://') || !$oLink instanceof Link) {
      return;
    }
    $aParameters[0]['href'] = EXT_WEB_DIR_FE.'/'.substr($aParameters[0]['href'], strlen('subs://'));
    $aParameters[0]['class'] = 'internal_link subsite';
    $aParameters[0]['rel'] = 'internal';
  }
}