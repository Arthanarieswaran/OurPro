<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('frontend.layouts.headstyle')
</head>

<body>
	@include('frontend.layouts.header')
	@yield('main-content')

	@include('frontend.layouts.footer')

</body>
</html>
