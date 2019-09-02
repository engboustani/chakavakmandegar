<template>
        <div class="autoHeight" id="autoHeight">
          <div>
            <div>
              <img src="/img/gallery/img1.jpg" alt="" width="1600" height="500">
            </div>
          </div>
          <div>
            <div>
              <img src="/img/gallery/img2.jpg" alt="" width="1600" height="500">
            </div>
          </div>
          <div>
            <div>
              <img src="/img/gallery/img3.jpg" alt="" width="1600" height="500">
            </div>
          </div>
          <div>
            <div>
              <img src="/img/gallery/img4.jpg" alt="" width="1600" height="500">
            </div>
          </div>
          <div>
            <div>
              <img src="/img/gallery/img5.jpg" alt="" width="1600" height="500">
            </div>
          </div>
        </div>
</template>

<script>
import { tns } from "tiny-slider/src/tiny-slider";

export default {
    mounted: function() {
        var slider = tns({
            container: '#autoHeight',
            items: 1,
            center: true,
            swipeAngle: false,
            speed: 400,
            edgePadding: 100,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            mouseDrag: true,
            controls: false,
            nav: false,
            autoplayButtonOutput: false
        });
    }
}
</script>

<style>
.tns-outer {
    direction: ltr;
}
</style>