@extends('admin.layouts.app')

@section('htmlheader_title')
	Page
@endsection

@section('contentheader_title')
	Page
@endsection

@section('content')
    <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
    <script>
    tinymce.init({
        selector: '#tinymce',
        theme: 'modern',
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
        external_filemanager_path:"/js/filemanager/" ,
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "{{ asset('/js/filemanager/plugin.min.js') }}"}
    });
    </script>
	<div class="container">
        <div class='row'>
            <div class='col-md-12'>
                <!-- Box -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ action('Admin\PageController@index') }}" class="btn btn-primary">< Retour à la liste</a>
                </div>
                <div class="box-body">
                    
                    @if(isset($page))
                    {!! Form::model($page, ['method'=>'put', 'url' => action('Admin\PageController@update', $page)]) !!}
                    @else
                    {!! Form::open(array('url' => action('Admin\PageController@store'), 'method' => 'POST', 'class'=>'form-horizontal')) !!}
                    @endif 
                        
                        @if(isset($page) && $page->title == '')
                            <div class="form-group clearfix">
                                <label class="control-label col-sm-2">Traduction de</label>
                                <div class="col-sm-10">{{$page->getTitleExist()}}</div>
                            </div>
                        @endif
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2">Langue</label>
                            <div class="col-sm-10">{!! Form::text('locale', App::getLocale(), ['class'=>'form-control', 'readonly']) !!}</div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2">Titre</label>
                            <div class="col-sm-10">{!! Form::text('title', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2">Alias</label>
                            <div class="col-sm-10">{!! Form::text('slug', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2">Meta title</label>
                            <div class="col-sm-10">{!! Form::text('meta_title', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2">Meta description</label>
                            <div class="col-sm-10">{!! Form::text('meta_description', null, ['class'=>'form-control']) !!}</div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2">Contenu</label>
                            <div class="col-sm-10">{!! Form::textarea('content', null, ['class'=>'form-control','id'=>'tinymce']) !!}</div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10"><label>{!! Form::hidden('active', 0) !!}{!! Form::checkbox('active', 1, null) !!} En ligne</label></div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10"> {!! Form::submit('Valider', ['class'=>'btn btn-large btn-primary']) !!} </div>
                        </div>
                    
                    {!! Form::close() !!}

                </div><!-- /.box-body -->
                </div><!-- /.box -->
                
            </div><!-- /.col -->
        </div><!-- /.row -->
	</div>
@endsection