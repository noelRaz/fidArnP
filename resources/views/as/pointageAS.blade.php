@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pointage personnel externe</h3>

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
                <x-button id="modalBtn" class="btnplus btn1"><span class="fa fa-plus">&nbsp;</span>Nouveau</x-button>

                <div id="simpleModal" class="modalP">
                    <div class="w-50 border sm:rounded-lg modal-content">
                        <div class="modal-header sm:rounded-lg">

                                <h4>Nouvelle pointage</h4>
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

                            <form method="POST" action="addPointExt">
                                @csrf
                                <div class="flex">
                                    <div class="mt-4 w-50 h-35 right-2 bg-gray-100">
                                        {{-- <video id="preview"></video> --}}
                                        <div id="reader" class="rounded"></div>
                                    </div>
                                    <div class="mt-4 w-full left-2">
                                        <label>Code</label>
                                        <input id="extCode"
                                                class="uppercase border block rounded mt-1 bf-full w-full"
                                                type="text" name="extCode"/>

                                        <div class="flex mt-4">
                                            <button class="btnbtn btn1">
                                                {{ __('Enregistrer') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="liste" class="table-style" style="width:100">
                <thead>
                    <tr>
                        <th width="200px">Date</th>
                        <th text-align= "left" width="460px">Nom et Prénom</th>
                        <th width="200px">Fonction</th>
                        <th width="200px">Code</th>
                        <th width="50px">Heure</th>
                        </tr>
                </thead>

                <tbody class="w-4">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                        <td>{{$item->extNom }} {{$item->extPrenom}}</td>
                        <td>{{$item->extFonc}}</td>
                        <td>{!! DNS2D::getBarcodeHTML("$item->pointCodeExt", 'QRCODE',2, 2) !!}</td>
                        <td>{{date('h:i:s', strtotime($item->created_at))}}</td>

                        {{-- <td class="flex">
                            <a href="{{"detailpersonnel/".$item->persID }}" >
                                <button class="btn-act btn1 border-transparent">
                                    <span class="fa fa-eye"></span>
                                </button>
                            </a>
                            <a href="{{"editpersonnel/".$item->persID }}">
                                <button type="button" class="btn-act btn3 border-transparent" >
                                    <span class="fa fa-edit"></span>
                                </button>
                            </a>
                            <a href="{{"deletepersonnel/".$item->persID }}" onclick= "return confirm('Voulez-vous vraiment supprimer')">
                                <button type="button" class="btn-act btn2 border-transparent">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </a>
                        </td> --}}
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

    <script src="js/scanner.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $("#extCode").val(decodedText);
        }

        function onScanFailure(error) {
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
