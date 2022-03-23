@extends('layouts.app')

@section('content')
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         PUBLISHED POSTS
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $posts_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        TRASHED POSTS
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $trashed_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         TAGS
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $tags_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        CATEGORIES
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $categories_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         PUBLISHED PORTFOLIO ITEMS
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $pfposts_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        TRASHED PORTFOLIO ITEMS 
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $pftrashed_count }}</h1>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         PORTFOLIO CATEGORIES
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $pfcategories_count }}</h1>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         PAGES
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $pages_count }}</h1>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                         USERS
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $users_count }}</h1>
                    </div>
                </div>
            </div>

            
@endsection
