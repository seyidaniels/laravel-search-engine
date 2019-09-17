<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 15px;
            }

            .google-logo
{
	padding: 20px 0;
}
.google-search
{
	padding: 20px 10px;
}
.google-search:focus
{
	box-shadow:silver 0 2px 10px; 
	border-color: silver;
}

input{
    width: 530px;
    height: 50px;
}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Search Cars 
                </div>

                <div class="row google-form justify-content-center">
                    <div class="col-12">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                </div>
                            @elseif (Session::has('message') && Session::get('searchResults')->count() > 0)
                                <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                </div>
                            @endif
                            <form action="/search" method="get">
                                <div class="form-group">
                                    <input class="form-control" maxlength="2048" name="q" type="text"  aria-autocomplete="both" aria-haspopup="false" autocapitalize="off" autocomplete="off" autocorrect="off" role="combobox" spellcheck="false" title="Search" value="" aria-label="Search">
                      <div class="btn-group">
                  <button type="submit" class="btn mt-4 btn-primary btn-lg">Google Search</button>                  
                </div>
                    </div>
                            </form>

                           
                    </div>
                </div>


                <div class="row justify-content-center">
                      <div class="col-12">
                            
                            @if (Session::has('searchResults'))
                            @php
                                $searchResults = Session::get('searchResults')
                            @endphp
                                @if($searchResults->count() > 0)

                                <table class="table">
                                        <thead>
                                        <tr>
                                            <th >#</th>
                                            <th >Name</th>
                                            <th>Miles Per Gallon</th>
                                            <th>Cylinder</th>
                                            <th>Displacement</th>
                                            <th>Horsepower</th>
                                            <th>Weight in LBS</th>
                                            <th>Acceleration</th>
                                            <th>Year</th>
                                            <th>Origin</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                @foreach ($searchResults as $index => $result)
                              
                                    <tr>
                                        <th scope="row"> {{ $index + 1 }}</th>
                                        <td>{{  $result->Name }} </td>
                                        <td>{{  $result->Miles_per_Gallon }} </td>
                                        <td>{{  $result->Cylinders }} </td>
                                        <td>{{  $result->Displacement }} </td>
                                        <td>{{  $result->Horsepower }} </td>
                                        <td>{{  $result->Weight_in_lbs }} </td>
                                        <td>{{  $result->Acceleration }} </td>
                                        <td>{{  $result->Year }} </td>
                                        <td>{{  $result->Origin }} </td>
                                    </tr>
                                
                                @endforeach

                                        </tbody>
                                </table>
                        {{ $searchResults->appends(['q' => Session::get('query')])->links() }}
                                @else 
                                    <div class="alert alert-danger" role="alert">
                                            Ooops! No search result exists for {{ Session::get('query') }}
                                    </div>
                                @endif
                                
                            @endif
                      </div>
                </div>
                
                
            </div>
        </div>
    </body>
</html>
