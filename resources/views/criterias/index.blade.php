@extends('layouts.app')
@section('title')
Criterias
@endsection
@section('css')
<link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Criterias</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('criterias.create')}}" class="btn btn-primary form-btn">Criterias <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('criterias.table')
                @include('criterias.templates.templates')
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    let recordsURL = "{{ route('criterias.index') }}/";
</script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
<script src="{{mix('assets/js/criterias/criterias.js')}}"></script>
@endsection