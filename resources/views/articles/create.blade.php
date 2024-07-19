@extends('layouts.master')
<h1>Formulaire</h1>
<form action="articles/create" method="post" enctype="multipart/form-data">
@include('partials.article-form')
@csrf
{{-- OU --}}
{{ csrf_field() }}
</form>
