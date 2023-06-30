@extends('layouts.app')
@section('content')
<!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Nouveau visiteur</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body bf-full w-full">
            <form method="POST" action="addVisi">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 bf-full w-full">
                    <!--Nom-->
                    <div class="mt-4 right-2">
                        <label>Nom</label>
                        <input id="visiNom"
                                class="uppercase border block rounded mt-1 bf-full w-full"
                                type="text" name="visiNom"/>
                    </div>

                    <!--Prénom-->
                    <div class="mt-4 left-2">
                        <label>Prénom</label>
                        <input id="visiPrenom"
                                class="capitalize border block rounded mt-1 bf-full w-full"
                                type="text" name="visiPrenom"/>
                    </div>

                    <!--Contact-->
                    <div class="mt-4 right-2">
                        <label>Contact</label>
                        <input id="phone"
                                class="border block rounded mt-1 bf-full w-full"
                                type="number"
                                inputmode="tel"
                                name="visiTel"
                                maxlength="10"/>
                    </div>

                    <!-- CIN Visi -->
                    <div class="mt-4 left-2">
                        <label>C.I.N</label>
                        <input id="visiCIN"
                                class="lowercase border block rounded mt-1 bf-full w-full"
                                type="text" name="visiCIN"/>
                    </div>


                    <!--Pers visi-->
                    <div class="mt-4 right-2">
                        <label>Personnel visiter</label>
                        <input id="visiPers"
                                class="uppercase border block rounded mt-1 bf-full w-full"
                                type="text" name="visiPers"/>
                    </div>


                </div>
                <div class="flex mt-4">
                    <x-button class="btnbtn btn1">
                        {{ __('Enregistrer') }}
                    </x-button>
                </div>
            </form>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{-- <span>
                {{$data->links()}}
            </span> --}}
        </div>
        <!-- /.card-footer-->
    </div>
      <!-- /.card -->
      <script src="js/modal.js"></script>
      <script src="js/modalModi.js"></script>

      <!-- jQuery -->

@endsection
