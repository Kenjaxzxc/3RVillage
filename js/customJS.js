inactivePost();
post_notification();
my_interestedList();
transaction_notification();
function getURLData(dataname){
	return (location.search.split(dataname + '=')[1] || '').split('&')[0];
}

$(function(){
	$(".prevITEM").click(function(){
		let sellID = $(this).parent().find("input[name=itemsellID]").val();
		let user_id = $("input[name=user_id]").val();
		let btnMessage = $("#message-seller");
		let btnInterested = $("#interested");
		let title = $("#title");
		let price = $("#price");
		let expprice = $("#expprice");
		let sellername = $("#sellername");
		let location = $("#location");
		let date = $("#date");
		let dateEnd = $("#dateEnd");
		let category = $("#category");
		let mobile = $("#mobile");
		let description = $("#description");
		let firstimageThumb = $(".firstImage:eq(0)");
		let firstimageImage = $(".firstImage:eq(1)");
		let firstimageLink = $(".firstImage:eq(2)");

		$.ajax({
			url: "../public/ajaxFiles.php",
			method: "POST",
			data: {"ItemID":sellID},
			success: function(obj){
				console.log(obj);
				if(user_id == obj.accountid){
				//	btnInterested.html(html_int);
				//btnMessage.html(html_mes);
				title.html(obj.SItemTitle);
				price.html("₱ "+obj.itemPrice);
				expprice.val("₱ "+obj.expPrice);
				//sellername.html('ME');
				location.val(obj.SItemLocation);
				date.val(obj.startDate);
				dateEnd.val(obj.endDate);
				category.val(obj.SItemCat);
				mobile.val(obj.contactno);
				description.val(obj.SItemDesc);
				firstimageThumb.attr("data-thumb","../upload/"+obj.SItemImages1+"");
				firstimageImage.attr("src","../upload/"+obj.SItemImages1+"");
				firstimageLink.attr("href","../upload/"+obj.SItemImages1+"");
	
				}
				else{

				html_mes = '<a href="message.php?id='+obj.accountid+'" class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Message Seller</a>';
				
				html_int = '<a href="#" class="btnInterested flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Interested</a>';
				seller = '<a href="profile.php?id='+obj.accountid+'" class="">'+obj.firstname +" "+obj.lastname+'</a>';
				btnInterested.html(html_int);
				btnMessage.html(html_mes);
				title.html(obj.SItemTitle);
				price.html("₱ "+obj.itemPrice);
				expprice.val("₱ "+obj.expPrice);
				sellername.html(seller);
				location.val(obj.SItemLocation);
				date.val(obj.startDate);
				dateEnd.val(obj.endDate);
				category.val(obj.SItemCat);
				mobile.val(obj.contactno);
				description.val(obj.SItemDesc);
				firstimageThumb.attr("data-thumb","../upload/"+obj.SItemImages1+"");
				firstimageImage.attr("src","../upload/"+obj.SItemImages1+"");
				firstimageLink.attr("href","../upload/"+obj.SItemImages1+"");
	
				}
				$('.btnInterested').click(function(){
					//alert(user_id+" ---- "+sellID);
					$.ajax({
						url: "../public/insert_interested.php",
						method: "POST",
						data: {"user_id":user_id, "item_id":sellID},
						success: function(obj){
							html_list = '<a href="#" class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">On List</a>';
				
							btnInterested.html(html_list);
						}
					});
				});
			}

		});
	});
});
function my_interestedList(){

	let user_id = $("input[name='user_id']").val();
	let name = $("#item_name");
	let price = $("#item_price");
	let negotiate = $("#negotiate");
	let img = $("#item_img");

	let html = "";
	//alert(user_id);
	$.ajax({
			url: "../public/cart_controller.php",
			method: "POST",
			data: {"user_id":user_id},
			success: function(obj){
				thread = obj.thread;
				console.log(thread);
				for(var i=0; i<thread.length;i++){
					html += '<div class="header-cart-item-img">\
						<img src="../images/'+thread[i].img+'" alt="IMG"><p id="item_img"></p>\
						</div>\
						<div class="header-cart-item-txt p-t-8">\
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">\
								<p id="item_name">'+"Title: "+thread[i].title+"<br> Category: "+thread[i].category+'</p>\
							</a>\
							<span class="header-cart-item-info">\
								<p id="item_price">'+"Price: "+thread[i].price+'</p>\
							</span>\
							<p id="negotiate"><a href="message.php?id='+thread[i].acc_id+'" class="btn btn-primary">negotiate</a></p>\
						</div>';
					
				
				}
				$('.header-cart-item').html(html);
				
			}

		});
}
function inactivePost(){
	let sellID = $("#itemsellID").val();
	let title = $("#itemTitle").val();
	let category = $("#itemCat").val();

	refresh = setInterval(function(){
		$.ajax({
			url: "../public/ajaxFiles.php",
			method: "POST",
			data: {"ItemID":sellID},
			success: function(obj){
				if(obj.notify == true){
				console.log(obj.notify);
					$.ajax({
					url: "../public/deactivatepost.php",
					method: "POST",
					data:{inactive:sellID},
					success: function(obj){																																																																																																																																																																				
						window.location = "../public/deactivatepost.php?inactive="+sellID;
					}
					});
					
				}
			}

		});
	}, 2000);
		
}

function post_notification(){
	let from = $("input[name='from']").val();
console.log(from);
	var html = '';
	//refresh = setInterval(function(){
		$.ajax({
				url:"../public/notification/post_notification.php",
				method: "POST",
				data: {from: from},
				success: function(response){
					console.log(response);
					if(response.status == true){
						thread = response.thread;
						if(thread.length > 0){
							for(var i=0; i<thread.length; i++){
								if(thread[i].n_status > 0){
									html += '<a class="dropdown-item" href="mypost.php"><div class="chat_list">\
						              <div class="chat_people">\
						                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
						                <div class="chat_ib">\
						                  <h5>'+thread[i].info+'<span class="chat_date">'+thread[i].time+'</span></h5>\
						                  <p>'+thread[i].details+'</p>\
						                </div>\
						              </div>\
						            </div></a>';
								}
								else{
									html += '<a class="dropdown-item" href="inactivepost.php"><div class="chat_list">\
						              <div class="chat_people">\
						                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
						                <div class="chat_ib">\
						                  <h5>'+thread[i].info+'<span class="chat_date">'+thread[i].time+'</span></h5>\
						                  <p>'+thread[i].details+'</p>\
						                </div>\
						              </div>\
						            </div></a>';
								}
									
							}
							$('#count_notif').html(response.unread_all);
						}
						$('#post-notification').append(html);
					}
					
				}
		});
	//}, 2000);	
}
function transaction_notification(){
	let from = $("input[name='from']").val();
console.log(from);
	var html = '';
	//refresh = setInterval(function(){
		$.ajax({
				url:"../public/notification/transaction_notification.php",
				method: "POST",
				data: {from: from},
				success: function(response){
					console.log(response);
					if(response.status == true){
						thread = response.thread;
						if(thread.length > 0){
							for(var i=0; i<thread.length; i++){
									html += '<a class="dropdown-item" href="profile.php?id='+thread[i].seller_id+'"><div class="chat_list">\
						              <div class="chat_people">\
						                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
						                <div class="chat_ib">\
						                  <h5>'+thread[i].seller_name+'<span class="chat_date">'+thread[i].date+'</span></h5>\
						                  <p>'+thread[i].details+'</p>\
						                </div>\
						              </div>\
						            </div></a>';
								
							}
							$('#count_notif').html(response.unread_all);
							$('#post-notification').append(html);
						}
						
					}
					
				}
		});
	//}, 2000);	
}
// function post_notification(){
// 	let sellID = $("#itemsellID").val();
// 	//console.log(sellID);
// 	refresh = setInterval(function(){
// 		$.ajax({
// 			url: "../public/ajaxFiles.php",
// 			method: "POST",
// 			data: {"itemSellData":"","ItemID":sellID},
// 			success: function(obj){
// 				//let obj = JSON.parse(a)[0];
// 				console.log(obj.notify);
				
// 				if(obj.notify == true){
// 				console.log(obj.notify);
// 					$.ajax({
// 					url: "../public/deactivatepost.php",
// 					method: "POST",
// 					data:{inactive:sellID},
// 					success: function(obj){
// 						//window.location = "../public/deactivatepost.php?inactive="+sellID;
// 					}
// 					});
					
// 				}
// 			}

// 		});
// 	}, 2000);
		
// }

// $(function(){
// 	$("#msgwishlist").click(function(){
// 		let wishlistid = $(this).parent().find("input[name=wishlistID]").val();
// 		let btnWishlist = $("#msgwishlist");
// 		$.ajax({
// 			url:"../public/wishlist.php",
// 			method: "POST",
// 			data: {},
// 			sucess: function(e){
// 				console.log(e);
// 				btnWishlist.html('<a href="message.php?id='+obj.accountid+'"><button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"><p>Communicate</p></button></a>');


// 			}


// 		});

// });
// });




$(function(){
	$("#sendNumber").click(function(){
		let contactno = $("input[name=contact]");
		let verify = $("input[name=verify]");
		if(contactno.val().length == 11){
			$.ajax({
				url:"../public/register.php",
				method: "POST",
				data: {"sendToNumber":"","contactnumber":contactno.val()},
				success: function(a){
					alert("Please check your phone for verification code");
					verify.removeAttr("readonly");
				}
			})
		}else{
			alert("Not a valid contact number");
		}
	});
});



$(function(){
	$("#updateNumber").click(function(){
		let contactno = $("input[name=contact]");
		let verify = $("input[name=verify]");
		if(contactno.val().length == 11){
			$.ajax({
				url:"../public/editprofile.php",
				method: "POST",
				data: {"sendupdateNumber":"","contactupdate":contactno.val()},
				success: function(a){
					alert("Please check your phone for verification code");
					verify.removeAttr("readonly");
				}
			})
		}else{
			alert("Not a valid contact number");
		}
	});
});

	
$(function(){
	$("rateModal").click(function(){
		// let minProd = $("#minProd").val();
		// let maxProd = $("#maxProd").val();
		// let url;

		url = getURLData("display");
		if(getURLData("display") != "all_products"){
			if(trim(minProd) == ""){
				minProd = 0;
			}
			if(trim(minProd) == ""){
				maxProd = 0;
			}


		}
	});
});

$(function(){
	$("button#searchProd").click(function(){
		let minProd = $("#minProd").val();
		let maxProd = $("#maxProd").val();
		let url;

		url = getURLData("display");
		if(getURLData("display") != "all_products"){
			if(trim(minProd) == ""){
				minProd = 0;
			}
			if(trim(minProd) == ""){
				maxProd = 0;
			}


		}
	});
});

 $(function(){
 	$("#searchProd").keyup(function(){
 		let search = $(this).val();
 		let res = $("#searchQueryRes");
 		let currentLink = getURLData("display");
 		if(currentLink == "all_products"){
	 		$.ajax({
				url:"../public/ajaxFiles.php",
				method: "POST",
				data: {"searchProd":"","search":search},
				success: function(a){
					let obj = JSON.parse(a);
					console.log(obj);
					res.empty().html(obj['data']);
				}
			});
		}else{
			$.ajax({
				url:"../public/ajaxFiles.php",
				method: "POST",
				data: {"searchProdFilter":"","search":search,"filter":currentLink},
				success: function(a){
					console.log(a);
					let obj = JSON.parse(a);
					console.log(obj);
					res.empty().html(obj['data']);
				}
			});
		}
 	});
 });

  $(function(){
 	$("#searchNGO").keyup(function(){
 		let search = $(this).val();
 		let res = $("#searchNGORes");
 		let currentLink = getURLData("display");
 		if(currentLink == "all_wishlist"){
	 		$.ajax({
				url:"../public/ajaxFiles.php",
				method: "POST",
				data: {"searchNGO":"","search":search},
				success: function(a){
					console.log(a);
					let obj = JSON.parse(a);
					console.log(obj);
					res.empty().html(obj['data']);
				}
			});
		}else{
			$.ajax({
				url:"../public/ajaxFiles.php",
				method: "POST",
				data: {"searchNGOFilter":"","search":search,"filter":currentLink},
				success: function(a){
					console.log(a);
					let obj = JSON.parse(a);
					console.log(obj);
					res.empty().html(obj['data']);
				}
			});
		}
 	});
 });

 $(function(){
 	$("#wishlistSearch").keyup(function(){
 		let search = $(this).val();
 		let res = $("#wishlistRes");
 		let currentLink = getURLData("display");
 		if(currentLink == "all_wishlist"){
	 		$.ajax({
				url:"../public/ajaxFiles.php",
				method: "POST",
				data: {"wishlist":"","search":search},
				success: function(a){
					console.log(a);
					let obj = JSON.parse(a);
					console.log(obj);
					res.empty().html(obj['data']);
				}
			});
		}else{
			$.ajax({
				url:"../public/ajaxFiles.php",
				method: "POST",
				data: {"wishlistFilter":"","search":search,"filter":currentLink},
				success: function(a){
					console.log(a);
					let obj = JSON.parse(a);
					console.log(obj);
					res.empty().html(obj['data']);
				}
			});
		}
 	});
 });

 $(function () {
  
  function setRating(rating) {
    $('#rating-input').val(rating);
    // fill all the stars assigning the '.selected' class
    $('.rating-star').removeClass('fa-star-o').addClass('selected');
    // empty all the stars to the right of the mouse
    $('.rating-star#rating-' + rating + ' ~ .rating-star').removeClass('selected').addClass('fa-star-o');
  }
  
  $('.rating-star')
  .on('mouseover', function(e) {
    var rating = $(e.target).data('rating');
    // fill all the stars
    $('.rating-star').removeClass('fa-star-o').addClass('fa-star');
    // empty all the stars to the right of the mouse
    $('.rating-star#rating-' + rating + ' ~ .rating-star').removeClass('fa-star').addClass('fa-star-o');
  })
  .on('mouseleave', function (e) {
    // empty all the stars except those with class .selected
    $('.rating-star').removeClass('fa-star').addClass('fa-star-o');
  })
  .on('click', function(e) {
    var rating = $(e.target).data('rating');
    setRating(rating);
  })
  .on('keyup', function(e){
    // if spacebar is pressed while selecting a star
    if (e.keyCode === 32) {
      // set rating (same as clicking on the star)
      var rating = $(e.target).data('rating');
      setRating(rating);
    }
  });
});