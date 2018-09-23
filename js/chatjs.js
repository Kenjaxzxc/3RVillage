
load_messages();
update_messages();
update_chatlist();
update_message_notification();
$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
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
					$("input[name='message']").val('');
					li = '<div class="outgoing_msg">\
			              <div class="sent_msg">\
			                <p>'+response.message+'</p>\
			                <span class="time_date">'+response.time+'</span> </div>\
			             </div>';

			        $('.mesgs .msg_history').append(li);
					$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
					update_chatlist();
					update_message_notification();
				}
			});
		
	});

$(document).on('keypress', '.type_msg .input_msg_write .write_msg', function(e){
        let from = $("input[name='from']").val();
		let to = $("input[name='to']").val();
		let message = $("input[name='message']").val();
    if(message !== "" && e.which == 13){
        
		$.ajax({
				url:"../public/messages/save_message.php",
				method: "POST",
				data: {from: from, to: to, message: message },
				success: function(response){
					console.log(response);
					$("input[name='message']").val('');
					li = '<div class="outgoing_msg">\
			              <div class="sent_msg">\
			                <p>'+response.message+'</p>\
			                <span class="time_date">'+response.time+'</span> </div>\
			             </div>';

			        $('.mesgs .msg_history').append(li);
					$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
					update_chatlist();
					update_message_notification();
				}
			});
        }
});
function load_messages(){
	let from = $("input[name='from']").val();
	let to = $("input[name='to']").val();
		$.ajax({
				url:"../public/messages/load_messages.php",
				method: "POST",
				data: {from: from, to: to},
				success: function(response){
					//console.log(response);
					if(response.status == true){
						thread = response.thread;
						for(var i=0; i<thread.length; i++){
							$('.mesgs .msg_history').append(thread[i].messages);
							$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
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
						if(thread.length > 0){
							console.log(response);
							for(var i=0; i<thread.length; i++){
								if(thread[i].from == to){
									$.ajax({ type: 'POST', url: '../public/messages/mark_read.php', data: { msg_id: thread[i].msg_id}});
								
									$('.mesgs .msg_history').append(thread[i].messages);
									$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
                   					
                   				}
                   				update_chatlist();
								update_message_notification();
                   			}
							
						}
						
					}
					
				}
		});
	}, 2000);
		
}
function update_chatlist(){
	let from = $("input[name='from']").val();
	let to = $("input[name='to']").val();
	var html = '';
	//refresh = setInterval(function(){
		$.ajax({
				url:"../public/messages/chat_list.php",
				method: "POST",
				data: {from: from, to: to},
				success: function(response){
					if(response.status == true){
						thread = response.thread;
						if(thread.length > 0){
							for(var i=0; i<thread.length; i++){
									html += '<a href="message.php?id='+thread[i].id+'"><div class="chat_list'+thread[i].id+'">\
						              <div class="chat_people">\
						                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
						                <div class="chat_ib">\
						                  <h5>'+thread[i].info+'<span class="chat_date">'+thread[i].time+'</span></h5>\
						                  <p>'+thread[i].message+'</p>\
						                </div>\
						              </div>\
						            </div></a>';
							}
							
						}
								$('.messaging .inbox_chat').html(html);
						
					}
					
				}
		});
	//}, 2000);	
}


function update_message_notification(){
	let from = $("input[name='from']").val();
console.log(from);
	var html = '';
	//refresh = setInterval(function(){
		$.ajax({
				url:"../public/messages/chat_list.php",
				method: "POST",
				data: {from: from},
				success: function(response){
					if(response.status == true){
						thread = response.thread;
						if(thread.length > 0){
							for(var i=0; i<thread.length; i++){
									html += '<a class="dropdown-item" href="message.php?id='+thread[i].id+'"><div class="chat_list'+thread[i].id+'">\
						              <div class="chat_people">\
						                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
						                <div class="chat_ib">\
						                  <h5>'+thread[i].info+'<span class="chat_date">'+thread[i].time+'</span></h5>\
						                  <p>'+thread[i].message+'</p>\
						                </div>\
						              </div>\
						            </div></a>';
							}
							$('#count_message').html(response.unread_all);
						}
						$('#message-notification').html(html);
					}
					
				}
		});
	//}, 2000);	
}