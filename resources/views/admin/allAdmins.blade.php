@extends('admin.layouts.layout')
@section('title')
{{__('site.allAdmins')}}
@endsection
@section('header')
{!! Html::style('public/assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
{!! Html::style('public/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">@yield('title')</span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="btn-group">
                                <a href="{{url('/addAdmin')}}">
                                <button id="sample_editable_1_new" class="btn sbold green"> 
                                    <i class="fa fa-plus"></i>
                                    {{__('site.admin')}}          
                                </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th> {{__('site.userName')}} </th>
                            <th> {{__('site.email')}} </th>
                            <th> {{__('site.joinedOn')}} </th>
                            <th> {{__('site.role')}} </th>
                            <th> {{__('site.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if($user->role == 'admin' || $user->role == 'RManger')
                                @php
                                    $role = $user->role;
                                @endphp
                                <tr class="odd gradeX">
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->UserName}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> {{__('site.'.$user->role)}}</span>
                                    </td>
                                    <th>
                                        <a href="admins/{{$user->id}}/edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>
                                        @if($user->id != '18')
                                        <a href="admins/{{$user->id}}/delete" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </th>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
@section('footer')
{!! Html::script('public/assets/pages/scripts/table-datatables-buttons.min.js') !!}
{!! Html::script('public/assets/global/scripts/datatable.js') !!}
{!! Html::script('public/assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('public/assets/pages/scripts/table-datatables-managed.min.js') !!}
{!! Html::script('public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
@endsection