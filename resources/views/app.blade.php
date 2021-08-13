<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Antron/Ipa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style type="text/css">
            <!--
            .ipa_style_0_nothing {
                background-color: #808080;
            }
            .ipa_style_1_disable {
                background-color: #d3d3d3;
            }
            div.card {
                margin-bottom: 3em;
            }
            -->
        </style>
    </head>
    <body>
        <div class="container">
            <div class="py-lg-4">
                <h1>Antron/Ipa</h1>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">MENU</h5>
                    <ul>
                        @yield('menu')
                    </ul>
                </div>
            </div>

            @yield('content')

        </div>
    </body>
</html>
