@extends('layouts.app')
@section(section: 'title')
    tour
    @endsection
@section('navbar')
<x-nav active3="active" />
@endsection
@section('header')
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('direngine/images/bg_3.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="index.html">Home</a></span> <span>Tour</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
          <x-find-city/>
                <div class="col-lg-9">
                    <div class="row">
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    
                   <x-tour/>                    

                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection



@section('footer')
    <x-footer />
@endsection
