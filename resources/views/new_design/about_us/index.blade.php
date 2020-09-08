@extends('new_design.layout.app')
@section('meta-tags')
    <title>@lang('app.about_us')</title>
    <meta name="description" content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Jan Elim"/>
@endsection
@section('content')
<!-- Main of the Page -->
<main id="mt-main">
    @include('new_design.about_us._first_section')
    @include('new_design.about_us._second_section')
    {{-- @include('new_design.about_us._third_section') --}}
    {{-- @include('new_design.about_us._fourth_section') --}}
</main><!-- Main of the Page end -->
@endsection