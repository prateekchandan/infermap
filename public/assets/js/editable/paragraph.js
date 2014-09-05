	window.onbeforeunload = "Are you sure you want to leave?";
	window.cur=0;

	function setConfirmUnload(on) {
	    window.onbeforeunload = (on) ? unloadMessage : null;
	}
	function unloadMessage() {
	    return 'You have entered new data on this page.' +
	        ' If you navigate away from this page without' +           
	        ' first saving your data, the changes will be' +
	        ' lost.';

	}
	function exampleClickToEdit(area) {
	    if(window.cur == area) {
	        return;
	    }
	    if(window.cur != 0) {
	        exampleClickToSave(window.cur);
	    }
	    window.cur = area;
	    $('#' + area).redactor({
	        focus: true,
	        convertDivs: true,
	        deniedTags: ['h1', 'h2'],
	        //  allowedTags: ['p', 'h1', 'h2', 'pre','li','u','i','ul','ol','b']
	    });
	    $(".redactor_toolbar").css("height", "30px");
	    setConfirmUnload(true);
	}
	function exampleClickToSave(area) {
	    // destroy editor

	    window.cur = 0;
	    $('#' + area).redactor('destroy');
	    var t = $('#' + area).html();

	    
	    var data = {};
	    data['data'] = $("#" + area).html();
	    data['filename']=area;
	    data['eid']=window.eid;

	    setConfirmUnload(false);
	    $.post(window.filesaveurl, data)
	        .done(function(data) {
	            //console.log(data);
	            console.log(area + " saved");
	        }).fail(function() {
	            console.log("Network error");
	        })
	}

                
           
	$('.editable-content').click(function(){
		var id=$(this).data('filename');
		exampleClickToEdit(id);
	})
	 $("body").mouseup(function(e)
    {
        var subject = $("#"+window.cur); 
        if(window.cur==0){

        }
        else if(e.target.id != subject.attr('id') && !subject.has(e.target).length && !$(e.target).parents(".redactor_box").size() && !$(e.target).parents("#redactor_modal").size())
        {
           exampleClickToSave(window.cur);
        }
    });
	$('.edit-btn').click(function(e){
		e.preventDefault();
		var id=$(this).data('filename');
		//alert(id);
		exampleClickToEdit(id);
	})
