@extends('main')
@section('title',' | Tuskys')
@section('content')  
  <div class="top-right links row " >
                    @auth
                    <img src="{{asset('images/tuskys.png')}}" alt="..." class="img-circle profile_img" width="120px" height="100px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <h4><a href="{{ route('product.list') }}">Looooooooooool Jokes on you this aint the real thing!!!!!!!!!!!!!!!!!!!!!!! xD</a></h4>
                    @endauth
</div>
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count" style="font-size: x-large;">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box blue-bg bg-red" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-money"></i>
                    <div class="count">
                        Ksh. 0
                    </div>
                    <div class="title">Current Balance</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box brown-bg bg-primary" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="count">{{$totalrevenue}}</div>
                    <div class="title">Total Sales Revenue</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg bg-red" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-thumbs-o-up"></i>
                    <div class="count">{{$totalcategory}}</div>
                    <div class="title">Total Product Category</div>
                </div><!--/.info-box-->
            </div><!--/.col-->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg bg-primary" style="text-align: center;border-radius: 5px;">
                    <i class="fa fa-product-hunt"></i>
                    <div class="count">{{$totalproduct}}</div>
                    <div class="title">Total No. of Product</div>
                </div><!--/.info-box-->
            </div><!--/.col-->
        </div>
        <!-- /top tiles -->
        @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
        @endif
        @if(Session::has('error_message'))
            <div class="alert alert-danger">
                {{ Session::get('error_message') }}
            </div>
        @endif
        <div class="resp"></div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Make Quick Sales
                            <small>Create Sales</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                &emsp;<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                </ul>
                            </li>
                            <li>&emsp;<a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="btnSave" action="{{route('sales.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="product_id">Choose Product</label>
                                <select class="form-control js-example-basic-single" id="product_id" name="product_id" data-placeholder="--Search Product--" required>
                                </select>
                                <span class="error"><b>
                                       @if($errors->has('product_id'))
                                            {{$errors->first('product_id')}}
                                       @endif</b>
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Stock Available</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock Available" disabled>
                                <span class="error"><b>
                                         @if($errors->has('stock'))
                                            {{$errors->first('stock')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="price">Price per/pieces*</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="price" required>
                                <span class="error"><b>
                                         @if($errors->has('price'))
                                            {{$errors->first('price')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="sales_quantity">Sales Quantity</label>
                                <input type="number" min="1" value="1" class="form-control" id="sales_quantity" name="sales_quantity" placeholder="Quantity" required>
                                <span class="error"><b>
                                         @if($errors->has('sales_quantity'))
                                            {{$errors->first('sales_quantity')}}
                                         @endif</b></span>
                            </div>

                            <div class="form-group">
                                <label>Sales Status:- &nbsp;</label>
                                <input type="radio" name="sales_status" value="1" id="Active" checked=""><label for="Active"> Cash Sales </label>
                                <input type="radio" name="sales_status" id="deactive" value="0"><label for="deactive"> Credit Sales </label>
                            </div>
                            <input type="hidden" name="birthday_status" value="0">
                            <input type="hidden" name="dob" value="2017-">
                            <input type="hidden" name="phone" value="977-">
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="btnSave" class="btn btn-primary"> Make QuickSales </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Quick Sales Billing
                            <small>Listing Billing</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                &emsp;<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                </ul>
                            </li>
                            <li>&emsp;<a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="saleslist">

                        </div>
                        <div id="ajaxform">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    