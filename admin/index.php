<?php
include("check_admin.php");
include('CRUD/db_connection.php');
include('components/head_links.php');

function getNumOfRow($con, $table_name)
{
  $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `$table_name`;"));
  return ($num < 10) ? "0" . $num : $num;
}

$item_1 = array("image" => "../Images/TRIP.svg", "key" => "Trip", "value" => getNumOfRow($con, 'trip'));
$item_2 = array("image" => "../Images/TICKET.svg", "key" => "Ticket", "value" => getNumOfRow($con, 'ticket'));
$item_3 = array("image" => "../Images/PASSENGER.svg", "key" => "Passenger", "value" => getNumOfRow($con, 'passenger'));
$item_4 = array("image" => "../Images/EMPLOYEE.svg", "key" => "Employee", "value" => getNumOfRow($con, 'employee'));
$item_5 = array("image" => "../Images/VEHICAL.svg", "key" => "Vehical", "value" => getNumOfRow($con, 'vehical'));
$item_6 = array("image" => "../Images/LOCATION.svg", "key" => "Location", "value" => getNumOfRow($con, 'location'));
$item_7 = array("image" => "../Images/STAND.svg", "key" => "Stand", "value" => getNumOfRow($con, 'stand'));
$item_8 = array("image" => "../Images/FACILITY.svg", "key" => "Facility", "value" => getNumOfRow($con, 'facility'));
$item_9 = array("image" => "../Images/INQUIRY.svg", "key" => "Inquiry", "value" => getNumOfRow($con, 'inquiry'));
$item_10 = array("image" => "../Images/COUPON.svg", "key" => "Coupon", "value" => getNumOfRow($con, 'coupon'));
$item_11 = array("image" => "../Images/COUNTRY.svg", "key" => "Country", "value" => getNumOfRow($con, 'country'));

$total_items = array($item_1, $item_2, $item_3, $item_4, $item_5, $item_6, $item_7, $item_8, $item_9, $item_10, $item_11);

?>

<div class="wrapper">

  <?php
  include('components/preloader.php');
  include('components/header.php');
  include('components/aside_bar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3 py-2">

    <div class="row p-lg-4 p-md-2 p-0" id="boxes_of_dashboard">
      <?php
      foreach ($total_items as $key => $value) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
          <div class="card px-3 py-3">
            <div class="row px-3 py-2 align-items-center text-white">
              <div class="col-5">
                <img src="<?php echo $value['image']; ?>" alt="" class="w-100">
              </div>
              <div class="col-7 text-center text-nowrap overflow-hidden">
                <h5>
                  <?php echo $value['key']; ?>
                </h5>
                <h1 id="box_value_<?php echo $key; ?>">
                  00
                  <!-- <?php echo $value['value']; ?> -->
                </h1>
                <div class="slider" data-slider_rate="75%"></div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>

  </div>
  <!-- /.content-wrapper -->

  <?php
  include('components/footer.php');
  ?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>

  $(document).ready(function () {
    setDefaultColor();
    var arr = <?php print_r(json_encode($total_items)); ?>;
    for (var num = 0; num < arr.length; num++) {
      setBoxesValue(arr, num);
    }
  })

  function setBoxesValue(arr, num) {
    var data = 0
    var intval = setInterval(() => {
      if (data < arr[num].value) {
        data++;
      }
      else {
        clearInterval(intval);
      }
      $(`#box_value_${num}`).html((data < 10) ? "0" + data : data);
    }, (arr[num].value > 50) ? 100 : 200);
  }

  function getRandColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }

  function setDefaultColor() {
    for (var num = 0; num < $("#boxes_of_dashboard").children().length; num++) {
      ($("#boxes_of_dashboard").children().children()[num]).setAttribute("id", `dashboard_box_${num + 1}`);
      $(`#dashboard_box_${num + 1}`).css({
        "background-image": `linear-gradient(to bottom right, ${getRandColor()}, ${getRandColor()}, ${getRandColor()}, ${getRandColor()}, ${getRandColor()})`
      });
    }
  }

</script>

<?php
include('components/foot_links.php');
?>