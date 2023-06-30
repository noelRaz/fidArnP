@extends('layouts.app')
@section('content')
<!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste externe</h3>

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
            </div>
            <div id="simpleModal" class="modal">
                <div class="border sm:rounded-lg modal-content">
                    <div class="modal-header sm:rounded-lg">
                            <h4>Nouvelle AS/OS</h4>
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

                        <form method="POST" action="addExt">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <!--Nom-->
                                <div class="mt-4 right-2">
                                    <label>Nom</label>
                                    <input id="extNom"
                                            class="uppercase border block rounded mt-1 bf-full w-full"
                                            type="text" name="extNom"/>
                                </div>

                                <!--Prénom-->
                                <div class="mt-4 left-2">
                                    <label>Prénom</label>
                                    <input id="extPrenom"
                                            class="capitalize border block rounded mt-1 bf-full w-full"
                                            type="text" name="extPrenom"/>
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4 right-2">
                                    <label>E-mail</label>
                                    <input id="email"
                                            class="lowercase border block rounded mt-1 bf-full w-full"
                                            type="email" name="extEmail"/>
                                </div>

                                <!--Fonction-->
                                <div class="mt-4 left-2">
                                    <label>Fonction</label><br>
                                    <input type="radio" value="O.S. TMDH" name="extFonc" class="border block">
                                    <label class="mt-3">O.S. TMDH</label>&nbsp;
                                    <input type="radio" value="O.S. FSP" name="extFonc" class="border block">
                                    <label class="mt-3">O.S. FSP</label>&nbsp;
                                    <input type="radio" value="A.S. TMDH" name="extFonc" class="border block">
                                    <label class="mt-3">A.S. TMDH</label>&nbsp;
                                    <input type="radio" value="A.S. TMDH" name="extFonc" class="border bloc">
                                    <label class="mt-3">A.S. FSP</label>
                                </div>

                                <!--Contact-->
                                <div class="mt-4 right-2">
                                    <label>Contact</label>
                                    <input id="phone"
                                            class="border block rounded mt-1 bf-full w-full"
                                            type="number"
                                            inputmode="tel"
                                            name="extTel"
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
                    @foreach ($data_ext as $item)
                    <tr>
                        <td>{{$item->extNom}} {{$item->extPrenom}}</td>
                        <!--<td align="center">{!! DNS2D::getBarcodeHTML("$item->ext_code", 'QRCODE',1,1) !!}</td>-->
                        <td>{{$item->extEmail}}</td>
                        <td>{{$item->extFonc}}</td>
                        <td>{{$item->extTel}}</td>
                        <?php if(Auth::user()->admin == '1') {?>
                        <td class="flex">
                            <a href="{{"detailpersext/".$item->ext_code }}" >
                                <button class="btn-act btn1 border-transparent">
                                    <span class="fa fa-eye"></span>
                                </button>
                            </a>
                            <a href="{{"editpersext/".$item->ext_code }}">
                                <button type="button" class="btn-act btn3 border-transparent" >
                                    <span class="fa fa-edit"></span>
                                </button>
                            </a>
                            <a href="{{"deletepersext/".$item->ext_code }}" onclick= "return confirm('Voulez-vous vraiment supprimer')">
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
                {{$data_ext->links()}}
            </span>
        </div>
        <!-- /.card-footer-->
    </div>
      <!-- /.card -->
      <script src="js/modal.js"></script>
      <script src="js/modalModi.js"></script>

      <!-- jQuery -->

@endsection
