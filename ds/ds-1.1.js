
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
	var n = 1;
	for(var i=0;i<dashname.length;i++){
		c = dashname[i].id.split("-");
		dashname[i].id += "-" + n;
		objs[i] = createDash(c[3], n);
		objs[i].dsinit();
		n += 1;
	}
}

function createDash(suffix, extra) {
	var dash = new Object;
	dash.d=null;
	dash.flag=0;
	dash.suffix="-"+suffix;
	dash.extra="-"+extra;
	dash.mainid="dash-main-id";
	dash.imgid="dash-img-id";
	dash.submitid="dash-submit-alipay";
	dash.alipayfreeid="ds-alipay-free";
	dash.alipay1id="ds-alipay-1";
	dash.alipaycustomid="ds-alipay-custom-id";
	dash.dropdownid="ds-dropdown-id";
	dash.yuanid="ds-yuan-id";
	dash.urlprefix="http://www.dashangcloud.com";

	dash.dsinit = function(){
		this.flag = 0;
		this.d = document;
		this.mainid += this.suffix+this.extra;

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
		bind(this.d,"click",function(e){
		    dash.dsimghide();
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
	dash.dsimghide = function(){
		var e = event || window.event;
		var elem = e.srcElement||e.target;
		while(elem)
		{
			if(elem.id == this.imgid 
			 ||elem.id == this.submitid
			 ||elem.id == this.alipayfreeid
			 ||elem.id == this.alipay1id
			 ||elem.id == this.alipaycustomid
			 ||elem.id == this.dropdownid
			 ||elem.id == this.yuanid
			)
			{
				return;
			}
			elem = elem.parentNode;
		}
		this.d.getElementById(this.dropdownid).style.display = "none";
		this.flag = 0;
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
				"<img id=\"dash-img-id\" src=\""+ dash.urlprefix +"/static/ds-logo-1.2-64.png\" alt=\"打赏\" /></a>" + 
				"<div id=\"ds-dropdown-id\" class=\"ds-dropdown\" style=\"display:none;\">" + 
				"<form target=\"_blank\" method=\"POST\" action=\""+ dash.urlprefix +"/sh/"+b[0]+"\">" +
				"<div class=\"ds-ali-radio\">" +
				"<span><input type=\"radio\" name=\"fee\" id=\"ds-alipay-1\" value=\""+b[1]+"\" checked/>&nbsp"+b[1]+"元</span>" +
				"<span><input type=\"radio\" name=\"fee\" value=\"\" id=\"ds-alipay-free\"/>&nbsp土豪随意</span>" + 
				"<span><input type=\"text\" id=\"ds-alipay-custom-id\" class=\"ds-alipay-custom\" onkeypress='dsnum(event)' style=\"display:none;\"></span><span id=\"ds-yuan-id\" style=\"display:none;\">元</span>" +
				"</div><br/>" +
				"<div class=\"ds-submit-div\">" +
				//"<span class=\"pay-method-spec\">支付:</span>" + 
				"<input id=\"dash-submit-alipay\" class=\"ds-submit ds-submit-alipay\" name=\"method\" type=\"submit\" value=\"alipay\" />" + 
				"<input id=\"dash-submit-wxpay\" class=\"ds-submit ds-submit-wxpay\" name=\"method\"  type=\"submit\" value=\"wxpay\" />" + 
				"</div>" +
				"</form><br/>" + 
				"<div id=\"ds-spec-id\" class=\"ds-spec\">来自<a href=\""+ dash.urlprefix +"\" target=\"_blank\">云打赏</a></div>" +
				"</div></div>";
	};


	dash.dsresetid = function(){
		this.d.getElementById(this.imgid).setAttribute("id", this.imgid+this.suffix+this.extra);
		this.imgid += this.suffix+this.extra; 
		this.d.getElementById(this.submitid).setAttribute("id", this.submitid+this.suffix+this.extra);
		this.submitid += this.suffix+this.extra; 
		this.d.getElementById(this.alipayfreeid).setAttribute("id", this.alipayfreeid+this.suffix+this.extra);
		this.alipayfreeid += this.suffix+this.extra; 
		this.d.getElementById(this.alipay1id).setAttribute("id", this.alipay1id+this.suffix+this.extra);
		this.alipay1id += this.suffix+this.extra; 
		this.d.getElementById(this.alipaycustomid).setAttribute("id", this.alipaycustomid+this.suffix+this.extra);
		this.alipaycustomid += this.suffix+this.extra; 
		this.d.getElementById(this.dropdownid).setAttribute("id", this.dropdownid+this.suffix+this.extra);
		this.dropdownid += this.suffix+this.extra; 
		this.d.getElementById(this.yuanid).setAttribute("id", this.yuanid+this.suffix+this.extra);
		this.yuanid += this.suffix+this.extra; 
	}; 

	dash.dscss = function(){
		var s = this.d.createElement("link");
		s.type = "text/css";	 
		s.href = dash.urlprefix +"/static/ds-1.1.css";	 
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
