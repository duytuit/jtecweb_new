@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.dynamicColumn.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.dynamicColumn.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">required Title</label>
                                    <br>
                                    {{ $dynamicColumn->title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL</label>
                                    <br>
                                    {{ $dynamicColumn->slug }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">required Featured Image</label>
                                    <br>
                                    @if ($dynamicColumn->image != null)
                                    <img src="{{ asset('public/dynamicColumns/images/dynamicColumns/'.$dynamicColumn->image) }}" alt="Image" class="img width-100" />
                                    @else
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $dynamicColumn->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">required Description</label>
                                    <div>
                                        {!! $dynamicColumn->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">required Meta Description</label>
                                    <div>
                                        {!! $dynamicColumn->meta_description !!}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.dynamicColumns.edit', $dynamicColumn->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.dynamicColumns.index') }}" class="btn btn-dark ml-2">Hủy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
    </script>
@endsection
