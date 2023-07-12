@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Modification d'utilisateur</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body w-full">
            @if (Session::get('Success'))
            <div class="alert alert-success">
                {{ Session::get('Success') }}
            </div>
            @endif

            @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>

            @endif

            <form method="POST" action="{{url('updateUser/'.$user->id)}}">
                <label value="">{{ $user->name}}</label>
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!--Admin-->
                    <div class="mt-4 right-2">
                        <label>Admin</label>
                        <input id="userModif"
                                class="uppercase border block rounded mt-1 bf-full w-full"
                                type="number" name="userAdmin"
                                value="{{ $user->admin}}"/>
                        <?php if ($user->admin == 1) {?>
                            <input type="radio" value="0" name="userAdmin" class="border block" checked />
                        <?php } ?>

                    </div>

                    <!--Etat-->
                    <div class="mt-4 left-2">
                        <label>Etat</label>
                        <input id="userModif"
                                class="capitalize border block rounded mt-1 bf-full w-full"
                                type="number" name="userEtat"
                                value="{{ $user->role}}"/>
                    </div>
                    <div class="flex mt-4">
                        <a href="{{url("utilisateur/")}}">
                            <button type="button" class="btnbtn btn2 border-transparent right-2" > Annuler</button>
                        </a>
                        <button type="submit" class="btnbtn btn1 left-2" onclick= "return confirm('Voulez-vous vraiment modifier')">
                            {{ __('Modifier') }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        <div class="card-footer">
            <span>
            </span>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      <script src="js/modal.js"></script>
      <script src="js/modalModi.js"></script>

      <!-- jQuery -->

@endsection
