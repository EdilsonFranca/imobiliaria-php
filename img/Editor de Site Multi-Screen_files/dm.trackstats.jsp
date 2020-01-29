


var mixpanel=[];
mixpanel.direct = [];
mixpanel.direct.track = function(){};
mixpanel.direct.identify = function(){};
mixpanel.direct.name_tag = function(){};
mixpanel.direct.register = function(){};
var dataLayer =  [];


(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
mixpanel.init("982d2d4161ea804bad4df8a4df468379", {}, "direct");

mixpanel.direct.set_config({persistence: 'localStorage'});


var ACCOUNT_CREATED = "Account Created";
var SITE_PUBLISHED = "Site Published";
var SITE_REPUBLISHED = "Site Re-Published";
var SITE_NEW_CLICKED = "New Site Clicked";
var SITE_NEW_CREATED = "New Site Created";
var FAQ_READ = "Read FAQ";
var BLOG_READ = "Read Blog";
var SUPPORT_CLICKED = "Support Clicked";
var STATS_CLICKED = "Stats Clicked";
var SITE_UPGRADE_CLICKED = "Site Upgrade Clicked";
var SITE_PAYMENT_CLICKED = "Site Payment Clicked";
var SITE_UPGRADED = "Site Upgraded";
var SITE_DOWNGRADED = "Site Downgraded";
var SITE_DELETED = "Site Deleted";
var SITE_EDIT_TEMPLATES = "Site edit templates";
var CHANGE_TEMPLATE  = "Site change template";
var SITE_EDIT_DESIGN = "Site edit design";
var SITE_EDIT_FEATURES = "Site edit features";
var SITE_EDIT_REVIEW_PUBLISH = "Site review publish";
var SITE_EDIT_SETUP_REDIRECT = "site setup redirect";
var ACCOUNT_ACTIVITY = "Account activity";
var SIGNUP = "Account Created via signup";
var INVALID_SITE_URL = "Invalid site URL";

var WR_SITE_SELECT_THEMES = "WR_site_select_themes";
var WR_SITE_CHANGE_THEME = "WR_site_change_theme";
var WR_SITE_EDIT_SITE = "WR_site_edit_design";
var WR_SITE_EDIT_SWITCH_FULL = "WR_site_edit_switch_full";
var WR_SITE_EDIT_SWITCH_BASIC = "WR_site_edit_switch_basic";
var WR_SITE_REVIEW_PUBLISH = "WR_site_review_publish";
var WR_SITE_REVIEW_PUBLISH_ACCOUNT_BOX = "WR_site_review_publish_account_box";
var WR_SITE_REVIEW_PUBLISH_NO_PLAN = "WR_site_review_publish_no_plan";
var WR_SITE_REVIEW_PUBLISH_WITH_PLAN = "WR_site_review_publish_with_plan";
var WR_SITE_VIEW_REDIRECT = "WR_site_view_redirect";
var WR_SITE_DESIGN_SECTION = "WR_site_design_section";
var WR_SITE_ADD_WIDGET = "WR_site_add_widget";
var WR_SITE_EDIT_WIDGET = "WR_site_edit_widget";
var WR_SITE_NAV_SHAPE_CHANGE = "WR_site_change_nav_shape";

var WR_SITE_REMOVE_ADS_CLICKED = "WR_site_remove_ads_clicked";
var WR_SITE_REMOVE_ADS_UPGRADE_NOW = "WR_site_remove_ads_now";
var WR_SITE_REMOVE_ADS_UPGRADE_LATER = "WR_site_remove_ads_later";
var WR_SITE_REMOVE_FOOTER_CLICKED = "WR_site_remove_footer_clicked";
var WR_SITE_REMOVE_FOOTER_UPGRADE_NOW = "WR_site_remove_footer_now";
var WR_SITE_REMOVE_FOOTER_UPGRADE_LATER = "WR_site_remove_footer_later";
var WR_SITE_OPEN_MANAGE_SUBS = "WR_site_open_manage_subs";
var WR_SITE_CANCEL_SUBS_FIRST = "WR_site_cancel_subs_first";
var WR_SITE_CANCEL_SUBS_SECOND = "WR_site_cancel_subs_second";
var WR_SITE_KEEP_SUBS_FIRST = "WR_site_keep_subs_first";
var WR_SITE_KEEP_SUBS_SECOND = "WR_site_keep_subs_second";
var WR_SITE_CHANGE_DOWNGRADE_REASON = "WR_site_change_downgrade_reason";
var WR_SITE_CLICK_DOWNGRADE_TIP = "WR_site_click_downgrade_tip";

var WR_SITE_UPGRADED = "WR_site_upgraded";
var WR_SITE_PUBLISHED = "WR_site_published";
var WR_SITE_REPUBLISHED = "WR_site_republished";
var WR_SITE_PREMIUM_PURCHASED = "WR_site_premium_purchased";
var WR_CREATE_ACCOUNT_FIRST = "WR_create_account_first";
var WR_SITE_CREATE_ACCOUNT = "WR_site_create_account";
var WR_SITE_OPEN_CREATE_ACCOUNT = "WR_site_open_create_account";
var WR_SITE_REVIEW_PUBLISH_NEW_USER = "WR_site_review_publish_new_user";
var WR_NEW_USER_SITE_CREATED = "WR_new_user_site_created";
var WR_NEW_USER_ENTER_URL = "WR_new_user_enter_url";
var WR_NEW_USER_ERROR_CREATING_SITE = "WR_new_user_error_creating_site";
var WR_EXISTING_USER_SITE_CREATED = "WR_existing_user_site_created";
var WR_EXISTING_USER_ERROR_CREATING_SITE = "WR_existing_user_error_creating_site";
var WR_EXISTING_USER_ENTER_URL = "WR_existing_user_enter_url";

var PT_GO_REDIRECT="PT_goto_redirect";
var PT_GO_GOLIVE="PT_goto_golive";
var PT_GO_PLIMUS="PT_goto_plimus";
var PT_GO_PAGES="PT_goto_pages";
var PT_GO_LAYOUT="PT_goto_layout";
var PT_GO_HEADER="PT_goto_header";
var PT_GO_STYLE="PT_goto_style";
var PT_NEW_PAGE="PT_new_page";
var PT_NEW_USER_SITE_CREATED="pt_newuser_site_created";
var PT_EXISTING_USER_SITE_CREATED="pt_existinguser_site_created";
var PT_SITE_CREATED="pt_site_created";

var NEW_SITE_CREATE_ACCOUNT_POPUP = "New Site Create Account Popup";
var NEW_SITE_ENTERED_URL="New Site Entered Url";

var SITE_CREATE_ACCOUNT = "site_create_account";
var DM_SITE_CREATE_ACCOUNT = "dm_site_create_account";
var D1_SITE_CREATE_ACCOUNT = "d1_site_create_account";
var D1_SITE_PURCHASED = "d1_site_purchased";
var D1_SITE_CANCEL_SUBS_FIRST = "d1_site_cancel_subs_first";
var D1_SITE_CANCEL_SUBS_SECOND = "d1_site_cancel_subs_second";
var D1_SITE_DOWNGRADE_TO_BUSINESS = "d1_site_downgrade_to_business";

var _trackCreatedViaIframe = false;

var campaignCookies = ['_dm_utm_source','_dm_utm_medium','_dm_utm_campaign'];

function wrTrackEvent(event, params) {
	params = params || {};

	// fix for invoking with (event, eventname, eventvalue)
	params = getFnParameters(Array.prototype.slice.call(arguments));

	var productType = "", isFromScratch = "", siteAlias = "";

	if ($.dmx && $.dmx.site) {

		productType = $.dmx.site.dmProductType;
		isFromScratch = $.dmx.site.isFromScratch;
		siteAlias = $.dmx.site.alias;
	}
	params = $.extend({
		product : productType,
		isBFS : isFromScratch
	}, params);
	dmTrackEvent(event, "siteAlias", siteAlias, params);
}

function edTrackEvent(event, params) {
	params = params || {};

	// fix for invoking with (event, eventname, eventvalue)
	params = getFnParameters(Array.prototype.slice.call(arguments));

	var siteAlias = "";

	if ($.dmx && $.dmx.site) {
		siteAlias = $.dmx.site.alias;
	}
	params = $.extend({
		isMobileDevice: window.isMobileDevice
	}, params);
	dmTrackEvent(event, "siteAlias", siteAlias, params);
}

function getFnParameters(args) {
	args = args || [];
	var key = args[1] || {};
	if (typeof key == 'string' || key instanceof String) {
		var value = args[2], additionalParams = args[3] || {}, paramsObject = {};

		paramsObject[key] = value;
		return $.extend(paramsObject, additionalParams);
	}

	return key;
}

function dmTrackNewUser(alias) {
	try {
		_clientTrackIdentifyFromCookie();
		mixpanel.direct.alias(alias);
	} catch (e) {
	}
}

function dmTrackSuperProperty(json)
{
	mixpanel.direct.register(json);
}

function dmTrackIdentity(id, isReseller, isCustomer, isProTrial, moreProperties) {
	try {

		mixpanel.direct.identify(id);
		mixpanel.direct.name_tag(id);
		if (isReseller) {
			mixpanel.direct.register({
				'user_type' : 'reseller',
				'isInProTrial':isProTrial?true:false
			});
		}
		else if (isCustomer) {
			mixpanel.direct.register({
				'user_type' : 'customer'
			});
		}
		else {
			mixpanel.direct.register({
				'user_type' : 'smb'
			});
		}
		if(moreProperties){
			mixpanel.direct.register(moreProperties);
		}
		return true;
	} catch (e) {
		return false;
	}
};

function optimizelyTrackEvent(eventName) {
	if (typeof (isReseller) != 'undefined' && isReseller && eventName.search(/site/i) > 0) {
		eventName = eventName.replace("site", "_reseller_site");
		eventName = eventName.replace("Site", "_reseller_Site");
	}
	window.optimizely = window.optimizely || [];
	window.optimizely.push([ 'trackEvent', eventName ]);
}

function optimizelyTrackRevenue(revenue) {
	window.optimizely = window.optimizely || [];
	window.optimizely.push([ 'trackEvent', 'revenue', {
		"revenue" : revenue * 100
	} ]);
}

function totangoTrackEvent(eventName, moduleName)
{
	if(typeof (isReseller) != 'undefined' && isReseller && typeof (totango) != 'undefined')
	{
		totango.track(eventName, moduleName);
	}
}

function intercomTrackEvent(eventName, metadata){
	if(window.intercomSettings){
		Intercom('trackEvent', eventName, metadata);
	}

}

function _clientTrackEvent(eventName, eventData) {
	if (!window["dmTrack"])
		return;
	dmTrack.trackEvent(eventName, eventData);
}

function _clientTrackIdentifyFromCookie() {
	if (!window["dmTrack"])
		return;
	var idCookieContent = $.cookie("_dm_account");
	if (idCookieContent) {
		try {
			var idObj = JSON.parse(idCookieContent) || {};
			if (idObj.uuid) {
				dmTrack.identify(idObj.uuid);
			}
		} catch (e) {
		}
	}
}




function goToCrossDomainLink(url) {
	ga('linker:decorate', url);
	return false;
}

function dmTrackEvent(event, param, value, additionalParams) {
	try {
		var i = 0, v = "";
		if (param == undefined) {
			dataLayer.push({
				'event' : event
			});
			mixpanel.direct.track(event);
		} else {
			var params = {};
			params[param] = value;
			if (additionalParams) {
				var params = $.extend(params, additionalParams);
			}
			var dmAccount = _getCookie('_dm_account');
			if (dmAccount && dmAccount.gaType)
				ga('set', GAU_DIM_UTYPE, dmAccount.gaType);

			var dataLayerParams = $.extend({
				'event' : event
			}, params);
			dataLayer.push(dataLayerParams);
			mixpanel.direct.track(event, params);
			_clientTrackEvent(event, params);
		}
		if (event == "d1-site-created") {
			optimizelyTrackEvent("D1SiteCreated");
			optimizelyTrackEvent("AllSiteCreated");
			_clientTrackEvent(event, params);
		} else if (event == "d1-publish") {
			optimizelyTrackEvent("D1SitePublished");
			optimizelyTrackEvent("AllSitePublished");
			_clientTrackEvent(event, params);
		} else if (event == WR_SITE_PUBLISHED) {
			optimizelyTrackEvent("sitePublished");
			optimizelyTrackEvent("AllSitePublished");
			_clientTrackEvent(event, params);

		} else if (event == SITE_CREATE_ACCOUNT) {
			optimizelyTrackEvent("new_registered_users");
			_clientTrackEvent(event, params);
		} else if (event == WR_NEW_USER_SITE_CREATED || event == WR_EXISTING_USER_SITE_CREATED) {
			optimizelyTrackEvent("siteCreated");
			optimizelyTrackEvent("AllSiteCreated");
			_clientTrackEvent(event, params);

		} else if (event == PT_NEW_USER_SITE_CREATED) {
			if (_trackCreatedViaIframe) {
				// include an iframe that will set the tracking pixels correctly
				$(
						'<iframe id="siteCreatedTrackFrame" style="width:0px;height:0px" name="siteCreatedTrackFrame" src="/common/scripts/dm.track-site-created.jsp">')
						.appendTo('body');
			}
		}

		if (event == WR_NEW_USER_SITE_CREATED || event == WR_EXISTING_USER_SITE_CREATED
				|| event == PT_NEW_USER_SITE_CREATED || event == PT_EXISTING_USER_SITE_CREATED) {
			dmTrackEvent(PT_SITE_CREATED, params, value, aditionalParams);
		}

		return true;
	} catch (e) {
		return false;
	}
};

function dmTrackEcommerce(trans, item) {
	ga('send', 'pageview');

	ga('ecommerce:addTransaction', {
		'id' : trans.orderId,
		'revenue' : trans.total,
		'shipping' : '0',
		'tax' : '0'
	});

	ga('ecommerce:addItem', {
		'id' : trans.orderId,
		'name' : item.product,
		'sku' : item.contract,
		'price' : item.total,
		'quantity' : item.quantity
	});
};
