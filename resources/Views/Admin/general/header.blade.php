<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{page_title()->getTitle()}}</title>
        {!! Assets::renderHeader() !!}
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed text-sm" {!! request()->has('locale') ? "onload='return loadAnimationWhenEditLanguage();'" : '' !!}>
<div class="wrapper">
