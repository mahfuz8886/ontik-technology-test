@extends('layouts.master')

@section('title', 'View Products')

@section('content')

    <div class="container-fluid px-4">

        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card mt-4">
            <div class="card-header">
                <h4>
                    All Products
                    <button type="button" class="btn btn-info float-end" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Add Product
                    </button>
                </h4>
            </div>
            <form action="" method="get" class="">
                <div class="row justify-content-between mt-2 p-2">
                    <div class="col-md-2">
                        <input type="text" name="title" placeholder="Product Title" class="form-control"
                            value="{{ Request::get('title') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="category_id" id="" class="form-control category_id">
                            <option value=""> --Select Category-- </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id ?? '' }}" @if (Request::get('category_id') == $category->id) selected @endif>
                                    {{ ucfirst($category->title ?? '') }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-3">
                        <select name="subcategory_id" id="subcategory_id" class="form-control subcategory_id">
                            <option value=""> --Select Subcategory-- </option>
                        </select>

                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Price Range</span>
                            </div>
                            <input type="text" name="price_from" aria-label="First name" placeholder="From"
                                class="form-control" value="{{ Request::get('price_from') }}">
                            <input type="text" name="price_to" aria-label="Last name" placeholder="To"
                                class="form-control" value="{{ Request::get('price_to') }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $product->title }} </td>
                                    <td> {{ $product->title }} </td>
                                    <td> {{ $product->price }} </td>
                                    <td>
                                        <form action="{{ route('delete_product', ['id' => $product->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

            <div class="card-footer">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        {{-- <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} out of
                          {{ $products->total() }} 
                      </p> --}}
                        <p>Showing 1 to 5 out of
                            10
                        </p>
                    </div>
                    <div class="col-md-2">
                        {{-- {{ $products->links() }} --}}
                        pagination
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Add Product Modal --}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_product') }}" id="add-form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> Title </label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter Product Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Category </label>
                                    <select name="category_id" id="category_id" class="form-control category_id">
                                        <option value=""> --Select Category-- </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id ?? '' }}"
                                                @if (Request::get('category_id') == $category->id) selected @endif>
                                                {{ ucfirst($category->title ?? '') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Category </label>
                                    <select name="subcategory_id" id="subcategory_id"
                                        class="form-control subcategory_id">
                                        <option value=""> --Select Subcategory mm-- </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Price </label>
                                    <input type="number" name="price" id="price" class="form-control"
                                        placeholder="Enter Product Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Thumbnail </label>
                                    <input type="text" name="thumbnail" id="thumbnail" class="form-control"
                                        placeholder="Enter Product Thumbnail">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> Description </label>
                                    <textarea name="description" id="myTextarea" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Product Modal --}}

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // find subcategory under category
            $('.category_id').on('change', function() {
                var category_id = $(this).val();
                var subcategory = $(this).next().closest('div').find('.subcategory_id');
                //console.log(subcategory);
                var options = '<option value="">--Select Subcategory--</option>';
                $.ajax({
                    type: "GET",
                    url: "{{ route('find_subcategory') }}",
                    data: {
                        category_id: category_id
                    },
                    success: function(response) {
                        console.log(response);
                        response.forEach(function(item, i) {
                            options += '<option value="' + item.id + '"> ' + item
                                .title +
                                ' </option>';
                        });
                        $('.subcategory_id').html(options);
                    }
                });
            });

            // Function for form Data to JSON Object
            function jsonData(targetForm) {
                var arr = $(targetForm).serializeArray();

                var obj = {};
                for (var a = 0; a < arr.length; a++) {
                    if (arr[a].value == "") {
                        return false;
                    }
                    obj[arr[a].name] = arr[a].value;
                }

                var json_string = JSON.stringify(obj);

                return json_string;

            }

            $('#save-product').on('click', function(e) {
                e.preventDefault();
                var jsonObj = jsonData("#addForm");
                console.log(jsonObj);
            });

        });
    </script>
@endsection
