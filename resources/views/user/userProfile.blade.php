<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Portal: Update Profile</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
                        <h2 class="w3ltop-title pt-4">Update Profile </h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Update Profile </li>
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
                    <h6 class="title-subhny mb-2">Please Update Profile</h6>
                    <h3 class="title-w3l">
                        Update your profile to enhance your job opportunities and <br> take control of your career anytime
                    </h3>
                </div>
                <div class="contactct-fm map-content-9">
                    <form action="{{route('register')}}" class="pt-lg-4" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter your contact" value="{{ old('contact') }}" required>
                            @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="objective" id="objective" class="form-control" placeholder="Enter your objective" required>{{old('objective')}}</textarea>
                            @error('objective') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="address" id="address" class="form-control" placeholder="Enter your address" required>{{old('address')}}</textarea>
                            @error('address') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter your Designation" value="{{ old('confirm_password') }}" required>
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Country Dropdown -->
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option value="" disabled selected>-----Select country-----</option>
                                    <!-- Add Country Options Here -->
                                </select>
                                @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- State Dropdown -->
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="state_id" id="state_id" required>
                                    <option value="" disabled selected>-----Select state-----</option>
                                    <!-- Add State Options Here -->
                                </select>
                                @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- City Dropdown -->
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="city_id" id="city_id" required>
                                    <option value="" disabled selected>-----Select City-----</option>
                                    <!-- Add City Options Here -->
                                </select>
                                @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Multi-Select Course Dropdown -->
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="course_id[]" id="course_id" multiple required>
                                    <option value="" disabled selected>-----Select Qualification-----</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->course_id }}" 
                                            @if(in_array($course->course_id, old('course_id', []))) selected @endif>
                                            {{ $course->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Multi-Select Skill Dropdown -->
                        <div class="form-group">
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="skill_id[]" id="skill_id" multiple required>
                                    <option value="" disabled selected>-----Select Skill Set-----</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->skill_id }}" 
                                            @if(in_array($skill->skill_id, old('skill_id', []))) selected @endif>
                                            {{ $skill->skill_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('skill_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-lg-center">
                            <!-- Submit Button -->
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-style mt-lg-5 mt-4">Update Profile</button>
                        </div>
                    </form>
                    <!-- Message for Users Not Registered -->
                    <p class="mt-4 text-center">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a> to get started with your job search!</p>    
                </div>
            </div>
        </div>
    </section>
    <!-- /contact2 -->

    <!-- footer -->
    @include('user.common.footer')
    <!-- //footer -->

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#course_id').select2({
                placeholder: "Select Qualifications", // Placeholder text
                allowClear: true // Option to clear selection
            });

            $('#skill_id').select2({
                placeholder: "Select Skills", // Placeholder text
                allowClear: true // Option to clear selection
            });
        });
    </script>
    <!-- Js scripts -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
    <!-- Template JavaScript -->
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
