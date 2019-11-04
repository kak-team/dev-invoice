@extends('master')
@section('content')
<style>
table#airline td {
    padding: 5px;
}
</style>
@include('modal.modal')

@if(session('success'))
    <script>
        $(document).ready(function(){
            toastr["success"]("Successfully") ;
        });
    </script>
@endif