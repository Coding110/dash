
var http_prefix = "http://www.dashangcloud.com/sh/";

jQuery( document ).ready(function() {

	// add site
	jQuery("#add-site-ok").click(function(){
		url = http_prefix + "mng/addsite"
		/* had better check domain and need process the response */
		site = jQuery("#new-dash-site").val();
		jQuery.post(url, {site:site});
	});

	jQuery("#generating-code").click(function(){
		generating_code_request(0);
	});

	jQuery("#generating-link").click(function(){
		generating_link_request(0);
	});

	jQuery("#modify-account-ok").click(function(){
		modify_account();
	});
});

/*
 * if flag == 1 doesn't alert
 */
function generating_code_request(flag)
{
	url = http_prefix + "mng/gencode"
	/* need process the response */
	site = jQuery("#ds-site-id").val();
	if(site == null){
		alert("打赏网站不能为空。");
		return ;
	}
	fee = jQuery("#ds-default-fee").val();
	if(fee == null){
		alert("默认打赏金额不能为空。");
		return ;
	}
	
	return ;

	jQuery.post(url, {site:site,fee:fee}, function(data){
			resp = jQuery.parseJSON(data);
			console.dir(resp);
			if(resp.err == 0){
				jQuery("#code-style-1").val(resp.info.s16);
				jQuery("#code-style-2").val(resp.info.s32);
				jQuery("#code-style-3").val(resp.info.s64);
				if(flag == 0) alert("代码生成完成。");
			}else{
				alert("Error: " + resp.info);
			}
		}).fail(function(data){
			alert("some error");
		});
}

function generating_link_request(flag)
{
	url = http_prefix + "mng/genlink"
	fee = jQuery("#ds-default-fee").val();
	if(fee == null || fee == ""){
		alert("默认打赏金额不能为空。");
		return ;
	}
	
	console.dir(fee);
	//return ;

	jQuery.post(url, {fee:fee}, function(data){
			resp = jQuery.parseJSON(data);
			console.dir(resp);
			if(resp.err == 0){
				console.dir(resp.info.ds_url);
				jQuery("#link-style-1").val(resp.info.ds_url);
				if(flag == 0) alert("链接生成完成。");
			}else{
				alert("Error: " + resp.info);
			}
		}).fail(function(data){
			alert("some error");
		});
}

function modify_account(){
	url = http_prefix + "mng/modacut"
	flag = 0;

	jQuery("#account-name-error").find("span").remove();
	jQuery("#real-name-error").find("span").remove();
	jQuery("#phone-no-error").find("span").remove();

	/* need process the response */
	account_name = jQuery("#account-name").val();
	if(account_name == null || account_name == ""){
		jQuery("#account-name-error").append("<span>不能为空</span>");
		flag++;
	}else{
		jQuery("#account-name-error").append("");
	}
	real_name = jQuery("#account-real-name").val();
	if(real_name == null || real_name == ""){
		jQuery("#real-name-error").append("<span>不能为空</span>");
		flag++;
	}else{
		jQuery("#real-name-error").append("");
	}
	phone_no = jQuery("#account-phone-no").val();
	if(phone_no == null || phone_no == ""){
		jQuery("#phone-no-error").append("<span>不能为空</span>");
		flag++;
	}else{
		jQuery("#phone-no-error").append("");
	}
	if(flag > 0) return; // somme error

	// should show some info on page when block here
	jQuery.post(url, {account:account_name, account_name:real_name, phone_no:phone_no}, function(data){
			resp = jQuery.parseJSON(data);
			console.dir(resp);
			if(resp.err == 0){
				//console.dir("ok: " + resp.info);
				
				jQuery("#tb-account-name").find("span").remove();
				jQuery("#tb-account-name").append("<span>"+resp.info.account+"</span>");
				jQuery("#tb-real-name").find("span").remove();
				jQuery("#tb-real-name").append("<span>"+resp.info.account_name+"</span>");
				jQuery("#tb-phone-no").find("span").remove();
				jQuery("#tb-phone-no").append("<span>"+resp.info.phone_no+"</span>");

			}else{
				console.dir("Error: " + resp.info);
			}
		}).fail(function(data){
			console.dir("some error");
		});
	jQuery('#modify-account-dlg').modal('hide');
	loaction.reload();
}
