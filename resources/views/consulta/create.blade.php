@extends('layouts.painel.main')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
@endsection

@section('modals')
    <!-- Especialidade -->
    <div id="adicionar-especialidade" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Adicionar Especialidade</h4>
                </div>
                <form  id="add-especialidade">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nome Especialidade</label>
                                    <input type="text" required name="nomeEspecialidade" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- Adicionar Sintoma -->
    <div id="adicionar-sintoma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Adicionar Novo Sintoma</h4>
                </div>
                <form  id="add-sintoma">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Sintoma</label>
                                    <input type="text" required name="nomeSintoma" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- Adicionar Remédio -->
    <div id="adicionar-remedio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Adicionar Novo Remédio</h4>
                </div>
                <form  id="add-remedio">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Remédio</label>
                                    <input type="text" required name="nomeRemedio" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="control-label">Informação Adicional</label>
                                    <textarea type="text" rows="5" name="conteudoRemedio" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection

@section('title')
    Cadastrar Consulta
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('consulta.index') }}">Minhas Consultass</a></li>
    <li class="breadcrumb-item active">Cadastrar</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Cadastrar Consulta</h4> <hr> <br>
                {!! Form::open(['route'=>'consulta.store']) !!}
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ Form::label('idEspecialidade', 'Especialidade') }}</b>
                                <button type="button" class="btn btn-success waves-effect waves-light btn-sm badge pull-right" data-toggle="modal" data-target="#adicionar-especialidade"><i class="fa fa-plus"></i> Adicionar</button>
                                {!! Form::select('idEspecialidade', $listaEspecialidades, null,  ['required', 'class' => 'form-control selectpicker dropup', 'data-size'=>'8', 'data-live-search'=>'true', 'data-dropup-auto'=>'false', 'id'=>'idEspecialidade' ]) !!}
                                @if($errors->has('idEspecialidade'))
                                    <br><span class="help-block has-error"><span style="color: red; ">Escolha a especialidade</span></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <b>{{ Form::label('idSintoma', 'Escolha ao menos um sintoma') }}</b>
                                <button type="button" class="btn btn-success waves-effect waves-light btn-sm badge pull-right" data-toggle="modal" data-target="#adicionar-sintoma"><i class="fa fa-plus"></i> Adicionar</button>

                                {!! Form::select('idSintoma[]', $sintomas, null,  ['required', 'class' => 'form-control selectpicker dropup', 'multiple' => 'true', 'data-size'=>'8', 'data-live-search'=>'true', 'data-dropup-auto'=>'false', 'id'=>'idSintoma']) !!}
                                @if($errors->has('idSintoma'))
                                    <br><span class="help-block has-error"><span style="color: red; ">Escolha ao menos um sintoma</span></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <b>{{ Form::label('remedio', 'Escolha ao menos um remédio') }}</b>
                                <button type="button" class="btn btn-success waves-effect waves-light btn-sm badge pull-right" data-toggle="modal" data-target="#adicionar-remedio"><i class="fa fa-plus"></i> Adicionar</button>

                                {!! Form::select('idRemedio[]', $remedios, null,  ['required', 'class' => 'form-control selectpicker dropup', 'multiple' => 'true', 'data-size'=>'8', 'data-live-search'=>'true', 'data-dropup-auto'=>'false', 'id'=>'idRemedio']) !!}
                                @if($errors->has('idRemedio'))
                                    <br><span class="help-block has-error"><span style="color: red; ">Escolha ao menos um remédio</span></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <b>{{ Form::label('diaConsulta', 'Data da Consulta') }}</b>
                                <button type="button" class="btn btn-success waves-effect waves-light btn-sm badge pull-right" data-toggle="modal" data-target="#adicionar-remedio"><i class="fa fa-plus"></i> Adicionar</button>

                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::date('diaConsulta', null,  ['required', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::time('horaConsulta', null,  ['required', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                @if($errors->has('diaConsulta'))
                                    <br><span class="help-block has-error"><span style="color: red; ">Escolha ao menos um remédio</span></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ Form::label('conteudoConsulta', 'Informações da consulta') }}</b> <br>
                                {!! Form::textarea('conteudoConsulta', null,['required', 'class'=>'form-control', 'rows'=>10]) !!}

                                @error('conteudoConsulta')
                                    <span class="help-block has-error"><span style="color: red; ">As informações da consulta devem ter ao menos 10 caracteres</span></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block text-center">
                                    <i class="fa fa-plus"></i> Cadastrar Consulta
                                </button>
                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-pt_BR.min.js"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('dashboard/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>

    <script type="text/javascript">
        //Adicionar Especialidade
        $(document).ready(function () {
            $('#add-especialidade').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('especialidade.store') }}",
                    data: $('#add-especialidade').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#adicionar-especialidade').modal('hide');
                        limparCampoEspecialidade();
                        alert("Especialidade adicionada com sucesso");
                    },
                    error: function(error){
                        console.log(error)
                        if(error.status == 422) {
                            alert('Essa especialidade já foi adicionada')
                        } else {
                            alert('Erro. Fale com o administrador')
                        }
                    }
                });
            });
            function limparCampoEspecialidade(){
                jQuery(function($){
                    $.get("{{ route('listaEspecialidadeJson') }}", function(data) {
                        console.log(data);
                        $("#idEspecialidade").empty();
                        for (index in data) {
                            $('#idEspecialidade').append('<option value="'+data[index].idEspecialidade+'">'+data[index].nomeEspecialidade+'</option>');
                        }
                        $("#idEspecialidade").selectpicker('refresh');
                    });
                });
            }
        });

        //Adicionar Sintoma
        $(document).ready(function () {
            $('#add-sintoma').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('sintoma.store') }}",
                    data: $('#add-sintoma').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#adicionar-sintoma').modal('hide');
                        limparCampoSintoma();
                        alert("Sintoma adicionado com sucesso");
                    },
                    error: function(error){
                        console.log(error)
                        if(error.status == 422) {
                            alert('Esse sintoma já foi adicionado')
                        } else {
                            alert('Erro. Fale com o administrador')
                        }
                    }
                });
            });
            function limparCampoSintoma(){
                jQuery(function($){
                    $.get("{{ route('listaSintomaJson') }}", function(data) {
                        console.log(data);
                        $("#idSintoma").empty();
                        for (index in data) {
                            $('#idSintoma').append('<option value="'+data[index].idSintoma+'">'+data[index].nomeSintoma+'</option>');
                        }
                        $("#idSintoma").selectpicker('refresh');
                    });
                });
            }
        });

        //Adicionar Remédio
        $(document).ready(function () {
            $('#add-remedio').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('remedio.store') }}",
                    data: $('#add-remedio').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#adicionar-remedio').modal('hide');
                        limparCampoRemedio();
                        alert("Remédio adicionado com sucesso");
                    },
                    error: function(error){
                        console.log(error)
                        if(error.status == 422) {
                            alert('Esse remédio já foi adicionado')
                        } else {
                            alert('Erro. Fale com o administrador')
                        }
                    }
                });
            });
            function limparCampoRemedio(){
                jQuery(function($){
                    $.get("{{ route('listaRemedioJson') }}", function(data) {
                        console.log(data);
                        $("#idRemedio").empty();
                        for (index in data) {
                            $('#idRemedio').append('<option value="'+data[index].idRemedio+'">'+data[index].nomeRemedio+'</option>');
                        }
                        $("#idRemedio").selectpicker('refresh');
                    });
                });
            }
        });
    </script>
@endsection
