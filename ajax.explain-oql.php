<?php
/**
 * @copyright (C) 2024 ITOMIG
 * @license   AGPL-3.0
 */

use ItomigDw\ItomigAiExplainOql\Helper\AIOQLHelper;

require_once('../../approot.inc.php');
require_once(APPROOT.'application/application.inc.php');

require_once APPROOT.'application/startup.inc.php';
require_once APPROOT.'application/loginwebpage.class.inc.php';
LoginWebPage::DoLoginEx(null, false);

$sClass = utils::ReadParam('obj_class', '', false, 'class');
$iObjectId = (int) utils::ReadParam('obj_key', 0);

/** @var QueryOQL $oObject */
$oObject = MetaModel::GetObject($sClass, $iObjectId, true, true);


$sTargetAttribute = MetaModel::GetModuleSetting(AIOQLHelper::MODULE_CODE, 'target_attribute', 'description');
$oObject->AllowWrite(true);
AIOQLHelper::explainOQLQuery((string) $oObject->Get('oql'), $oObject, $sTargetAttribute);

header('Content-Type: application/json');
echo json_encode(array('success' => true));
