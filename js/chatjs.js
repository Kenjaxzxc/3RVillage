
load_messages();
update_messages();
update_chatlist();
update_message_notification();
$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
	$('#msg_send_btn').click(function(){
		let from = $("input[name='from']").val();
		let to = $("input[name='to']").val();
		let message = $("input[name='message']").val();
		var img = $("input[id='message_img']").val();
		var new_photo = new Array();
    	var form = $('#uploadPhotoForm')[0]; //  [0], because you need to use standart javascript object here
	    var formData = new FormData(form);

	    $.ajax({
	        url: "../public/messages/uploadPhoto.php",
	        type: "POST",
	        data:  formData,
	        contentType:false,
	        cache: false,
	        processData:false,
	        success: function(data){
	        	console.log(data);
	        	let _photo = data.photos;
	        	if(data.status == true){
	        		for(var i=0; i < _photo.length; i++){
	        			new_photo[i] = _photo[i];
	        		}
	        		
	        	}
		$.ajax({
				url:"../public/messages/save_message.php",
				method: "POST",
				data: {from: from, to: to, message: message, photo: new_photo },
				success: function(response){
					console.log(response);
					photos = "";message = "";
					mes = response.message.message;
					if(mes != ""){message = '<p>'+mes+'</p>';}
					else{message="";}
					photo = response.message.photo;
					for(var i=0; i<photo.length; i++){
						photos += '<img src="../upload/messages/'+photo[i]+'" style="width:100%;height:300px; border-radius:  0px 0px 20px 5px;margin-bottom:5px" />';
					}
					$("input[name='message']").val('');
					$("input[id='message_img']").val('');
					$(".message-box .preview-img").html('');
					li = '<div class="outgoing_msg">\
			              <div class="sent_msg">\
			              '+message+'\
			              <span>'+photos+'</span>\
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
	});
       

$(document).on('keypress', '.type_msg .input_msg_write .write_msg', function(e){
        let from = $("input[name='from']").val();
		let to = $("input[name='to']").val();
		let message = $("input[name='message']").val();
		var img = $("input[id='message_img']").val();
		var new_photo = new Array();
		var form = $('#uploadPhotoForm')[0]; //  [0], because you need to use standart javascript object here
	    var formData = new FormData(form);
    if(e.which == 13){

	    
$.ajax({
	        url: "../public/messages/uploadPhoto.php",
	        type: "POST",
	        data:  formData,
	        contentType:false,
	        cache: false,
	        processData:false,
	        success: function(data){
	        	//console.log(data);
	        	let _photo = data.photos;
	        	if(data.status == true){
	        		for(var i=0; i < _photo.length; i++){
	        			new_photo[i] = _photo[i];
	        		}
	        		
	        	}
		$.ajax({
				url:"../public/messages/save_message.php",
				method: "POST",
				data: {from: from, to: to, message: message, photo: new_photo },
				success: function(response){
					console.log(response);
					photos = "";message = "";
					mes = response.message.message;
					if(mes != ""){message = '<p>'+mes+'</p>';}
					else{message="";}
					photo = response.message.photo;
					for(var i=0; i<photo.length; i++){
						photos += '<img src="../upload/messages/'+photo[i]+'" style="width:100%;height:300px; border-radius:  0px 0px 20px 5px;margin-bottom:5px" />';
					}
					$("input[name='message']").val('');
					$("input[id='message_img']").val('');
					$(".message-box .preview-img").html('');
					li = '<div class="outgoing_msg">\
			              <div class="sent_msg">\
			              '+message+'\
			              <span>'+photos+'</span>\
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
					var div=""; var li=""; var img="";
					if(response.status == true){
						thread = response.thread;
						shared_photos = response.shared_photos;
						for(var i=0; i<thread.length; i++){

							photos = thread[i].photos;
						
							if(thread[i].from == from){
							
								li += '<div class="outgoing_msg">\
						              <div class="sent_msg">\
						              	'+thread[i].message;
						            for(var j=0;j<photos.length;j++){
						            	var a = photos[j].split('.');
										//console.log(a[0]);
										li += '<span><a href="#modal-photos-'+a[0]+'" data-toggle="modal"><img src="../upload/messages/'+photos[j]+'" style="width:100%;height:300px;border-radius: 0px 0px 20px 5px;margin-bottom:5px" /></a></span>';
									}
						        li += '<span class="time_date">'+thread[i].time+'</span>\
						                </div>\
						            </div>';
						        
							}
							else{
								
								li  += '<div class="incoming_msg">\
								<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
						              <div class="received_msg">\
						              <p>'+thread[i].name+'</p>\
						                <div class="received_withd_msg">\
						              	'+thread[i].message;
						            for(var j=0;j<photos.length;j++){
						            	var a = photos[j].split('.');
										li += '<span><a href="#modal-photos-'+a[0]+'" data-toggle="modal"><img src="../upload/messages/'+photos[j]+'" style="width:100%;height:300px;border-radius: 0px 0px 20px 5px;margin-bottom:5px" /></a></span>';
									}
						        li  +=  '<span class="time_date">'+thread[i].time+'</span>\
						                </div>\
						              </div>\
						            </div>';
							}
							 
						}
						$('.mesgs .msg_history').html(li);
						$('.mesgs .msg_history').animate({scrollTop: $('.mesgs .msg_history').prop("scrollHeight")}, 0);
						//Shared Content
						for(var z=0; z < shared_photos.length; z++){
						var a = shared_photos[z].split('.');		
						div += '<div style="height: 600px" class="modal fade" id="modal-photos-'+a[0]+'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
									  <div class="modal-dialog modal-lg" role="document">\
									    <div class="modal-content" style="height: 600px">\
									      <div class="modal-body mb-0 p-0" style="height: 600px">\
									      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">\
										  <ol class="carousel-indicators" style="background:blue;">';
										    	for(var x=0; x < shared_photos.length; x++){
										    		if(x == z){
										    			div += '<a href="#carouselExampleIndicators" data-slide-to="'+x+' class="active"> <img width="42" height="28" src="../upload/messages/'+shared_photos[x]+'"/> &nbsp; </a>';
										    		}
										    		else{
										    			div += '<a href="#carouselExampleIndicators" data-slide-to="'+x+'"> <img width="42" height="28" src="../upload/messages/'+shared_photos[x]+'"/> &nbsp;</a>';
										    		}
										    	}
										  div += '</ol>\
										  <div class="carousel-inner">\
										    ';
										for(var j=0; j < shared_photos.length; j++){
											if(j == z){
												 div += '<div class="carousel-item active">\
									      <img class="d-block w-100" height="600" src="../upload/messages/'+shared_photos[j]+'"/>\
										    </div>';
											}
											else{
												 div += '<div class="carousel-item">\
											      <img class="d-block w-100" height="600" src="../upload/messages/'+shared_photos[j]+'"/>\
												    </div>';
											}
										  
										}
										 div += '</div>\
										  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">\
										    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\
										    <span class="sr-only">Previous</span>\
										  </a>\
										  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">\
										    <span class="carousel-control-next-icon" aria-hidden="true"></span>\
										    <span class="sr-only">Next</span>\
										  </a>\
										</div>\
									      </div>\
									  </div>\
									    </div>\
									</div>';
							}
							$('.shared-content').html(div);
						
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
					var div = "";
					if(response.status == true){

						thread = response.thread;
						shared_photos = response.shared_photos;
						if(thread.length > 0){
							//console.log(response);
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
						//shared content modal
						for(var z=0; z < shared_photos.length; z++){
						var a = shared_photos[z].split('.');		
						div += '<div style="height: 600px" class="modal fade" id="upmodal-photos-'+a[0]+'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
									  <div class="modal-dialog modal-lg" role="document">\
									    <div class="modal-content" style="height: 600px">\
									      <div class="modal-body mb-0 p-0" style="height: 600px">\
									      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">\
										  <ol class="carousel-indicators" style="background:blue;">';
										    	for(var x=0; x < shared_photos.length; x++){
										    		if(x == z){
										    			div += '<a href="#carouselExampleIndicators" data-slide-to="'+x+' class="active"> <img width="42" height="28" src="../upload/messages/'+shared_photos[x]+'"/> &nbsp; </a>';
										    		}
										    		else{
										    			div += '<a href="#carouselExampleIndicators" data-slide-to="'+x+'"> <img width="42" height="28" src="../upload/messages/'+shared_photos[x]+'"/> &nbsp;</a>';
										    		}
										    	}
										  div += '</ol>\
										  <div class="carousel-inner">\
										    ';
										for(var j=0; j < shared_photos.length; j++){
											if(j == z){
												 div += '<div class="carousel-item active">\
									      <img class="d-block w-100" height="600" src="../upload/messages/'+shared_photos[j]+'"/>\
										    </div>';
											}
											else{
												 div += '<div class="carousel-item">\
											      <img class="d-block w-100" height="600" src="../upload/messages/'+shared_photos[j]+'"/>\
												    </div>';
											}
										  
										}
										 div += '</div>\
										  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">\
										    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\
										    <span class="sr-only">Previous</span>\
										  </a>\
										  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">\
										    <span class="carousel-control-next-icon" aria-hidden="true"></span>\
										    <span class="sr-only">Next</span>\
										  </a>\
										</div>\
									      </div>\
									  </div>\
									    </div>\
									</div>';
							}
							$('.shared-content .row').html(div);
						
						// if(shared_photos.length > 0){
						// 	for(var j=shared_photos.length-1;j>0;j--){
						// 		div = '<div class="col-md-4">\
						// 		<img src="../upload/messages/'+shared_photos[j]+'" style="width:100%;height:300px;border-radius: 20px 5px 20px 5px;margin-bottom:5px" />\
						// 		</div>';
								
						// 		$('.shared-content .row').append(div);
						// 	}

						// }
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