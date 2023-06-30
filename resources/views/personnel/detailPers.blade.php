@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail de personnel</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
    <div id="capture">
        <div class="m-ca border card-body rounded-lg w-35 h-45">
            <div class="bg-darkblue rounded-lg h-1"></div>
            <div class="flex rounded-lg">
                <div class="bg-darkblue">.</div>
                <x-application-rep/>
                <div class="bg-darkblue">.</div>
                <x-application-primature/>
                <div class="bg-darkblue">.</div>
            </div>
            <div class="bg-darkblue rounded-lg">
                <x-application-logo/>
            </div>
            <div class="flex ">
                <!--<div id="qrcode" class="hangeza mt-4 align-items-center"></div>-->
                <div class="hangeza mt-4 align-items-center">
                    {!! DNS2D::getBarcodeHTML("$pers->pers_code", 'QRCODE',6, 6) !!}
                </div>

            </div>
            <div class="photo rounded-lg border pull-right">

            </div>
                <!--Nom-->
            <div class="mt-8">
                <x-label>Nom et Prénom</x-label>
                <x-input id="persNomModif"
                            class="inputText border-transparent block rounded mt-0 w-full"
                            type="text" name="persNomModif"
                            oninput="qrcode.makeCode(this.value)"
                            type="text"
                            name="nom"
                            value="{{ $pers->persNom}} {{ $pers->persPrenom}}"/>
            </div>
            <!--Fonction-->
            <div class="mt-1">
                <x-label>Fonction</x-label>
                <x-input id="persFoncModif"
                            class="uppercase border-transparent block rounded mt-0 w-full"
                            type="text" name="persFoncModif"
                            value="{{ $pers->persFonc}}"/>
            </div>
            <!--Fonction-->
            <div class="mt-1">
                <x-label>Direction</x-label>
                <x-direction/>
            </div>
            <!--Site-->
            <div class="text-center mt-1 bg-darkblue rounded-lg">
                <x-site/>
            </div>

        </div>
    </div>

</div>
<div class="pull-right">
    <a href="{{url("listepersonnel/")}}">
        <button type="button" class="btnbtn btn2 border-transparent" > Annuler carte</button>
    </a>
    <button onclick="capturer()" class="btnbtn btn1 border-transparent">Generer carte</button>
</div>

<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: " ",
        width: 128,
        height: 128,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
        });
</script>
<script>
    function capturer(){
        var carte = new html2canvas(document.getElementById("badge"));
        carte = html2canvas(document.querySelector("#capture")).then(canvas => {
    document.body.appendChild(canvas)
    });
    }
</script>
<div class="card-footer">
    <span>
    </span>
</div>
<script src="js/qrCode.js"></script>
@endsection
