<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>MyApp</title>
<link href="{{asset('css/app.css')}}?v={{$version}}" rel="stylesheet">
<link href="{{asset('theme/css/theme.css')}}?v={{$version}}" rel="stylesheet">
@yield('css')

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
