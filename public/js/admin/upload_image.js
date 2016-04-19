
$(document).ready(function () {
	Dropzone.autoDiscover = false;
	$(".dropzone").dropzone({
        url: ROOT_PATH+"/ajax/admin/upload",
        paramName: "image", // The name that will be used to transfer the file
        acceptedFiles: 'image/*',
        accept: function (file, done) {
            if ((file.type).toLowerCase() != "image/jpg" &&
                    (file.type).toLowerCase() != "image/gif" &&
                    (file.type).toLowerCase() != "image/jpeg" &&
                    (file.type).toLowerCase() != "image/png"
                    ) {
                done("Invalid file");
            }
            else {
                done();
            }
        },
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        maxFilesize: 10, // MB
        //maxFiles: 4,
        parallelUploads: 1,
        addRemoveLinks: true,
        dictDefaultMessage: 'Drop files or click here to upload images.',
        //dictMaxFilesExceeded: "Bạn chỉ có thể tải lên tối đa 4 ảnh",
        //dictRemoveFile: "Xóa",
        //dictCancelUploadConfirmation: "Bạn chắc chắn muốn hủy tải lên?",
        //dictCancelUpload: "Hủy",
        //dictFileTooBig: 'Ảnh bạn tải lên quá lớn. Dung lượng ảnh tối đa là 2MB',
        //dictFallbackMessage: 'Trình duyệt mà bạn đang sử dụng không hỗ trợ chức năng này.',
        success: function(file, response){
        	response = jQuery.parseJSON(response);
        	if (response.flg == true) {
        		var inputHiden = '<input type="hidden" value="'+response.id+'" name="image[]" class="image_uploaded image_'+response.id+'">';
        		$('#dropzone_value').append(inputHiden);
        		$('#images_validate').val('true');
        		file.previewElement.querySelector("img").src = response.path;
        		file.responseServer = response;
        	}
        },
        removedfile: function(file) {
        	if (file.responseServer != undefined) {
	        	var id = file.responseServer.id;
	        	$('.image_'+id).remove();
	        	var data = {id: id}
	        	ajaxRemoveImage(data);
    		}
	        var _ref;
	        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
	      }
    });

});

function ajaxRemoveImage(data) {
	
	var action = ROOT_PATH+'/ajax/admin/remove-image';
	$.ajax({
		url: action,
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(response) {
			if (response.flg == true) {
				if ($('.image_uploaded').length == 0) {
					$('#images_validate').val('');
				}
				return true;
			} else {
				return false;
			}
		}
	});
}
