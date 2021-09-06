@extends('layouts.mainLayout')
@section('css')
{{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
    let map;
    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
      });
    }
  </script> --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>



  <link
  rel="stylesheet"
  href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"
  />

  <style>
      #map { height: 650px; }
      #menu {
        position: top;
        background: #efefef;
        padding: 10px;
        font-family: 'Open Sans', sans-serif;
        }
  </style>
@endsection
@section('headerPage')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
@endsection
@section('mainContent')
  <div class="col-md-12">
    <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Maps</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="map"></div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
  </div><!-- /.col -->
@endsection
@push('customScripts')
<script>
  let marker = [-4.96235131753212, 105.10924923338737]
  var map = L.map('map').setView(marker, 9);


  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoiZHdpcjQiLCJhIjoiY2syeGZhOG0zMGFjMjNuczg1MXJ1M3ptayJ9.m4xcIOu0VAbXgcmXqHnWDQ'
    }).addTo(map)

  let jasa = <?php echo JSON_encode($data); ?>;

  for (i in jasa) {
    Options = {
        'maxWidth': '500',
        'className': 'custom'
    };
    customPopup = "<b>Nama Jasa : </b>" + jasa[i].fullname + "<br><b>Alamat : </b>" + jasa[i].address;
    start = L.marker([jasa[i].lati, jasa[i].longi]).addTo(map).bindPopup(customPopup, Options)
    }
</script>
@endpush