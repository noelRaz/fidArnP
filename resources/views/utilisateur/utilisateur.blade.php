@extends('layouts.app')
@section('content')
<!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste utilisateur</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            {{-- <div class="input-group input-group-lg">
                <input type="search" class="form-control form-control-lg" placeholder="Entrer le nom">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div> --}}
            <table id="liste" class="table-style" style="width:100">
                <thead>
                    <tr>
                        <th text-align= "left" width="460px">Nom</th>
                        <th width="200px">E-mail</th>
                        <th width="200px">Admin</th>
                        <th width="200px">Etat</th>
                        <th class="text-center">Action</th>
                        </tr>
                </thead>
                <tbody class="w-4">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        {{-- <td>{{$item->role}}</td> --}}
                        <td>
                            <label class="switch">
                                <?php if($item->admin== 1) {?>
                                    <input name="roleDes" type="checkbox" checked value="0">
                                    <span class="slider round"></span>
                                <?php }
                                else {?>
                                        <input name="roleAct " type="checkbox" value="1">
                                        <span class="slider round"></span>
                                <?php } ?>
                            </label>
                        </td>
                        <td>
                            <label class="switch">
                                <?php if($item->role == 1) {?>
                                    <form method="POST" action="activeUser">
                                        <input name="roleDes" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </form>
                                <?php }
                                else {?>
                                        <input name="roleAct " type="checkbox">
                                        <span class="slider round"></span>
                                <?php } ?>
                            </label>
                        </td>
                        <td class="flex">
                            <a href="{{"editUser/".$item->id }}">
                                <button type="button" class="btn-act btn3 border-transparent" >
                                    <span class="fa fa-edit"></span>
                                </button>
                            </a>
                            <a href="{{"deleteUser/".$item->id }}" onclick= "return confirm('Voulez-vous vraiment supprimer')">
                                <button type="button" class="btn-act btn2 border-transparent">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <span>
                {{$data->links()}}
            </span>
        </div>
        <!-- /.card-footer-->
    </div>
      <!-- /.card -->
      <script src="js/modal.js"></script>
      <script src="js/modalModi.js"></script>
      <script src="js/boostrap-toggle.min.js"></script>

      <!-- jQuery -->
      <script>
        $(document).ready(function(){
            $("#user_table").DataTable()
        });
        $(function () {
            $('.toggle-class'.change(function(){
                var status = $(this).prop('checked') == true ? 1: 0;
                var user_id = $(this).data('id');
            }));
        });
      </script>

@endsection
