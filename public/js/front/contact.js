$(document).ready(function() {
	$('#send_contact').click(function () {
		var contactName = $('#contact_name').val();
		var contactEmail = $('#contact_email').val();
		var contactMessage = $('#contact_message').val();
		var errorMessage = [];
		if (contactName.trim() == '') {
			errorMessage.push('お名前/法人名  is required.');
		}
		if (!isEmail(contactEmail)) {
			errorMessage.push('メールアドレス  is not email.');
		}
		if (contactMessage.trim() == '') {
			errorMessage.push('お問い合せ内容  is required.');
		}
		if (errorMessage.length > 0) {
			var message = errorMessage.join("\n");
			alert(message);
			return false;
		} else {
			$('#frmContact').submit();
		}
	});
});
function isEmail(email) {
	if (email.trim() == '') {
		return false;
	}
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}