<footer class="pb-5 pb-4-sm">
    <div class="container container-lg pt-5 pt-4-sm">
        <div class="row m-auto pt-5 pt-4-sm pb-4">
            <div class="col p-0">
                <p class="footer-header mb-4 mb-2-sm">OUR ABOUT</p>
                <p class="footer-link mb-2 pointer" id="about-footer">เราคือใคร</p>
                <p class="footer-link mb-2 pointer" id="what-we-do-footer">เราทำอะไร</p>
            </div>
            <div class="col p-0">
                <p class="footer-header mb-4 mb-2-sm">OUR SERVICER</p>
                <p class="footer-link mb-2 pointer" id="register-footer">Register</p>
                <p class="footer-link mb-2 pointer" id="login-footer">Ower Login</p>
                <p class="footer-link mb-2 pointer" id="find-location-footer">Find Location</p>
            </div>
            <div class="col-auto col-sm p-0">
                <p class="footer-header mb-4 mb-2-sm">ADDRESS</p>
                <p class="footer-link mb-2"><b>อาคารศูนย์เรียนรู้สุขภาวะ </b><br>เลขที่ 4/2 ซ.วัฒนโยธิน แขวงถนนพญาไท เขตราชเทวี กรุงเทพมหานคร 10400</p>
                <p class="footer-link mb-2">โทรศัพท์ 02-343-1500 / โทรสาร 02-343-1551</p>
            </div>
        </div>
        <p class="footer-header">CONTACT US</p>
        <div class="row mx-0">
            <div class="col-6 col-sm-12 p-0 mb-3">
                <div class="row mx-0">
                    <div class="d-flex col col-sm-auto p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/facebook.png');?>">
                    </div>
                    <div class="d-flex col col-sm p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/ocbp.png');?>" class="px-2">
                    </div>
                    <div class="d-flex col col-sm p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/accot.png');?>" class="px-2">
                    </div>
                    <div class="d-flex col col-sm p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/safethaibus.png')?>" class="px-2">
                    </div>
                    <div class="d-flex col col-sm p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/inside.png')?>" class="px-2">
                    </div>
                    <div class="d-flex col col-sm p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/seacc.png')?>">
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-12 p-0">
                <div class="row mx-0">
                    <div class="d-flex col col-sm-auto p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/thaihealth.png')?>">
                    </div>
                    <div class="d-flex col p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/chaladsue.png')?>" class="px-2">
                    </div>
                    <div class="d-flex col p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/consumer.png')?>" class="px-2">
                    </div>
                    <div class="d-flex col p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/ex-letter.png')?>" class="px-2">
                    </div>
                    <div class="d-flex col p-0 mb-3-sm">
                        <img src="<?php echo base_url('assets/image/footer/kidney_friend_club.png')?>" class="px-2">
                    </div>
                    <div class="d-flex col p-0">
                        <img src="<?php echo base_url('assets/image/footer/supermarket.png')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mx-5 mx-4-sm mt-5 mt-4-sm">
    <div class="container container-lg pt-4 pb-5">
        <div class="row m-0">
            <div class="col-12 col-sm-auto d-flex">
                <img src="assets/image/logo.png" class="copyright-img">
            </div>
            <div class="col-12 col-sm-auto d-flex">
                <span class="copyright-text px-3">Copyright ©Consumers International 2019 Website Privacy Policy</span>
            </div>
        </div>
    </div>
</footer>
<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(13.763681,100.539663),
            zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }

    function myMap_2() {
        var mapProp= {
            center:new google.maps.LatLng(13.763681,100.539663),
            zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap-2"),mapProp);
    }
</script>
<script>
    var swiper = new Swiper('.swiper-container', {
        /*autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },*/
        loop: true
    });
</script>

<script src="<?php echo base_url('assets/js/vue.js'); ?>"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>-->

<script src="<?php echo base_url('assets/js/axios.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/vue-google-maps.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/vee-validate.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/organization.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/vue-organization.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/uikit.min.js');?>"></script>
<!-- dependencies for zip mode -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dependencies/zip.js/zip.js')?>"></script>
<!-- / dependencies for zip mode -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dependencies/JQL.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dependencies/typeahead.bundle.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dist/jquery.Thailand.min.js')?>"></script>
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO0MLSEr7KK02AdUEbGjTH1c_HwTvNHo8&callback=myMap_2&libraries=places"></script>-->
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO0MLSEr7KK02AdUEbGjTH1c_HwTvNHo8&libraries=places"></script>-->

</body>
</html>
