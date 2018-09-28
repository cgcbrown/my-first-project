<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet"  type="text/css" href="{{ URL::asset('css/index.css') }}">

    <title>Chord</title>

    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    body { margin:0; padding:0; }
    #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>

    <?php
        use App\User;
        use App\Admin;
     ?>
</head>
<body>
    <div class='container-fluid'>
        @section('map')
            
        @show
        <div class = 'row'>
            <div class = 'col-lg-1'>
                <div class="wrapper">
                    <!-- Sidebar -->
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3>Chord</h3>
                        </div>

                        <ul class="list-unstyled components">
                            <a href=" {{ route('index') }}"><p>Menu</p></a>
                            <li>
                                <a href="{{ route('user.interests') }}">Interested</a>
                            </li>
                            <li>
                                <a href="{{ route('user.favourites') }}">Favourites</a>
                            </li>
                            <li>
                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Filter</a>
                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                    <li>
                                        <a href="#">Filter 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Filter 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Filter 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('venues.view') }}">Venues</a>
                            </li>
                            <?php 
                            function adminView() {
                                $user_id = Auth::id();
                                $admins = Admin::all();
                                foreach ($admins as $admin) {
                                    if ($admin->user_id == $user_id) {
                                        ?>
                                        <li>
                                            <a href="{{ route('admin-venues.view') }}">Add Events</a>
                                        </li>
                                        <?php
                                    }
                                }
                            }

                            AdminView();
                             ?>                           
                            <li>
                                <br>
                                <a href="#">Contact us</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>       
            </div>
                @section('content')
                @show
        </div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiY2djYnJvd24iLCJhIjoiY2ptOHZieHduMHNoeTNwbnR0d2NudGQ5biJ9.Q4Sn0qdYeMUt4BhYUf9X6A';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/cgcbrown/cjm91831xez7d2rnic3loq6sh',
            center: [-3.178, 51.48],
            zoom: 13,
        });

        map.on('click', function(e) {
          var features = map.queryRenderedFeatures(e.point, {
            layers: ['venues'] // replace this with the name of the layer
          });

          if (!features.length) {
            return;
          }

          var feature = features[0];

          var popup = new mapboxgl.Popup({ offset: [0, -15] })
            .setLngLat(feature.geometry.coordinates)
            .setHTML('<h3>' + feature.properties.title + '</h3><p>' + feature.properties.description + '</p>')
            .setLngLat(feature.geometry.coordinates)
            .addTo(map);
        });
    </script>
   
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @section('script')
    @show
</body>
</html>