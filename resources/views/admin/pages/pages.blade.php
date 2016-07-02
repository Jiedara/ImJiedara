@extends('admin.layouts.app')

@section('htmlheader_title')
	Pages
@endsection

@section('contentheader_title')
	Pages
@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ action('Admin\PageController@create') }}" class="btn btn-primary">+ Ajouter une page</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <tr role="row">
                                        <th class="col-md-1">ID</th>
                                        <th>Titre</th>
                                        <th>Slug</th>
                                        <th>Langue</th>
                                        <th class="col-md-1">Etat</th>
                                        <th class="col-md-2">Action</th>
                                    </tr>
                                    @foreach($pages as $page)
                                    <tr role="row">
                                        <td><a href="{{ action('Admin\PageController@edit', $page) }}">{{$page->id}}</a></td>
                                        <td><a href="{{ action('Admin\PageController@edit', $page) }}">{{$page->getTitleExist()}}</a></td>
                                        <td><a href="{{ action('Admin\PageController@edit', $page) }}">{{$page->slug}}</a></td>
                                        <td>
                                            @foreach (Config::get('languages') as $lang => $language)
                                                @if($page->hasTranslation($lang))
                                                    <img src="{{ asset('img/lang/'.$lang.'.png') }}" width="20" alt="{{$lang}}">&nbsp;
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><span class="badge @if($page->active) bg-green @else bg-orange @endif">&nbsp;</span></td>
                                        <td>
                                            {!! Form::model($page, ['method'=>'delete', 'class' => 'delete inline pull-right', 'onsubmit' => 'return confirm("Confirmez-vous la suppression de cet élément ?");', 'url' => action('Admin\PageController@destroy', $page)]) !!}
                                            {!! Form::submit('X', ['class'=>'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ action('Admin\PageController@edit', $page) }}" class="btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier
                                            </a>
                                        </td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection
