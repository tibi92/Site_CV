	$(function(){

		$('form').submit(function(){

			var email = $('#email').val();
			var objet = $('#objet').val();
			var message = $('#message').val();
		$.ajax({    

			url:'httpdocs/form.php',
			type:'POST',
			data:{email:email,objet:objet,message:message},
			dataType:'json',
			success:function(html){

				if(html.errors){
					$('#result').text('');
					$('#result').append('<div class="alert alert-danger">'+html.message+'</div>').show();
					setTimeout(leaveSuccess(),3000);
				}else{

					$('#result').text('');
					$('#result').append('<div class="alert alert-success">'+html.message+'</div>').show();

					 email = $('#email').val('');
					 objet = $('#objet').val('');
					 message = $('#message').val('');

					setTimeout(leaveSuccess(),3000);

				}
			},

			error: function(error){

				alert(error);
			}

		});

			return false;
		});

		function leaveSuccess(){

		$('#result').animate({

			opacity:0

		},5000);
	}

	});


