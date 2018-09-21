$(function(){
	$(".prevITEM").click(function(){
		let sellID = $(this).parent().find("input[name=itemsellID]").val();
		let btnMessage = $("#message-seller");
		let title = $("#title");
		let price = $("#price");
		let sellername = $("#sellername");
		let location = $("#location");
		let date = $("#date");
		let category = $("#category");
		let mobile = $("#mobile");
		let description = $("#description");
		let firstimageThumb = $(".firstImage:eq(0)");
		let firstimageImage = $(".firstImage:eq(1)");
		let firstimageLink = $(".firstImage:eq(2)");

		$.ajax({
			url: "../public/ajaxFiles.php",
			method: "POST",
			data: {"itemSellData":"","ItemID":sellID},
			success: function(a){
				let obj = JSON.parse(a)[0];
				html = '<a href="message.php?id='+obj.accountid+'" class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Message Seller</a>';
				
				btnMessage.html(html);
				title.html(obj.SItemTitle);
				price.html("₱ "+obj.SItemPrice);
				sellername.val(obj.firstname +" "+obj.lastname);
				location.val(obj.SItemLocation);
				date.val(obj.SItemPosted);
				category.val(obj.SItemCat);
				mobile.val(obj.contactno);
				description.val(obj.SItemDesc);
				firstimageThumb.attr("data-thumb","../upload/"+obj.SItemImages1+"");
				firstimageImage.attr("src","../upload/"+obj.SItemImages1+"");
				firstimageLink.attr("href","../upload/"+obj.SItemImages1+"");
			}
		});
	});
})


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