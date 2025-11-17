<?php
/*
 * Copyright (C) 2025 ITOMIG GmbH
 */

namespace ItomigDw\ItomigAiExplainOql\Hook;

use Dict;
use iPopupMenuExtension;
use JSPopupMenuItem;
use QueryOQL;
use UserRights;
use utils;

class ExplainOqlPopupMenuExtension implements iPopupMenuExtension
{
	/**
	 * @inheritDoc
	 */
	public static function EnumItems($iMenuId, $param)
	{
		if ($iMenuId !== iPopupMenuExtension::MENU_OBJDETAILS_ACTIONS) {
			return array();
		}
		if (!($param instanceof QueryOQL)) {
			return array();
		}
		$oQuery = $param;
		if (!UserRights::IsActionAllowed(get_class($oQuery), UR_ACTION_MODIFY, $oQuery)) {
			return array();
		}
		$sLabel = Dict::S('Class:QueryOQL:Action:ExplainByAI');
		$sTooltip = Dict::S('Class:QueryOQL:Action:ExplainByAI+');
		$sError = addslashes(Dict::S('Class:QueryOQL:Action:ExplainByAI:Error'));

		$sAjaxUrl = utils::GetAbsoluteUrlModulesRoot().'itomig-ai-explain-oql/ajax.explain-oql.php';
		$aPayload = array(
			'operation' => 'explain',
			'obj_class' => get_class($oQuery),
			'obj_key' => $oQuery->GetKey(),
		);
		$sPayloadJson = json_encode($aPayload);

		$sJsCode = <<<JS
var \$item = $(this);
if (\$item.hasClass('ibo-is-loading')) {
	return;
}
\$item.addClass('ibo-is-loading');
$.ajax({
	url: '{$sAjaxUrl}',
	method: 'POST',
	dataType: 'json',
	data: {$sPayloadJson}
}).done(function(oData) {
	if (oData && oData.success === true) {
		window.location.reload();
		return;
	}
	var sMessage = (oData && oData.error) ? oData.error : '{$sError}';
	alert(sMessage);
}).fail(function() {
	alert('{$sError}');
}).always(function() {
	\$item.removeClass('ibo-is-loading');
});
JS;
		$oMenuItem = new JSPopupMenuItem('itomig-ai-explain-oql', $sLabel, $sJsCode);
		$oMenuItem->SetTooltip($sTooltip);
		$oMenuItem->SetIconClass('fas fa-chalkboard-teacher');
		return array($oMenuItem);
	}
}
