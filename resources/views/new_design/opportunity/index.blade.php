@extends('new_design.layout.app')
@section('meta-tags')
    <title>Мүмкіндіктер</title>
    <meta name="description" content="«JanELim» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Jan Elim"/>
@endsection
@section('content')
<!-- Main of the Page -->
<main id="mt-main">
    @include('new_design.opportunity._first_section')
    @include('new_design.opportunity._second_section')
    {{-- @include('new_design.about_us._third_section') --}}
    {{-- @include('new_design.about_us._fourth_section') --}}
</main><!-- Main of the Page end -->
@endsection