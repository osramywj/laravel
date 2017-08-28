@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">权限列表</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="/admin/roles/1/permission" method="POST">
                                <input type="hidden" name="_token" value="RPPMc0lhvtynKELDZljXlz9UZI9uNc55ip1P8GCM">
                                <div class="form-group">
                                    @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions[]"
                                                   checked
                                                   value="{{$permission->id}}">
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection