$(document).ready(function() {
    $('.accept_friend_request').on('submit', function(event) { 
		event.preventDefault();  
		$form = $(this);
		axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		
		axios.post($form.attr('action'), {
			user : $form.children("input[name='user']").val() 
		}).then(function (response) {
			$form.parents('.media').remove();
		})
		.catch(function (error) {});
    });
});