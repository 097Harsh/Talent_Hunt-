@php 
$count_id = old('count_id','');
$state_id = old('state_id','');
$city_id = old('city_id','');
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Portal: Registration</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <!-- Include only one version of jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!--/Header-->
    @include('user.common.header')
    <!--//Header-->
    
    

    <!-- breadcrumb -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">Get Registration </h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Registration    </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//breadcrumb-->

    <!-- contact2 -->
    <section class="w3l-contact-1 w3hny-form-btm py-5" id="login">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="header-sec text-center mb-5">
                    <h6 class="title-subhny mb-2">Please Register</h6>
                    <h3 class="title-w3l">
                        Sign up to access your job opportunities and <br> manage your career anytime
                    </h3>
                </div>
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="contactct-fm map-content-9">
                    <form action="{{route('register')}}" class="pt-lg-4" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" required="">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required="">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter your contact number" value="{{ old('contact') }}" required="">
                            @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" value="{{ old('password') }}" required="">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter your confirm password" value="{{ old('confirm_password') }}" required="">
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="role_id" id="role_id" required="">
                                    <option value="" disabled selected>-----Select an Role-----</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->role_id}}" {{ old('role_id') == $role->role_id ? 'selected' : '' }}>{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="count_id" id="count_id" required="">
                                    <option value="" disabled selected>-----Select Country-----</option>
                                   
                                </select>
                                @error('count_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="state_id" id="state_id" required="">
                                    <option value="" disabled selected>-----Select State-----</option>
                                   
                                </select>
                                @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="city_id" id="city_id" required="">
                                    <option value="" disabled selected>-----Select City-----</option>
                                   
                                </select>
                                @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="text-lg-center">
                            <!-- Submit Button -->
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-style mt-lg-5 mt-4">register</button>
                        </div>
                    </form>
                    <!-- Message for Users Not Registered -->
             </div>
            </div>
        </div>
    </section>
    <!-- /contact2 -->

    <!-- footer -->
    @include('user.common.footer')
    <!-- //footer -->

    <!-- Js scripts -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
    <!-- Template JavaScript -->
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            var CountryId = "{{$count_id}}";
            var StateId = "{{$state_id}}";
            var CityId = "{{$city_id}}";
            //for country
            $.ajax({
            url: "/get_country",
            type: 'GET',
            success: function(data) {
                $('#count_id').empty();
                $('#count_id').append('<option value="">-----Select an Country-----</option>');
                for (var i = 0; i < data.length; i++)
                {
                    var selected = data[i].country_id == CountryId ? 'selected' : '';
                    $('#count_id').append('<option value="' + data[i].country_id + '" ' + selected + '>' + data[i].country_name + '</option>');
                }
                if (CountryId) {
                    $('#count_id').val(CountryId).trigger('change');
                }
            }
            });
            //for state
            $('#count_id').change(function(){
                var countryId = $(this).val();
                console.log(countryId);
                $('#state_id').empty();
                $('#state_id').append('<option value="">Select an State</option>')
                $('#city_id').empty();
                $('#city_id').append('<option value="">Select an City</option>')
                if(countryId)
                {
                    $.ajax({
                        url: "/get_state",
                        type:"GET",
                        data :{id:countryId},
                        success: function(data) 
                        {
                           console.log("stateid:",StateId);
                           for(var i=0;i<data.length;i++)
                            {
                                var selected = data[i].state_id == StateId ? 'selected':'';
                                $('#state_id').append('<option value="' + data[i].state_id + '" ' + selected + '>' + data[i].state_name + '</option>');   
                            } 
                            if(StateId)
                            {
                                $('#state_id').val(StateId).trigger('change');
                            }
                        }
                    });   
                }
            });
            //for city
            $('#state_id').change(function(){
                var stateId = $(this).val();
                console.log("stateid:",stateId);
                $('#city_id').empty();
                $('#city_id').append('<option value="">Select an City</option>')
                if(stateId)
                {
                    //console.log('stateid:',stateId);debugger;
                    $.ajax({
                        url: '/get_city',
                        type: 'GET',
                        data: { id: stateId },
                        success: function(data) {
                            for (var i = 0; i < data.length; i++) {
                                var selected = data[i].city_id == CityId ? ' selected' : '';

                                $('#city_id').append('<option value="' + data[i].city_id + '" ' + selected + '>' + data[i].city_name + '</option>');
                            }
                            if (StateId) {
                                $('#city_id').val(CityId).trigger('change');
                            }
                        }
                    });
                }
            });

        });
    </script>
</body>

</html>
