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
		let firstimage = $("#firstImage");

		$.ajax({
			url: "../public/ajaxFiles.php",
			method: "POST",
			data: {"itemSellData":"","ItemID":sellID},
			success: function(a){
				console.log(a);
				let obj = JSON.parse(a)[0];
				
				title.html(obj.SItemTitle);
				price.html(obj.SItemPrice);
				sellername.val(obj.firstname +" "+obj.lastname);
				location.val(obj.SItemLocation);
				date.val(obj.SItemPosted);
				category.val(obj.SItemCat);
				mobile.val(obj.contactno);
				description.val(obj.SItemDesc);
				/*firstimage.html(
					+'<div class="item-slick3" data-thumb="data:image/jpeg;base64,'+obj.SItemImages+'">'
						+'<div class="wrap-pic-w pos-relative" id="firstImage">'
							+'<img src="data:image/png;base64,'+obj.SItemImages+'>'
							+'<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="src="data:image/png;base64,'+obj.SItemImages+'">'
								+'<i class="fa fa-expand"></i>'
							+'</a>'
						+'</div>'
					+'</div>'
					);*/
			}
		});
	});
})