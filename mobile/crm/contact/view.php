<?php
require($_SERVER['DOCUMENT_ROOT'] . '/mobile/headers.php');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$GLOBALS['APPLICATION']->IncludeComponent(
	'bitrix:mobile.crm.contact.view',
	'',
	array(
		'UID' => 'mobile_crm_contact_view',
		'SERVICE_URL_TEMPLATE' => '/mobile/ajax.php?mobile_action=crm_contact_edit&site_id=#SITE#&sessid=#SID#',
		'CONTACT_SHOW_URL_TEMPLATE' => '/mobile/crm/contact/view.php?contact_id=#contact_id#',
		'CONTACT_EDIT_URL_TEMPLATE' => '/mobile/crm/contact/edit.php?contact_id=#contact_id#',		
		'ACTIVITY_LIST_URL_TEMPLATE' => '/mobile/crm/activity/list.php?entity_type_id=#entity_type_id#&entity_id=#entity_id#',
		'ACTIVITY_EDIT_URL_TEMPLATE' => '/mobile/crm/activity/edit.php?owner_type=#owner_type#&owner_id=#owner_id#&type_id=#type_id#',
		'INVOICE_EDIT_URL_TEMPLATE' => '/mobile/crm/invoice/edit.php?contact_id=#contact_id#&company_id=#company_id#&deal_id=#deal_id#',	
		'COMMUNICATION_LIST_URL_TEMPLATE' => '/mobile/crm/comm/list.php?entity_type_id=#entity_type_id#&entity_id=#entity_id#&type_id=#type_id#',
		'EVENT_LIST_URL_TEMPLATE' => '/mobile/crm/event/list.php?entity_type_id=#entity_type_id#&entity_id=#entity_id#',
		'DEAL_LIST_URL_TEMPLATE' => '/mobile/crm/deal/list.php?contact_id=#contact_id#',
		'USER_PROFILE_URL_TEMPLATE' => '/mobile/users/?user_id=#user_id#'
	)
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
