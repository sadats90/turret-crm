<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('image/favicon/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('image/favicon/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('image/favicon/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('image/favicon/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('image/favicon/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('image/favicon/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('image/favicon/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('image/favicon/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('image/favicon/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('image/favicon/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('image/favicon/manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">
	<script> window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.concat.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom-themes.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
	
	<!-- Added ajax-loader.css by rana on 25/03/19 -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/ajax-loader.css')}}">

	@yield('page_style')

</head>

<body>

		<main class="page-content">
			<div class="container-fluid">
				@yield('content')
			</div>
			<div id="footer">
				<div class="row">
					<div class="col-lg-4">
						
					</div>
					<div class="col-lg-4 text-center">
						<a href=""><i class="fa fa-copyright"></i> Turret Global</a>
					</div>
					<div class="col-lg-4">
	
					</div>
				</div>
			</div>
		</main>
		<!-- page-content" -->
	</div>
	<!-- page-wrapper -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<script src="{{ asset('js/vue.min.js') }}"></script>
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/datatables.min.js') }}"></script>
	
	@yield('script')

	<script>
        // SideNav Initialization
        $(document).ready(function(){
        	$("#create").on("click", function(){    
        		var action = $(this).data('action');
        		var model = $(this).data('model');
        		console.log(action);
        		$('#modalLoginForm').modal({show:true});
        		$('.modal-content').load('../resources/views/master/'+model+'/'+action+'.blade.php');
        	});

        	$('.data-table').DataTable({
        		responsive: true,
        	});

        })
    </script>
    <script>
        $(document).ready(function(){
            $("#select_store").on("change",function(){
            	var url = "<?php echo url('/inventory'); ?>";
                window.location = url+'?store_id='+this.value;
            })        
        });
    </script>
</body>
</html>