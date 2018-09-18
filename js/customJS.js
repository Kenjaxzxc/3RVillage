$(function(){
	$(".prevITEM").click(function(){
		let sellID = $(this).parent().find("input[name=itemsellID]").val();
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
				// console.log(obj);
				title.html(obj.SItemTitle);
				price.html("₱ "+obj.SItemPrice);
				sellername.val(obj.firstname +" "+obj.lastname);
				location.val(obj.SItemLocation);
				date.val(obj.SItemPosted);
				category.val(obj.SItemCat);
				mobile.val(obj.contactno);
				description.val(obj.SItemDesc);
				firstimageThumb.attr("data-thumb","../upload/"+obj.SItemImages+"");
				firstimageImage.attr("src","../upload/"+obj.SItemImages+"");
				firstimageLink.attr("href","../upload/"+obj.SItemImages+"");
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
					contactno.attr("readonly","true");
				}
			})
		}else{
			alert("Not a valid contact number");
		}
	});
});