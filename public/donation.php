<?php  
$sql = null;
$getData = null;
$linkClass = null;
  if(!isset($_GET['display'])){
    header("location: donation.php?display=all_donation");
  }
  
  if(isset($_GET['display'])){
     $getData = htmlentities($_GET['display']);
      $builder = $dom = null; 
      switch ($getData) {
      case 'all_donation':
        $category = null;
        $linkClass = '*';
        break;
      case 'apparels':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Apparels' &&  WLStatus = '1')";
        $category = "Apparels";
        $linkClass = '.apparels';
        break;
      case 'accessories':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Accessories' && WLStatus = '1')";
        $category = "Accessories";
        $linkClass = '.accessories';
        break;
      case 'bag':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Bag' && WLStatus = '1')";
        $category = "Bag";
        $linkClass = '.bag';
        break;
      case 'computers':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Computers' && WLStatus = '1')";
        $category = "Computers";
        $linkClass = '.computers';
        break;
      case 'appliances':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Appliances' && WLStatus = '1')";
        $category = "Appliances";
        $linkClass = '.appliances';
        break;
      case 'gadgets':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Gadgets' && WLStatus = '1')";
        $category = "Gadgets";
        $linkClass = '.gadgets';
        break;
      case 'vehicles':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Vehicles' && WLStatus = '1')";
        $category = "Vehicles";
        $linkClass = '.vehicles';
        break;
      case 'others':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Vehicles' && WLStatus = '1')";
        $category = "Others";
        $linkClass = '.others';
        break;

      
      default:
       header("location: donation.php?display=all_donation");
        break;
      }
  }
  ?>

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
    if($_GET['display'] != "all_donation"){
      $dataAll = json_decode(pagination("itemdonate","DItemStatus",1,"DItemCat",$category,$page,1,9,"DonateSellID","DESC","&display=".$_GET['display']),true);
    }else{
       $dataAll = json_decode(paginationAll("itemdonate","DItemStatus",1,$page,1,9,"DonateSellID","DESC","&display=".$_GET['display']),true);
    }
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>3RVillage</title>
  <?php include('link.php');?>
  </head>
  
<body class="bg-light">
  <?php 
      include('header2.php');
   ?>

  <!-- Product -->
   <section class="bg0 p-t-23 p-b-140 m-t-100 bg-light">
    <div class="container">
      <div class="p-b-10">
        <h3 class="ltext-103 cl5">
          Donation Overview
        </h3>
      </div>

      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" href="?display=all_donation" data-filter="*">
            All Wishlist
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=apparels" data-filter=".apparels">
            Apparels
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=accessories" data-filter=".accessories">
            Accessories
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=bag" data-filter=".bag">
            Bag
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=computers" data-filter=".computers">
            Computers
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=appliances" data-filter=".appliances">
            Appliances
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=gadgets" data-filter=".gadgets">
            Gadgets
          </a>
          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=vehicles" data-filter=".vehicles">
            Vehicles
          </a>
          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=others" data-filter=".others">
            Others
          </a>
        </div>

        <div class="flex-w flex-c-m m-tb-10">
        
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

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" id="wishlistSearch" type="text" name="search-product" placeholder="Search">
          </div>  
        </div>
      </div>

      <?php
        $builder = $dom = null; 
        foreach ($dataAll['data'] as $value) {
           $builder = 
          '

    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$linkClass.'">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
						<img src="../upload/'.$value['DItemImages'].'" height="334" width="270"/>
	
							<input type="hidden" name="itemsellID" value="'.$value['DonateSellID'].'">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									'.$value['DItemTitle'].'
								</a>

								<span class="stext-105 cl3">
									Desciption: '.$value['DItemDesc'].'
								</span>
							</div>
               <div class="mx-auto">
          <a href="#"><button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
           <p>Communicate</p> 
           </button></a>
        </div>
					
						</div>
					</div>
				</div>

    '; 
          $dom = $dom."".$builder;
        }
      ?>

      <div class="row isotope-grid" id="wishlistRes">
        <?php echo $dom; ?>
      </div>
  
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

  
  
    <?php
   include('footer.php');
?>

 </body>
</html>  

<!--===============================================================================================-->  
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/slick/slick.min.js"></script>
  <script src="../js/slick-custom.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/parallax100/parallax100.js"></script>
  <script>
        $('.parallax100').parallax100();
  </script>
<!--===============================================================================================-->
  <script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
  <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
  </script>
<!--===============================================================================================-->
  <script src="../vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/sweetalert/sweetalert.min.js"></script>
  
  <script>
    $('.js-addwish-b2').on('click', function(e){
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to cart !", "success");
      });
    });
  
  </script>
<!--===============================================================================================-->
  <script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      })
    });
  </script>
<!--===============================================================================================-->
  <script src="../js/main.js"></script>