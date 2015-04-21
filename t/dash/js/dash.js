
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
	
	jQuery.post(url, {site:site,fee:fee}, function(data){
			resp = jQuery.parseJSON(data);
			console.dir(resp);
			if(resp.err == 0){
				//alert("dashang URL: " + resp.info.ds_url);
				//jQuery("#ds-small-sample-id").val(resp.info.s16);
				//jQuery("#ds-small-sample-id").remove();
				//jQuery("#ds-small-sample-id").append(resp.info.s16);
				//jQuery("#ds-middle-sample-id").val(resp.info.s32);
				//jQuery("#ds-large-sample-id").val(resp.info.s64);
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
