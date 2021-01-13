"use strict";

/*\
	|*|
	|*|  :: XMLHttpRequest.prototype.sendAsBinary() Polyfill ::
	|*|
	|*|  https://developer.mozilla.org/en-US/docs/DOM/XMLHttpRequest#sendAsBinary()
\*/
//document.getElementById('error').style.visibility = 'hidden';
//$('#error').hide();
if (!XMLHttpRequest.prototype.sendAsBinary) {
	XMLHttpRequest.prototype.sendAsBinary = function(sData) {
		var nBytes = sData.length, ui8Data = new Uint8Array(nBytes);
		for (var nIdx = 0; nIdx < nBytes; nIdx++) {
			ui8Data[nIdx] = sData.charCodeAt(nIdx) & 0xff;
		}
		/* send as ArrayBufferView...: */
		this.send(ui8Data);
		/* ...or as ArrayBuffer (legacy)...: this.send(ui8Data.buffer); */
	};
}

/*\
	|*|
	|*|  :: AJAX Form Submit Framework ::
	|*|
	|*|  https://developer.mozilla.org/en-US/docs/DOM/XMLHttpRequest/Using_XMLHttpRequest
	|*|
	|*|  This framework is released under the GNU Public License, version 3 or later.
	|*|  http://www.gnu.org/licenses/gpl-3.0-standalone.html
	|*|
	|*|  Syntax:
	|*|
	|*|   AJAXSubmit(HTMLFormElement);
\*/
var AJAXSubmit = (function () {
	$('#error').hide();
	$('#loading-image').bind('ajaxStart', function(){
		$(this).show();
	}).bind('ajaxStop', function(){
		$(this).hide();
	});
	function ajaxSuccess () {
		/* console.log("AJAXSubmit - Success!"); */
		if(this.responseText =='error')
		{
			alert('Only csv files are allowed');
		}
		else
		{
			document.getElementById('display').innerHTML = this.responseText;
			document.getElementById('hidden').innerHTML = this.responseText;
			$('#display > #mytable').dataTable();
			$('#display').on('click', '#upload', function(e){
				e.preventDefault();
				//$(':checkbox', $('#mytable').DataTable().rows().nodes()).prop('checked', this.checked);
				var arrmemid = $('#hidden > #mytable tr').find('td:nth-child(2)').map(function() {
					return $(this).text()
				}).get();
				var arramount = $('#hidden > #mytable tr').find('td:nth-child(4)').map(function() {
					return $(this).text()
				}).get();
				var arrpaid = $('#hidden > #mytable tr').find('td:nth-child(5)').map(function() {
					return $(this).text()
				}).get();
				var arrinstallment = $('#hidden > #mytable tr').find('td:nth-child(6)').map(function() {
					return $(this).text()
				}).get();
				var arrbdate = $('#hidden > #mytable tr').find('td:nth-child(7)').map(function() {
					return $(this).text()
				}).get();
				
				$.ajax({
					type: 'post',
					url: '../include/appajax.php',
					data: {arr:arrmemid, facilitydescr:$('#facility').val(), arrbdate:arrbdate},
					success: function(result){
						if($.trim(result) == "success1"){
							var con = confirm('records for ' + description + ' deduction exists Delete the existing record to add the new one');
							if(con == true)
							insert(arrmemid, arramount, $('#facility').val(), arrpaid, arrinstallment, arrbdate);
						}
						else if($.trim(result) == "success"){
							insert(arrmemid,  arramount, $('#facility').val(), arrpaid, arrinstallment, arrbdate);
						}
						else{
							//console.log(arrbdate);
							$('#error').html("<strong>Warning!</strong>\n" + result);
							$('#error').show();
						}
					}
				});
			});
			//console.log(arr);
		}
	}
	function insert(arrmemid, arramount, arrfacility, arrpaid, arrinstallment, arrbdate){
		var sn = 0;
		var error = '';
		if(error == '')
		$.ajax({
			type: 'post',
			url: '../include/appajax.php',
			data: { arrmemid:arrmemid, arramount:arramount, arrfacility:arrfacility, arrpaid:arrpaid, arrinstallment:arrinstallment, arrbdate:arrbdate},
			success: function(result){
				if($.trim(result) === 'done')
					alert('<?php echo ucwords($description);?>' + ' deductions inserted succesfully');
				else if($.trim(result) != ''){
					$('#error').html("<strong>Warning!</strong>" + result);
					$('#error').show();
				}
			}
		});
	}
	
	function submitData (oData) {
		/* the AJAX request... */
		var oAjaxReq = new XMLHttpRequest();
		oAjaxReq.submittedData = oData;
		oAjaxReq.onload = ajaxSuccess;
		if (oData.technique === 0) {
			/* method is GET */
			oAjaxReq.open("get", oData.receiver.replace(/(?:\?.*)?$/, oData.segments.length > 0 ? "?" + oData.segments.join("&") : ""), true);
			oAjaxReq.send(null);
			} else {
			/* method is POST */
			oAjaxReq.open("post", oData.receiver, true);
			if (oData.technique === 3) {
				/* enctype is multipart/form-data */
				var sBoundary = "---------------------------" + Date.now().toString(16);
				oAjaxReq.setRequestHeader("Content-Type", "multipart\/form-data; boundary=" + sBoundary);
				oAjaxReq.sendAsBinary("--" + sBoundary + "\r\n" + oData.segments.join("--" + sBoundary + "\r\n") + "--" + sBoundary + "--\r\n");
				} else {
				/* enctype is application/x-www-form-urlencoded or text/plain */
				oAjaxReq.setRequestHeader("Content-Type", oData.contentType);
				oAjaxReq.send(oData.segments.join(oData.technique === 2 ? "\r\n" : "&"));
			}
		}
	}
	
	function processStatus (oData) {
		if (oData.status > 0) { return; }
		/* the form is now totally serialized! do something before sending it to the server... */
		/* doSomething(oData); */
		/* console.log("AJAXSubmit - The form is now serialized. Submitting..."); */
		submitData (oData);
	}
	
	function pushSegment (oFREvt) {
		this.owner.segments[this.segmentIdx] += oFREvt.target.result + "\r\n";
		this.owner.status--;
		processStatus(this.owner);
	}
	
	function plainEscape (sText) {
		/* how should I treat a text/plain form encoding? what characters are not allowed? this is what I suppose...: */
		/* "4\3\7 - Einstein said E=mc2" ----> "4\\3\\7\ -\ Einstein\ said\ E\=mc2" */
		return sText.replace(/[\s\=\\]/g, "\\$&");
	}
	
	function SubmitRequest (oTarget) {
		var nFile, sFieldType, oField, oSegmReq, oFile, bIsPost = oTarget.method.toLowerCase() === "post";
		/* console.log("AJAXSubmit - Serializing form..."); */
		this.contentType = bIsPost && oTarget.enctype ? oTarget.enctype : "application\/x-www-form-urlencoded";
		this.technique = bIsPost ? this.contentType === "multipart\/form-data" ? 3 : this.contentType === "text\/plain" ? 2 : 1 : 0;
		this.receiver = oTarget.action;
		this.status = 0;
		this.segments = [];
		var fFilter = this.technique === 2 ? plainEscape : escape;
		for (var nItem = 0; nItem < oTarget.elements.length; nItem++) {
			oField = oTarget.elements[nItem];
			if (!oField.hasAttribute("name")) { continue; }
			sFieldType = oField.nodeName.toUpperCase() === "INPUT" ? oField.getAttribute("type").toUpperCase() : "TEXT";
			if (sFieldType === "FILE" && oField.files.length > 0) {
				if (this.technique === 3) {
					/* enctype is multipart/form-data */
					for (nFile = 0; nFile < oField.files.length; nFile++) {
						oFile = oField.files[nFile];
						oSegmReq = new FileReader();
						/* (custom properties:) */
						oSegmReq.segmentIdx = this.segments.length;
						oSegmReq.owner = this;
						/* (end of custom properties) */
						oSegmReq.onload = pushSegment;
						this.segments.push("Content-Disposition: form-data; name=\"" + oField.name + "\"; filename=\""+ oFile.name + "\"\r\nContent-Type: " + oFile.type + "\r\n\r\n");
						this.status++;
						oSegmReq.readAsBinaryString(oFile);
					}
					} else {
					/* enctype is application/x-www-form-urlencoded or text/plain or method is GET: files will not be sent! */
					for (nFile = 0; nFile < oField.files.length; this.segments.push(fFilter(oField.name) + "=" + fFilter(oField.files[nFile++].name)));
				}
				} else if ((sFieldType !== "RADIO" && sFieldType !== "CHECKBOX") || oField.checked) {
				/* field type is not FILE or is FILE but is empty */
				this.segments.push(
				this.technique === 3 ? /* enctype is multipart/form-data */
				"Content-Disposition: form-data; name=\"" + oField.name + "\"\r\n\r\n" + oField.value + "\r\n"
				: /* enctype is application/x-www-form-urlencoded or text/plain or method is GET */
				fFilter(oField.name) + "=" + fFilter(oField.value)
				);
			}
		}
		processStatus(this);
	}
	
	return function (oFormElement) {
		if (!oFormElement.action) { return; }
		new SubmitRequest(oFormElement);
	};
	
})();
$(document).ready(function(){
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {facilities:'facility'},
		dataType: 'json',
		success: function(results){
			$("#facility").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#facility").append("<option value = '" + results[result].fidno + "'>"+ results[result].facility +"</option>")
			}
		}
	});
	$(".select-box").select2({
		placeholder: "",
		allowClear: true
	});
	$('#display > #mytable').DataTable({
		"dom": 'lCfrtip',
		"order": [],
		"colVis": {
			"buttonText": "Columns",
			"overlayFade": 0,
			"align": "right"
		},
		"language": {
			"lengthMenu": '_MENU_ entries per page',
			"search": '<i class="fa fa-search"></i>',
			"paginate": {
				"previous": '<i class="fa fa-angle-left"></i>',
				"next": '<i class="fa fa-angle-right"></i>'
			}
		}
	});
});