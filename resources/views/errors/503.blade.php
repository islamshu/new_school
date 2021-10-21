@extends('errors::minimal')

@section('title', __('مدرسة عبقري المهارات'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'الموقع تحت الصيانة يرجى المحاولة في وقت لاحق'))
