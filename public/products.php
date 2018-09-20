  <?php
	include('connection.php'); 
	 if(!isset($_GET['page']) || $_GET['page'] <=0 || !is_numeric($_GET['page'])){
        $page = 1;
      }else{
        $page = $_GET['page'];
      }

  function pagination($table,$field,$field1Ans,$field2,$field2Ans,$page,$offset,$limit,$order,$sort,$add){
        include('connection.php'); 
      // $add = (!empty($add)?"&".$add:"");
      $result = $totalPage = $totalPages = $offset = $sql = null;
      $arrayData = [];
      $sql = mysqli_query($conn,"SELECT COUNT(*) FROM $table WHERE $field = '$field1Ans' AND $field2 = '$field2Ans'");
      $totalPage = mysqli_fetch_array($sql)[0];
      $totalPages = ceil($totalPage/$limit);
      $sql = null;
      $totalPage = null;
      $offset = ($page-1) * $limit;
      $first = ($page <= 1)?"disabled":"";
      $prevLI = ($page <= 1)?"disabled":"";
      $prevLink = ($prevLI == "disabled")?"#":"?page=".($page-1)."".$add;
      $nextLI = ($page >= $totalPages)?"disabled":"";
      $nextLink = ($nextLI == "disabled")?"#":"?page=".($page+1)."".$add;
      $lastLI = ($page >= $totalPages)?"disabled":"";
      $lastLink = ($lastLI == "disabled")?"#":"?page=".$totalPages."".$add;
      $pagination = '
        <nav>
          <ul class="pagination">
            <li class="page-item '.$first.'"><a class="page-link" href="?page=1'.$add.'">First</a></li>
            <li class="page-item '.$prevLI.'"><a class="page-link" href="'.$prevLink.'">Prev</a></li>
            <li class="page-item '.$nextLI.'"><a class="page-link" href="'.$nextLink.'">Next</a></li>
            <li class="page-item '.$lastLI.'"><a class="page-link" href="'.$lastLink.'">Last</a></li>
          </ul>
        </nav>
        ';
      if(is_numeric($page)){
         $sql = mysqli_query($conn,"SELECT * FROM $table WHERE $field = '$field1Ans' AND $field2 = '$field2Ans' ORDER BY $order $sort LIMIT $offset,$limit");
         while ($row = mysqli_fetch_assoc($sql)){ 
          $arrayData[] = $row;
         }
      } 
      return json_encode(array("pagination"=>$pagination,"data"=>$arrayData,"showing"=>$page,"all"=>$totalPages));
    }

    function paginationAll($table,$field,$field1Ans,$page,$offset,$limit,$order,$sort,$add){
        include('connection.php'); 
      // $add = (!empty($add)?"&".$add:"");
      $result = $totalPage = $totalPages = $offset = $sql = null;
      $arrayData = [];
      $sql = mysqli_query($conn,"SELECT COUNT(*) FROM $table WHERE $field = '$field1Ans'");
      $totalPage = mysqli_fetch_array($sql)[0];
      $totalPages = ceil($totalPage/$limit);
      $sql = null;
      $totalPage = null;
      $offset = ($page-1) * $limit;
      $first = ($page <= 1)?"disabled":"";
      $prevLI = ($page <= 1)?"disabled":"";
      $prevLink = ($prevLI == "disabled")?"#":"?page=".($page-1)."".$add;
      $nextLI = ($page >= $totalPages)?"disabled":"";
      $nextLink = ($nextLI == "disabled")?"#":"?page=".($page+1)."".$add;
      $lastLI = ($page >= $totalPages)?"disabled":"";
      $lastLink = ($lastLI == "disabled")?"#":"?page=".$totalPages."".$add;
      $pagination = '
        <nav>
          <ul class="pagination">
            <li class="page-item '.$first.'"><a class="page-link" href="?page=1'.$add.'">First</a></li>
            <li class="page-item '.$prevLI.'"><a class="page-link" href="'.$prevLink.'">Prev</a></li>
            <li class="page-item '.$nextLI.'"><a class="page-link" href="'.$nextLink.'">Next</a></li>
            <li class="page-item '.$lastLI.'"><a class="page-link" href="'.$lastLink.'">Last</a></li>
          </ul>
        </nav>
        ';
      if(is_numeric($page)){
         $sql = mysqli_query($conn,"SELECT * FROM $table WHERE $field = '$field1Ans' ORDER BY $order $sort LIMIT $offset,$limit");
         while ($row = mysqli_fetch_assoc($sql)){ 
          $arrayData[] = $row;
         }
      } 
      return json_encode(array("pagination"=>$pagination,"data"=>$arrayData,"showing"=>$page,"all"=>$totalPages));
    }
    if($_GET['display'] != "all_products"){
      $dataAll = json_decode(pagination("itemsell","SItemStatus",1,"SItemCat",$category,$page,1,12,"ItemSellID","DESC","&display=".$_GET['display']),true);

    }else{
       $dataAll = json_decode(paginationAll("itemsell","SItemStatus",1,$page,1,12,"ItemSellID","DESC","&display=".$_GET['display']),true);
    }
  ?>

	<section class="bg0 p-t-23 p-b-140" id="products">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>


				<div class="flex-w flex-sb-m p-b-52">
		        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" href="?display=all_products#products" data-filter="*">
		            All Products
		          </a>

		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=apparels#products" data-filter=".apparels">
		            Apparels
		          </a>

		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=accessories#products" data-filter=".accessories">
		            Accessories
		          </a>

		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=bag#products" data-filter=".bag">
		            Bag
		          </a>

		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=computers#products" data-filter=".computers">
		            Computers
		          </a>

		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=appliances#products" data-filter=".appliances">
		            Appliances
		          </a>

		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=gadgets#products" data-filter=".gadgets">
		            Gadgets
		          </a>
		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=vehicles#products" data-filter=".vehicles">
		            Vehicles
		          </a>
		          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=others#products" data-filter=".others">
		            Others
		          </a>
		        </div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price Range
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									₱<input type="text" class="shadow-lg rounded p-2" name="" placeholder="Price Range Min">
								</li>

								<li class="p-b-6">
									₱<input type="text" class="shadow-lg rounded p-2" name="" placeholder="Price Range Max">
								</li>
							</ul>
							<div class="mt-2">
									<button type="submit" class="btn btn-outline-secondary">Search</button>
								</div>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php 
			$builder = $dom = null;
			// $sql = "SELECT * FROM itemsell"; 
		    foreach ($dataAll['data'] as $value) {
           $builder = 
		    	'
		    	<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$linkClass.'">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
						<img src="../upload/'.$value['SItemImages1'].'" height="334" width="270"/>
							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 prevITEM">
								Preview Item
							</a>
							<input type="hidden" name="itemsellID" value="'.$value['ItemSellID'].'">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									'.$value['SItemTitle'].'
								</a>

								<span class="stext-105 cl3">
									₱ '.number_format($value['SItemPrice'], 2, '.', ',').'
								</span>
							</div>

					
						</div>
					</div>
				</div>
		    	';	
		    	$dom = $dom."".$builder;
		 	}
		 	?>
		 	<div class="row isotope-grid">
				<?php echo $dom; ?>
			</div>
			<!-- Load more -->
		</div>
		
			<div class="flex-c-m flex-w w-full p-t-45">
        <?php   
                if($dataAll['all'] == 0){
                  echo '<div class="flex-c-m stext-101 cl5 size-103 bg2 bor1 ">No Data Found</div>';
                }
                else{
                echo "Showing pages ".$dataAll['showing']." of ".$dataAll['all'];
                ?>
                <div class="flex-c-m flex-w w-full p-t-45">
                  <?php 
                      echo $dataAll['pagination'];
                  
                }
             ?>
      </div>

	</section>
