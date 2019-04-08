<!DOCTYPE html>
<html lang="en">
<head>
<title>CourseAdvisory Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{asset('admin/css/uniform.css ')}}" />
<link rel="stylesheet" href="{{asset('admin/css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/jquery.gritter.css') }}" />
</head>
<body>

    @include('Admin1.inc.navbar')
    @yield('content')
    @include('Admin1.inc.footer')    

<script src="{{ asset('admin/js/jquery.min.js') }}"></script> 
<script src="{{ asset('admin/js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>  
<script src="{{ asset('admin/js/jquery.uniform.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.validate.js') }}"></script>  
<script src="{{ asset('admin/js/matrix.js') }}"></script> 
<script src="{{ asset('admin/js/matrix.form_validation.js') }}"></script>  
<script src="{{ asset('admin/js/matrix.tables.js') }}"></script> 
@yield('scripts')
</body>
</html>