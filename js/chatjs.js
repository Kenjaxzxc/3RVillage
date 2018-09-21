load_messages();
update_messages();
	$('#msg_send_btn').click(function(){
		let from = $("input[name='from']").val();
		let to = $("input[name='to']").val();
		let message = $("input[name='message']").val();
		$.ajax({
				url:"../public/messages/save_message.php",
				method: "POST",
				data: {from: from, to: to, message: message },
				success: function(response){
					console.log(response);
					li = '<div class="outgoing_msg">\
			              <div class="sent_msg">\
			                <p>'+response.message+'</p>\
			                <span class="time_date">'+response.time+'</span> </div>\
			             </div>';

			        $('.mesgs .msg_history').append(li);
				}
			})
	});


function load_messages(){
	let from = $("input[name='from']").val();
	let to = $("input[name='to']").val();
		$.ajax({
				url:"../public/messages/load_messages.php",
				method: "POST",
				data: {from: from, to: to},
				success: function(response){
					console.log(response);
					if(response.status == true){
						thread = response.thread;
						for(var i=0; i<thread.length; i++){
							$('.mesgs .msg_history').append(thread[i].messages);
						}
						
					}
					
				}
	});
}

function update_messages(){
	let from = $("input[name='from']").val();
	let to = $("input[name='to']").val();
	refresh = setInterval(function(){
		$.ajax({
				url:"../public/messages/update_messages.php",
				method: "POST",
				data: {from: from, to: to},
				success: function(response){
					if(response.status == true){
						thread = response.thread;
						for(var i=0; i<thread.length; i++){
							if(thread[i].from == to){
								$('.mesgs .msg_history').append(thread[i].messages);
								$.ajax({ type: 'POST', url: '../public/messages/mark_read.php', data: { msg_id: thread[i].msg_id}});
							}
							
						}
						
					}
					
				}
		});
	}, 2000);
		
}