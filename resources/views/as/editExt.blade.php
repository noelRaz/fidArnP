@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Modification de personnel</h3>

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

            <form method="POST" action="{{url('updatepersext/'.$ext->ext_code)}}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!--Nom-->
                    <div class="mt-4 right-2">
                        <label>Nom</label>
                        <input id="extNomModif"
                                class="uppercase border block rounded mt-1 bf-full w-full"
                                type="text" name="extNom"
                                value="{{ $ext->extNom}}"/>
                    </div>

                    <!--Prénom-->
                    <div class="mt-4 left-2">
                        <label>Prénom</label>
                        <input id="extPrenomModif"
                                class="capitalize border block rounded mt-1 bf-full w-full"
                                type="text" name="extPrenom"
                                value="{{ $ext->extPrenom}}"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4 right-2">
                        <label>E-mail</label>
                        <input id="emailModif"
                                class="lowercase border block rounded mt-1 bf-full w-full"
                                type="email" name="extEmail" value="{{ $ext->extEmail}}"/>
                        </div>

                        <!--Fonction-->
                        <div class="mt-4 left-2">
                            <label>Fonction</label>
                            <input id="extFoncModif"
                                    class="uppercase border block rounded mt-1 bf-full w-full"
                                    type="text" name="extFonc"
                                    value="{{ $ext->extFonc}}"/>
                        </div>

                        <!--Contact-->
                        <div class="mt-4 right-2">
                            <label>Contact</label>
                            <input id="phoneModif"
                                    class="border block rounded mt-1 bf-full w-full"
                                    type="number"
                                    inputmode="tel"
                                    name="extTel"
                                    maxlength="10"
                                    value="{{ $ext->extTel}}"/>
                        </div>
                    </div>
                    <div class="flex mt-4">
                        <a href="{{url("listeAS/")}}">
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
