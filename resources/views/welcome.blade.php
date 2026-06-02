@extends('layouts.app')
 
@section('title', 'KASBN Sportswear — Premium Athletic Gear & Equipment')
 
@section('content')
    @include('components.hero-banner')
    @include('components.featured-categories')
    @include('components.hero-cta')
    @include('components.featured-products')
    @include('components.collections')
    @include('components.brand-values')
    @include('components.newsletter')
    
@endsection