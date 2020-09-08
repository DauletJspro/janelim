@extends('new_design.layout.app')
@section('meta-tags')
    <title> @lang('app.opportunities')</title>
    <meta name="description" content="JanElim - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
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

@section('js')
    <script>        
        $(document).ready(function() {            
            // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
            $('.table-responsive-stack').find("th").each(function (i) {                
                $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+ $(this).text() + ':</span> ');
                $('.table-responsive-stack-thead').hide();
            });

            $('.table-responsive-stack').each(function() {
                var thCount = $(this).find("th").length; 
                var rowGrow = 100 / thCount + '%';
                //console.log(rowGrow);
                $(this).find("th, td").css('flex-basis', rowGrow);   
            });

            function flexTable() {
                if ($(window).width() < 768) {
            
                    $(".table-responsive-stack").each(function (i) {
                        $(this).find(".table-responsive-stack-thead").show();
                        $(this).find('thead').hide();
                    });                            
                    // window is less than 768px   
                } else {
                            
                    $(".table-responsive-stack").each(function (i) {
                        $(this).find(".table-responsive-stack-thead").hide();
                        $(this).find('thead').show();
                    });                
                }
                // flextable   
            }
            flexTable();
            window.onresize = function(event) {
                flexTable();
            };
            // document ready  
        });
    </script>
@endsection