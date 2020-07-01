<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Favicon-->
		<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png') }}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png') }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png') }}">
		<link rel="icon" media="(prefers-color-scheme:dark)" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192-dark.png') }}">
		<link rel="icon" media="(prefers-color-scheme:light)" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png') }}">
		
		<link rel="icon" media="(prefers-color-scheme:dark)" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32-dark.png') }}">
		<link rel="icon" media="(prefers-color-scheme:light)" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
		
		<link rel="icon" media="(prefers-color-scheme:dark)" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96-dark.png') }}">
		<link rel="icon" media="(prefers-color-scheme:light)" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png') }}">
		
		<link rel="icon" media="(prefers-color-scheme:dark)" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16-dark.png') }}">
		<link rel="icon" media="(prefers-color-scheme:light)" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ asset('images/favicon/manifest.json') }}">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.png') }}">
		<meta name="theme-color" content="#E21E32">

		<!-- favicon switcher dark/light mode -->
		<script src="https://unpkg.com/favicon-switcher@1.2.2/dist/index.js" crossorigin="anonymous" type="application/javascript"></script>

        <!-- Title -->
        <title>Η σελίδα που ζητήσατε δεν μπορεί να βρεθεί!</title>
        

        <!-- Font for coming soon page -->
        <link href="https://fonts.googleapis.com/css?family=Erica+One&amp;display=swap" rel="stylesheet">

        <!-- *************
            ************ Common Css Files *************
        ************ -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
		<!-- Main css -->
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Particles CSS -->		
        <link rel="stylesheet" href="{{ asset('css/particles.css') }}">

    </head>

	<body class="authentication">

		<div id="particles-js"></div>
		<div class="countdown-bg"></div>

		<div class="error-screen">
			<h1>404</h1>
			<h5>Λυπόμαστε!<br/>Δεν είναι δυνατή η εύρεση της σελίδας που ζητήσατε.</h5>
			<a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Επιστρέψτε στον Πίνακα ελέγχου</a>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>

		<!-- Particles JS -->		
		<script src="{{ asset('js/particles-custom-error.js') }}"></script>

	</body>
</html>