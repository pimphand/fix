<footer id="footer">
  <div class="container">
    <div class="row" style="color: white">
        <div class="col col-md-4" style="margin-bottom:20px">
            <h3><span class="fa fa-home"></span> <b>Kantor</b></h3> 
            <div>
                <h5>
                Jl. Bulaksari 269 Sogo</h5>
                <h5>
                Desa Sogo</h5>
                <h5>
                Kecamatan Babat</h5>
                <h5>
                Kabupaten lamongan</h5>
                

            </div>
        </div>

        <div class="col col-md-4" style="margin-bottom:20px">
            <h3><span class="fa fa-phone"></span> <b>Kontak</b></h3> 
            <div class="social_area" style="margin-top: 0px;">
              <ul>
                <li><a href="https://www.facebook.com/groups/317855398241448/?fref=ts" data-toggle="tooltip" data-placement="top" title="MATRIC (Mathematics Creative Club) Of MANEBA"><span class="fa fa-facebook"></span></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="MATRIC (Mathematics Creative Club) Of MANEBA"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="MATRIC (Mathematics Creative Club) Of MANEBA"><span class="fa fa-google-plus"></span></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="MATRIC (Mathematics Creative Club) Of MANEBA"><span class="fa fa-linkedin"></span></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="MATRIC (Mathematics Creative Club) Of MANEBA"><span class="fa fa-pinterest"></span></a></li>
              </ul>
            </div>
        </div>

        <div class="col col-md-4" style="margin-bottom:20px">
            <h3><span class="fa fa-globe"></span> <b>Pengunjung</b></h3>
            <a href="https://info.flagcounter.com/37Ms"><img src="https://s05.flagcounter.com/count2/37Ms/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_12/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
        </div>
    </div>
    </div>
    
    
        <div class="col col-md-12 col-sm-12 col-xs-12" style="background-color:#333030; margin-top:8px">
            <div class="footer_inner" >
                <div class="container">
                  <p class="pull-left">Copyright &copy; 2017 Matric MAN 2 Lamongan</p>
                  <p class="pull-right">Mathematic Creative Club</p>
              </div>
            </div>
        </div>
    <!--<div class="row" style="margin-top:10px" >
      <div class="col col-md-12 col-sm-12 col-sm-12" >
        <div class="footer_inner" style="background-color:#333030">
            <div class="container">
              <p class="pull-left">Copyright &copy; 2017 Matric MAN 2 Lamongan</p>
              <p class="pull-right">Mathematic Creative Club</p>
              </div>
        </div>
      </div>
    </div>-->
  
</footer>

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/custom.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/jquery.flexslider-min.js"></script>
<script src="assets/js/main.js"></script> 
<script type="text/javascript" src="assets/js/jssor.slider.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
        jQuery(document).ready(function ($) {

            var options = {
                $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1,                     //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideEasing: $Jease$.$OutQuint,          //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                           //[Optional] Space between each slide in pixels, default value is 0
                $Cols: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $Align: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
              
                $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                },

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
</body>
</html>