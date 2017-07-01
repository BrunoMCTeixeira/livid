$(document).ready(function() {
    $('.destroy_friend_request').on('submit', function(event) { 
		event.preventDefault();  
       	
		$form = $(this); 
        
		axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		
		axios.delete($form.attr('action'), {
			params : { user : $form.children("input[name='user']").val() }
		}).then(function (response) {
			$form.parents('.media').remove();
		})
		.catch(function (error) {});
    });
});