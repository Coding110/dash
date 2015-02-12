
document.onreadystatechange = function () {
	if (document.readyState == "complete") {
		dscreate();	
	}
}

function dscreate()
{
	var dashname = document.getElementsByName("dashmain");
	var a,b,c;
	objs = new Array();
	for(var i=0;i<dashname.length;i++){
		c = dashname[i].id.split("-");
		objs[i] = createDash(c[3])
		objs[i].dsinit();
	}
}

function createDash(suffix) {
	var dash = new Object;
	dash.d=null;
	dash.flag=0;
	dash.suffix="-"+suffix;
	dash.mainid="dash-main-id";
	dash.imgid="dash-img-id";
	dash.submitid="dash-submit-id";
	dash.alipayfreeid="ds-alipay-free";
	dash.alipay1id="ds-alipay-1";
	dash.alipaycustomid="ds-alipay-custom-id";
	dash.dropdownid="ds-dropdown-id";
	dash.yuanid="ds-yuan-id";

	dash.dsinit = function(){
		this.flag = 0;
		this.d = document;
		this.mainid += this.suffix;

		this.d.getElementById(this.mainid).innerHTML = this.dshtml();
		this.dsresetid();

		var a = this.d.getElementById(this.alipayfreeid);
		bind(a,"click",function(e){
		    dash.dsalipayfree();
		});
		a = this.d.getElementById(this.alipay1id);
		bind(a,"click",function(e){
		    dash.dsalipayelse();
		});
		var b = this.d.getElementById(this.imgid);
		bind(b,"click",function(e){
		    dash.dsimgclick();
		});
		var c = this.d.getElementById(this.submitid);
		bind(c,"click",function(e){
		    dash.dssubmit();
		});
		this.dscss();
	};

	dash.dsimgclick = function(){
		if(this.flag==0){
			this.d.getElementById(this.dropdownid).style.display = "block";
			this.flag = 1;
		}else{
			this.d.getElementById(this.dropdownid).style.display = "none";
			this.flag = 0;
		}
	};

	dash.dsalipayfree = function(){
		this.d.getElementById(this.alipaycustomid).style.display = "block";
		this.d.getElementById(this.yuanid).style.display = "block";
	};

	dash.dsalipayelse = function(){
		this.d.getElementById(this.alipaycustomid).style.display = "none";
		this.d.getElementById(this.yuanid).style.display = "none";
	};

	dash.dssubmit = function(){
		this.d.getElementById(this.alipayfreeid).value = this.d.getElementById(this.alipaycustomid).value;
	};

	dash.dshtml = function(){
		
		var mainvalue = this.d.getElementById(this.mainid).className;
		var a = mainvalue.split(" ");
		if(a.length == 2){
			b = a[1].split("-");
		}else{
		}
		return "<div id=\"dash-mid-id\" class=\"dash-mid\">" + 
				"<a href=\"javascript:void(0);\" id=\"dash-tip-id\" class=\"dash-tip\">" + 
				"<img id=\"dash-img-id\" src=\"http://www.dashangcloud.com/static/ds-logo-1.2-64.png\" alt=\"打赏\" /></a>" + 
				"<div id=\"ds-dropdown-id\" class=\"ds-dropdown\" style=\"display:none;\">" + 
				"<form target=\"_blank\" method=\"POST\" action=\"http://www.dashangcloud.com/sh/"+b[0]+"\">" +
				"<div class=\"ds-ali-radio\">" +
				"<span><input type=\"radio\" name=\"alipay\" id=\"ds-alipay-1\" value=\""+b[1]+"\" checked>"+b[1]+"元</span>" +
				"<span><input type=\"radio\" name=\"alipay\" value=\"\" id=\"ds-alipay-free\">土豪随意</span>" + 
				"<span><input type=\"text\" id=\"ds-alipay-custom-id\" class=\"ds-alipay-custom\" onkeypress='dsnum(event)' style=\"display:none;\"></span><span id=\"ds-yuan-id\" style=\"display:none;\">元</span>" +
				"</div>" +
				"<div class=\"ds-submit-div\">" +
				"<input id=\"dash-submit-id\" class=\"ds-submit\" type=\"submit\" value=\"打赏\" />" + 
				"</div>" +
				"</form>" + 
				"<div id=\"ds-spec-id\" class=\"ds-spec\">来自<a href=\"http://www.dashangcloud.com\" target=\"_blank\">云打赏</a></div>" +
				"</div></div>";
	};


	dash.dsresetid = function(){
		this.d.getElementById(this.imgid).setAttribute("id", this.imgid+this.suffix);
		this.imgid += this.suffix; 
		this.d.getElementById(this.submitid).setAttribute("id", this.submitid+this.suffix);
		this.submitid += this.suffix; 
		this.d.getElementById(this.alipayfreeid).setAttribute("id", this.alipayfreeid+this.suffix);
		this.alipayfreeid += this.suffix; 
		this.d.getElementById(this.alipay1id).setAttribute("id", this.alipay1id+this.suffix);
		this.alipay1id += this.suffix; 
		this.d.getElementById(this.alipaycustomid).setAttribute("id", this.alipaycustomid+this.suffix);
		this.alipaycustomid += this.suffix; 
		this.d.getElementById(this.dropdownid).setAttribute("id", this.dropdownid+this.suffix);
		this.dropdownid += this.suffix; 
		this.d.getElementById(this.yuanid).setAttribute("id", this.yuanid+this.suffix);
		this.yuanid += this.suffix; 
	}; 

	dash.dscss = function(){
		var s = this.d.createElement("link");
		s.type = "text/css";	 
		s.href = "http://www.dashangcloud.com/static/ds.css";	 
		s.rel = "stylesheet";	 
		this.d.getElementsByTagName("head")[0].appendChild(s);
	};

	return dash;
}

function dsnum(evt){
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode( key );
	var regex = /[0-9]|\./;
	if( !regex.test(key) ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
} 

function bind(o,e,f){
	/MSIE/.test(navigator.userAgent)?
	o.attachEvent("on"+e,function(){
	  f.apply(o,arguments);
	}):o.addEventListener(e,f,false);
}
