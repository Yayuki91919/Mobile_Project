<?php
include_once __DIR__ . '/layouts/header.php';
include_once __DIR__ . '/controller/firmwaresController.php';
include_once __DIR__ . '/controller/firmsController.php';

$id = $_GET['id'];

$firmware_controller = new firmwaresController();
$fim = $firmware_controller->showFirm($id);

$firm_img = $firmware_controller->imgFirm($id);

$firms_controller = new firmsController();
$firminfo = $firms_controller->firmsmodel($id);
// echo $firm_img['image'];
// var_dump($firm_img);
?>
<!--firmware download-->
<link rel="stylesheet" href="assets/css/dir.css">

<section class="bg-white g-0">
  <div class="container">
    <div class="path col-12">
    <ul>
            <?php
            foreach ($firminfo as $item) {

            ?>
                <li><a href=""><i class="ri-folder-2-line">&nbsp;</i>firmwares</a></li>

                <li><a href=""><i class="ri-folder-2-line">&nbsp;</i>
                        <?php echo $item['brand_name']; ?></a></li>

                <li><a href=""><i class="ri-folder-2-line">&nbsp;</i>
                        <?php echo $item['model_name']; ?></a></li>

                        <li><a href=""><i class="ri-folder-2-line">&nbsp;</i>
                        <?php echo $item['firmware_name']; ?></a></li>

            <?php
            }
            ?>
        </ul>
    </div>
  </div>

  <div class="container-fluid pt-1" style="background-color: whitesmoke;">
 
    <div class="card-body">

      <div class="row align-items-center h-100 fw-information my-4 p-3">
        <div class="col-8 align-item-center mx-auto bg-white p-4">

          <div class="card-title text-center pb-5" style="word-wrap: break-word;">
            <h3 class="p-head"><?php echo $fim['name'] ?></h3>
          </div>
          <table class="table border">
            <tbody>
              <tr>
                <td class="col-6 mt-2" style="text-align: right; font-size: 20px;"><b>Size</b></td>
                <td class="col-6 mt-2" style="text-align: left; font-size: 20px;"><span><?php echo $fim['size'] ?></span></td>
              </tr>
              <tr>
                <td class="col-6 mt-2" style="text-align: right; font-size: 20px;"><b>Type</b></td>
                <td class="col-6 mt-2" style="text-align: left; font-size: 20px;"><span><?php echo $fim['type'] ?></span></td>
              </tr>
              <tr>
                <td class="col-6 mt-2" style="text-align: right; font-size: 20px;"><b>Date</b></td>
                <td class="col-6 mt-2" style="text-align: left; font-size: 20px;"><span><?php echo $fim['created_at'] ?></span></td>
              </tr>
              <tr>
                <td class="col-6 mt-2" style="text-align: right; font-size: 20px;"><b>Version</b></td>
                <td class="col-6 mt-2" style="text-align: left; font-size: 20px;"><span><?php echo $fim['android_version'] ?></span></td>
              </tr>
              <tr>
                <td class="col-6 mt-2" style="text-align: right; font-size: 20px;"><b>MIUI Version</b></td>
                <td class="col-6 mt-2" style="text-align: left; font-size: 20px;"><span><?php echo $fim['miui_version'] ?></span></td>
              </tr>


            </tbody>
          </table>
          <div class=" ml-auto mr-auto ms-auto text-center justify-content-around">
          <div class="pt-3 pb-3">
            <a href="<?php echo $fim['download_link'] ?>" type="submit" class="btn rounded-1 w-50 border-0 mx-auto" id="down_btn">Download OneDrive&nbsp;<i class="ri-download-2-fill"></i></a>
          </div>
          <div class="pb-3">
            <a href="<?php echo $fim['download_link_1'] ?>" type="submit" class="btn rounded-1 w-50 border-0 mx-auto" id="down_btn">Download MediaFire&nbsp;<i class="ri-download-2-fill"></i></a>
          </div>
        </div>
        
        </div>


       

      </div>
    </div>

  </div>
  </div>
</section>
<?php
include_once __DIR__ . '/layouts/footer.php';
?>