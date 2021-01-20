@extends('new_design.layout.app')
@section('meta-tags')
    <title>Главная</title>
    <meta name="description" content="«JanELim» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Jan Elim"/>
@endsection
@section('content')
    <!-- Main of the Page -->
    <main id="mt-main">
        @include('new_design.product._first_section')
        @include('new_design.product._second_section')
        {{-- @include('new_design.about_us._third_section') --}}
        {{-- @include('new_design.about_us._fourth_section') --}}
    </main><!-- Main of the Page end -->
@endsection