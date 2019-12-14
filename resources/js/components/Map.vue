<template>
  <l-map ref="myMap" id="mapid" :options="{zoomControl: false, scrollWheelZoom: false}">
    <l-tile-layer :url="url"></l-tile-layer>
    <l-marker :lat-lng="center" ></l-marker>
  </l-map>
</template>

<script>
import {LMap, LTileLayer, LMarker } from 'vue2-leaflet';

export default {
    data () {
        return {
            url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
            zoom: 8,
            center: [36.20588, 58.79610],
        };
    },

    components: {
        LMap,
        LTileLayer,
        LMarker
    },
    mounted: function() {
        this.$nextTick(() => {
            var map = this.$refs.myMap.mapObject.setView([36.20588, 58.79610], 16);

            // this.$refs.myMap.mapObject.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            //     maxZoom: 18,
            //     id: 'mapbox.streets',
            //     accessToken: 'pk.eyJ1IjoiZW5nYm91c3RhbmkiLCJhIjoiY2swb3N3eTF0MGN5NzNnbnRqbTFyMDAzdCJ9.1K2DL0dtuX09qaPkoJVyKA'
            // }).addTo(map);
        })
    }
}
</script>

<style>
#mapid { height: 250px; }

</style>