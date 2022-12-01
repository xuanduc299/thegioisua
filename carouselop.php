<style>
    .tcb-product-slider {
  
  padding: 40px 0;
}
.tcb-product-slider .carousel-control {
  width: 5%;
}
.tcb-product-item a {
  color: #147196;
}
.tcb-product-item a:hover {
  text-decoration: none;
}
.tcb-product-item .tcb-hline {
  margin: 10px 0;
  height: 1px;
  background: #ccc;
}
@media all and (max-width: 768px) {
  .tcb-product-item {
    margin-bottom: 30px;
  }
}
.tcb-product-photo {
  text-align: center;
  height: 180px;
  background: #fff;
}
.tcb-product-photo img {
  height: 100%;
  display: inline-block;
}
.tcb-product-info {
  background: #f0f0f0;
  padding: 15px;
}
.tcb-product-title h4 {
  margin-top: 0;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.tcb-product-rating {
  color: #acacac;
}
.tcb-product-rating .active {
  color: #FFB500;
}
.tcb-product-price {
  color: firebrick;
  font-size: 18px;
}



.details {
    margin: 50px 0; }
 .details h1 {
      font-size: 32px;
      text-align: center;
      margin-bottom: 3px; }
    .details .back-link {
      text-align: center; }
      .details .back-link a {
        display: inline-block;
        margin: 20px 0;
        padding: 15px 30px;
        background: #333;
        color: #fff;
        border-radius: 24px; }
        .details .back-link a svg {
          margin-right: 10px;
          vertical-align: text-top;
          display: inline-block; }
</style>
<div class="tcb-product-slider">
        <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="row">
                            <?php include('./component/carouselsp-option1.php') ?>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                        <?php include('./component/carouselsp-option2.php') ?>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
