@extends('admin.layout')



@section('title', 'Dashboard')



@section('navigation')



  @parent

  

    @include('admin.superadmin.master.sidebar')

  

@endsection



@section('content')

  @if(session('success'))
    <div style="padding: 5px;">
      <div class="callout callout-success">
          <p>{{session('success')}}</p>
        </div>
    </div>
  @endif

  @if(session('error'))
    <div style="padding: 5px;">
      <div class="callout callout-danger">
          <p>{{session('error')}}</p>
        </div>
    </div>
  @endif

  <section class="content-header">

      <h1>

          Dashboard

          <small></small>

        </h1>

        <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li class="active">Dashboard</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

          <div class="col-xs-12">

              <div class="box">

                <div class="box-header with-border">

                  <h3 class="box-title">Add Codes </h3>
                  
                  <a href="{{url('download')}}" class="btn pull-right btn-info">Download File</a>
                  <a href="#" class="btn pull-right btn-info" style="margin-right:10px;">Send To Email</a>
                </div>

                <!-- /.box-header -->

                <form action="{{url('code/generate')}}" method="post">

                  <div class="box-body">

                    <input id="token" name="_token" type="text" value="{{csrf_token()}}" hidden>



                    <div class="row">



                      <div class="col-xs-6">

                        <div class="form-group @if($errors->has('code')) {{'has-error'}} @endif col-xs-12">

                            <label for="code" class="col-xs-5 control-label">@if($errors->has('code'))<i class="fa fa-times-circle-o"></i>@endif Number Of Codes</label>

                          <div class="col-xs-7">

                            <input class="form-control" value="{{old('code')}}" id="code" type="text" name="code">

                            @if($errors->has('code'))

                              <span class="help-block">{{ $errors->first('code') }}</span>

                            @endif

                          </div>

                        </div>

                      </div>



                    </div>



                  </div>

                  <div class="box-footer">

                    <button class="btn btn-primary pull-right" id="generate">Generate</button>

                  </div>

                </form>

                <!-- /.box-body -->

              </div>

              <!-- /.box -->

        </div>

          <!-- /.col -->

      </div>

    </section>

    <section class="content">

      <div class="row">

          <div class="col-xs-12">

              <div class="box">

                <div class="box-header with-border">

                  <h3 class="box-title">Code List</h3>

                </div>

                <!-- /.box-header -->

                  <div class="box-body">

                    <div class="row">



                      <div class="col-xs-6">

                        @if(count($codes) > 0)

                          @foreach($codes as $code)

                            <p><b>Code:</b>  <b style="margin-left:8px;">{{$code->code}}</b></p>

                          @endforeach

                        @endif

                      </div>



                    </div>



                  </div>

                <!-- /.box-body -->

              </div>

              <!-- /.box -->

        </div>

          <!-- /.col -->

      </div>

    </section>

@stop



@section('foot')

    

    @parent



    {{ Html::script('assets/plugins/jQuery/jquery-2.2.3.min.js') }}

    {{ Html::script('assets/bootstrap/js/bootstrap.min.js') }}

    {{ Html::script('assets/plugins/fastclick/fastclick.js') }}

    {{ Html::script('assets/dist/js/app.min.js') }}

    {{ Html::script('assets/plugins/sparkline/jquery.sparkline.min.js') }}

    {{ Html::script('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}

    {{ Html::script('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}

    {{ Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}

    {{ Html::script('assets/plugins/chartjs/Chart.min.js') }}

    {{ Html::script('assets/dist/js/pages/dashboard2.js') }}

    {{ Html::script('assets/dist/js/demo.js') }}



    <script type="text/javascript">
    </script>

  

@endsection