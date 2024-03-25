<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<link href="{{ asset('img/favicon.png') }}" rel="icon">
		<link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

		<!-- Fonts -->
		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/bootstrap-datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="{{ asset('css/theme/admin/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/theme/admin/custom.css') }}" rel="stylesheet">
	</head>
	<body>

		{{-- @include('layouts.navigation') --}}
		@include('layouts.partials.admin.navbar')

		@include('layouts.partials.admin.sidebar')

		<main id="main" class="main">
			{{ $slot }}
		</main>

		@include('layouts.partials.admin.footer')


		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap-datatables/dataTables.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap-datatables/dataTables.bootstrap5.min.js') }}"></script>
		<script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
		<script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
		<script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
		<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
		<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

		<!-- Vendor JS Files -->
		<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
		@include('sweetalert::alert')


		<!-- Template Main JS File -->
		<script src="{{ asset('js/theme/admin/main.js') }}"></script>
		<script src="{{ asset('js/theme/admin/custom.js') }}"></script>


		{{-- page specific js files --}}
		@stack('scripts')
	</body>
</html>
