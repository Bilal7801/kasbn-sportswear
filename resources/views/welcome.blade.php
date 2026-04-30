@extends('layouts.app')
 
@section('title', 'SialkotPro Sports — Premium Bulk Sports Goods Manufacturer & Exporter')
 
@section('content')
    @include('components.hero')
    @include('components.ticker')
    @include('components.stats')
    @include('components.products')
    @include('components.why-us')
    @include('components.process')
    @include('components.certifications')
    {{-- @include('components.testimonials') --}}
    @include('components.enquiry')
    
@endsection