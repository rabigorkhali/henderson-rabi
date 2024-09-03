@extends('layouts.master')

@section('filter')

    <div class="row">
        <form method="get" action="" style="display:flex;">
            <div class="col-md-4 mb-2">
                {{__('Keyword')}}
                <input type="text" value="{{request('search')}}" name="search" class="form-control"
                       placeholder="Search by title or body">
            </div>
            <div class="col-md-4 mb-2">
                @php
                    $categories = request()->query('categories', []);
                @endphp
                {{__('Select Category')}}
                <select id="categories" multiple name="categories[]" class="form-control">
                    <option value="">Select Categories</option>
                    @foreach($postCategories as $postCategoryKey => $postCategoryDatum)
                        <option @if($categories && in_array($postCategoryDatum->id, $categories)) selected
                                @endif   value="{{$postCategoryDatum->id}}">{{$postCategoryDatum->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-2 mt-4">
                <button type="submit" class="btn btn-sm btn-warning">{{__('Search')}}</button>
                <a href="{{ url()->current() }}" class="btn btn-sm btn-success">{{__('Clear')}}</a>
            </div>
        </form>
    </div>
@endsection
@section('content')

    <table class="table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Categories</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @if ($posts->count())
            @foreach ($posts as $keyPostDatum => $datumPost)
                <tr>

                    <td>{{ $i = 1 + $keyPostDatum }}</td>
                    <td><a style="text-decoration:none;"
                           href="{{ URL::to($postUrl) . '/' . $datumPost->id }}">{{ $datumPost->title ?? '' }}</a></td>
                    <td>{{ substr($datumPost->body ?? '',0,50 )}}...</td>
                    <td>
                        @php        $categories = ''; @endphp
                        @foreach ($datumPost->categories as $datumCategory)
                            @php
                                $categories .= $datumCategory->name . ', '
                            @endphp
                        @endforeach
                        {{ rtrim(trim($categories), ',') ?? 'N/A' }}
                    </td>
                    <td>
                        @if($datumPost->image)
                            <img class="thumbnail img" height="20"
                                 src="{{asset('/uploads/posts/' . $datumPost->image)}}">
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ URL::to($postUrl) . '/' . $datumPost->id }}">Read
                            more..</a>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">Data not found.</td>
            </tr>
        @endif


        </tbody>

    </table>
    <div class="row">
        <div class="col">
            <nav>
                {{ $posts->appends(request()->query())->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
<hr>
    <h4>{{__('Post from Api')}}</h4>
    <table class="table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apiPosts as $apiPostDatum)
        <tr>
            <td>{{$apiPostDatum['id']}}</td>
            <td>{{$apiPostDatum['title']}}</td>
            <td>{{$apiPostDatum['body']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
