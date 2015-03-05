@extends('layout.partials.show')

@section('name')
	{{ $user->name }}
@stop

@section('show')
	@include('layout.partials.fields.text', ['label' => trans('messages.username'), 'field' => $user->username])
	@include('layout.partials.fields.text', ['label' => trans('messages.role'), 'field' => $user->role_name])
	@include('layout.partials.fields.email', ['label' => trans('messages.email'), 'field' => $user->email])
	@include('layout.partials.fields.text', ['label' => trans('messages.name'), 'field' => $user->name])
	@include('layout.partials.fields.text', ['label' => trans('messages.status'), 'field' => $user->status_text])
@stop