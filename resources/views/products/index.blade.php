@extends('layouts/default')

{{-- Page title --}}
@section('title')
    IBSN
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- put styling here -->

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('vendors/dataTable/datatables.min.css') }}" type="text/css">
@stop
{{-- Page content --}}
@section('content')
    <!-- Content -->

    <div class="content">

        <div class="page-header">
            <div class="col-md-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">members</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <p class="font-weight-bold">{{ $title }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <a href="{{ route('products.create') }}" id="add_button" class="btn btn-behance btn-sm about_btn"  title="Add Product"><i class="fa fa-plus"></i> </a>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body " id="index-table">

{{--                                {{ $products }}--}}
                                <table id="group-tb" class="table table-striped table-sm">
                                    <thead>
                                    <tr class="text-dark">
                                        <th>#</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @php $i = 1 @endphp--}}

                                    @php $meta = collect($products->meta) @endphp
                                    @php $i = ($meta['current_page']-1)* $meta['per_page'] + 1;@endphp
                                    @foreach($products->data as $product)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td class="text-capitalize">{{ $product->name ?? '' }}</td>
                                            <td class="text-capitalize">{{ $product->totalPrice ?? '' }}</td>
                                            <td class="text-capitalize">{{ $product->discount ?? '' }}</td>
                                            <td class="text-capitalize">{{ $product->rating ?? '' }}</td>
                                            <td>
                                                <a href="{{ route('products.show',$product->id) }}" class="about_btn" id="{{ $product->id }}" data-toggle="tooltip" title="view product">
                                                    <i class="ti-eye" ></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="{{ route('products.edit',$product->id) }}" class="about_btn" id="{{ $product->id }}" data-toggle="tooltip" title="edit product">
                                                    <i class="ti-pencil" ></i>
                                                </a>&nbsp;&nbsp;
                                                <a  onclick="document.getElementById('del-prod').submit();" class="text-danger ml-2 toa" id="{{ $product->id }}" data-toggle="tooltip" title="Delete">
                                                    <i class="ti-trash"></i>
                                                </a>
                                                <form method="POST" action="{{ route('products.destroy',$product->id) }}" id="del-prod">
                                                    @csrf @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info pull-left" id="user-list_info" role="status" aria-live="polite">
                                                Showing {{ $meta['from'] }} to {{ $meta['to'] }} of {{ $meta['total'] }} entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <nav aria-label="..." class=" pull-right">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $result = Str::afterLast($products->links->prev, 'api/') }}" tabindex="-1" aria-disabled="true">Previous</a>
                                                    </li>
                                                    <li class="page-item active" aria-current="page">
                                                        <a class="page-link" href="#">{{ $products->meta->current_page }} <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $result = Str::afterLast($products->links->next, 'api/') }}">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./ Content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- put scripts gera -->
    <!-- DataTable -->
    <script src="{{ asset('vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/floattrans.js') }}"></script>

@stop
