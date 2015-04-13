
var http_prefix = "http://www.dashangcloud.com/sh/";

jQuery( document ).ready(function() {
	jQuery("#ds-site-id").change(function(){
		alert("ds site");
	});
	jQuery("#add-site-ok").click(function(){
		url = http_prefix + "mng/addsite"
		alert("url: "+url+", site: "+jQuery("#new-dash-site").val());
		jQuery.post(url, {site:jQuery("#new-dash-site").val()});
	});
	jQuery("#generating-code").click(function(){
		alert("Generate code now");
	});

});
