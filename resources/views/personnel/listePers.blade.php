@extends('layouts.app')
@section('content')
<!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste personnel</h3>

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
            <div class="pull-right">
                <?php if(Auth::user()->admin == '1') {?>
                    <x-button id="modalBtn" class="btnplus btn1"><span class="fa fa-plus">&nbsp;</span>Nouveau</x-button>
                <?php } ?>
                {{-- <x-button id="modalBtn" class="btnplus btn1"><span class="fa fa-plus">&nbsp;</span>Nouveau</x-button> --}}
            </div>
            <div id="simpleModal" class="modal">
                <div class="border sm:rounded-lg modal-content">
                    <div class="modal-header sm:rounded-lg">
                            <h4>Nouvelle personnelle</h4>
                            <span class="closeBtn">&times;</span>
                    </div>
                    <div class="modal-body">
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

                        <form method="POST" action="add">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <!--Nom-->
                                <div class="mt-4 right-2">
                                    <label>Nom</label>
                                    <input id="persNom"
                                            class="uppercase border block rounded mt-1 bf-full w-full"
                                            type="text" name="persNom"/>
                                </div>

                                <!--Prénom-->
                                <div class="mt-4 left-2">
                                    <label>Prénom</label>
                                    <input id="persPrenom"
                                            class="capitalize border block rounded mt-1 bf-full w-full"
                                            type="text" name="persPrenom"/>
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4 right-2">
                                    <label>E-mail</label>
                                    <input id="email"
                                            class="lowercase border block rounded mt-1 bf-full w-full"
                                            type="email" name="persEmail"/>
                                </div>

                                <!--Fonction-->
                                <div class="mt-4 left-2">
                                    <label>Fonction</label>
                                    <input id="persFonc"
                                            class="uppercase border block rounded mt-1 bf-full w-full"
                                            type="text" name="persFonc"/>
                                </div>

                                <!--Contact-->
                                <div class="mt-4 right-2">
                                    <label>Contact</label>
                                    <input id="phone"
                                            class="border block rounded mt-1 bf-full w-full"
                                            type="number"
                                            inputmode="tel"
                                            name="persTel"
                                            maxlength="10"/>
                                </div>
                            </div>
                            <div class="flex mt-4">
                                <x-button class="btnbtn btn1">
                                    {{ __('Enregistrer') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modification -->

            <div id="simpleModalModif" class="modal">
                <div class="border sm:rounded-lg modal-content">
                    <div class="modal-header sm:rounded-lg">

                        <h4>Modifier personnelle</h4>
                        <span class="closeBtnModif">&times;</span>
                    </div>
                    <div class="modal-body">
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

                        <form method="POST" action="editPers">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <!--Nom-->
                                <div class="mt-4 right-2">
                                    <label>Nom</label>
                                    <input id="persNomModif"
                                            class="uppercase border block rounded mt-1 bf-full w-full"
                                            type="text" name="persNomModif"/>
                                </div>

                                <!--Prénom-->
                                <div class="mt-4 left-2">
                                    <label>Prénom</label>
                                    <input id="persPrenomModif"
                                            class="capitalize border block rounded mt-1 bf-full w-full"
                                            type="text" name="persPrenomModif"/>
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4 right-2">
                                    <label>E-mail</label>
                                    <input id="emailModif"
                                            class="lowercase border block rounded mt-1 bf-full w-full"
                                            type="email" name="persEmailModif" :value="old('email')"/>
                                    </div>

                                    <!--Fonction-->
                                    <div class="mt-4 left-2">
                                        <label>Fonction</label>
                                        <input id="persFoncModif"
                                                class="uppercase border block rounded mt-1 bf-full w-full"
                                                type="text" name="persFoncModif"/>
                                    </div>

                                    <!--Contact-->
                                    <div class="mt-4 right-2">
                                        <label>Contact</label>
                                        <input id="phoneModif"
                                                class="border block rounded mt-1 bf-full w-full"
                                                type="number"
                                                inputmode="tel"
                                                name="persTelModif"
                                                maxlength="10"/>
                                    </div>
                                </div>
                                <div class="flex mt-4">
                                    <button class="btnbtn btn1">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- /Modification -->

            <table id="liste" class="table-style" style="width:100">
                <thead>
                    <tr>
                        <th text-align= "left" width="460px">Nom et Prénom</th>
                        <!--<th width="200px" class="text-center">QR Code</th>-->
                        <th width="200px">E-mail</th>
                        <th width="200px">Fonction</th>
                        <th width="150px">Contact</th>
                        <?php if(Auth::user()->admin == '1') {?>
                        <th class="text-center">Action</th>
                        <?php } ?>
                        </tr>
                </thead>
                <tbody class="w-4">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->persNom}} {{$item->persPrenom}}</td>
                        <!--<td align="center">{!! DNS2D::getBarcodeHTML("$item->pers_code", 'QRCODE',1,1) !!}</td>-->
                        <td>{{$item->persEmail}}</td>
                        <td>{{$item->persFonc}}</td>
                        <td>{{$item->persTel}}</td>
                        <?php if(Auth::user()->admin == '1') {?>
                        <td class="flex">
                            <a href="{{"detailpersonnel/".$item->pers_code }}" >
                                <button class="btn-act btn1 border-transparent">
                                    <span class="fa fa-eye"></span>
                                </button>
                            </a>
                            <a href="{{"editpersonnel/".$item->pers_code }}">
                                <button type="button" class="btn-act btn3 border-transparent" >
                                    <span class="fa fa-edit"></span>
                                </button>
                            </a>
                            <a href="{{"deletepersonnel/".$item->pers_code }}" onclick= "return confirm('Voulez-vous vraiment supprimer')">
                                <button type="button" class="btn-act btn2 border-transparent">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </a>
                        </td>
                        <?php } ?>
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

      <!-- jQuery -->

@endsection
