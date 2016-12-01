<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilostemplate.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/css.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"rel="stylesheet">
    <link rel="icon" href="/img/icon.ico"/>

    {{-- <link href="/css/css.css" rel="stylesheet"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo') - noteFix</title>
</head>
<body>

  @include('partials.navbar')
  @yield('contenido')
  @yield('scripts')
