@extends("layoutmain")
@section("main")
    <div class="content-wrapper" style="min-height: 1342.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Campaign</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Campaign</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url("campaign/save")}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="text" name="image" value="{{old("image")}}" class="form-control" id="exampleInputEmail1" placeholder="Enter image">
                                        @error("name")<div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" name="description" value="{{old("description")}}" class="form-control" id="exampleInputEmail1" placeholder="Enter description">
                                        @error("description")<div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id">
                                            <option value="0"> Choose Category </option>
                                            @foreach($categories as $item)
                                                <option @if (old("category_id") ==  $item->__get("id")) selected  @endif value="{{$item->__get("id")}}"> {{$item->__get("name")}} </option>
                                            @endforeach
                                        </select>
                                        @error("category_id")<div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

