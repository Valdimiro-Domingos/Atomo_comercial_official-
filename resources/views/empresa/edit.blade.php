@extends('layouts.app')
@section('conteudo')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ strtoupper(Request::segment(1)) }} </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Request::segment(1) }}</a></li>
                        <li class="breadcrumb-item active">{{ Request::segment(2) }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- start row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <form enctype="multipart/form-data" method="POST"
                        action='{{ url('' . Request::segment(1) . "/update/{$dados[0]->id_tabela}") }}'>
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Designação</label>
                                    <input type="text" class="form-control" name="designacao" placeholder="Escreva..."
                                        value="{{ $dados[0]->designacao }}" required>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nome">Logotipo</label>
                                <label class=newbtn>
                                    <img id="blah" src='{{ asset("public/upload/{$dados[0]->foto}") }}' width="100%">
                                    <input id="pic" name="file" class=' pis' onchange="readURL(this);"
                                        type="file">
                                </label>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nome">NIF</label>
                                    <input type="text" class="form-control" name="nif" placeholder="Escreva..."
                                        value="{{ $dados[0]->nif }}" required>

                                </div>
                                <div class="form-group">
                                    <label for="nome">Registo Comercial</label>
                                    <input type="text" class="form-control" name="registo_comercial"
                                        placeholder="Escreva..." value="{{ $dados[0]->registo_comercial }}" required>

                                </div>
                                <div class="form-group">
                                    <label for="nome">Data de Fundação</label>
                                    <input type="date" class="form-control" name="data_fundacao" placeholder="Escreva..."
                                        value="{{ date('Y-m-d', strtotime($dados[0]->data_fundacao)) }}" required>

                                </div>
                                <div class="form-group">
                                    <label for="nome">Capital Social</label>
                                    <input type="text" class="form-control" name="csocial" placeholder="Escreva..."
                                        value="{{ $dados[0]->csocial }}">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Representante</label>
                                    <input type="text" class="form-control" name="representante" placeholder="Escreva..."
                                        value="{{ $dados[0]->representante }}" required>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Identificação do Representante</label>
                                    <input type="text" class="form-control" name="ndi_rep" placeholder="Escreva..."
                                        value="{{ $dados[0]->ndi_rep }}" required>
                                </div>
                            </div>
                        </div>
                      
                      
                      {{-- --}}
                      <div class="col-lg-12">
  <div id="accordion">

    <div class="card mb-1 shadow-none">
      <div class="card-header" id="headingOne">
        <h6 class="m-0">
          <a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true"
            aria-controls="collapseOne">
            Endereço
          </a>
        </h6>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">País</label>
                <select name="pais" class="form-control select2">

                  @foreach (\App\Pais::where('empresa_id', Auth::user()->empresa_id)->get() as $item)
                    @if($dados[0]->pais == $item->designacao)
                    <option value="{{ $dados[0]->pais }}" seleted>{{ $dados[0]->pais }}</option>
                    @else
                    <option value="{{ $item->designacao }}"> {{ $item->designacao }}</option>
                    @endif
                  @endforeach
                </select>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Cidade</label>
                <input type="text" class="form-control" name="cidade" placeholder="Escreva..."
                  value="{{ $dados[0]->cidade }}">

              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="nome">Endereço</label>
                <input type="text" class="form-control" name="endereco" placeholder="Escreva..."
                  value="{{ $dados[0]->endereco }}" required>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-1 shadow-none">
      <div class="card-header" id="headingTwo">
        <h6 class="m-0">
          <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false"
            aria-controls="collapseTwo">
            Contacto
          </a>
        </h6>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Telemovel</label>
                <input type="text" class="form-control" name="telemovel" placeholder="Escreva..."
                  value="{{ $dados[0]->telemovel }}">

              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Contacto</label>
                <input type="text" class="form-control" name="contacto" placeholder="Escreva..."
                  value="{{ $dados[0]->contacto }}">

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Telefone</label>
                <input type="text" class="form-control" name="telefone" placeholder="Escreva..."
                  value="{{ $dados[0]->telefone }}">

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Fax</label>
                <input type="text" class="form-control" name="fax" placeholder="Escreva..."
                  value="{{ $dados[0]->fax }}">

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Escreva..."
                  value="{{ $dados[0]->email }}">

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Facebook</label>
                <input type="text" class="form-control" name="facebook" placeholder="Escreva..."
                  value="{{ $dados[0]->facebook }}">

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nome">Whatsapp</label>
                <input type="text" class="form-control" name="whatsapp" placeholder="Escreva..."
                  value="{{ $dados[0]->whatsapp }}">

              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Skype</label>
                <input type="text" class="form-control" name="skype" placeholder="Escreva..."
                  value="{{ $dados[0]->skype }}">

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Twitter</label>
                <input type="text" class="form-control" name="twitter" placeholder="Escreva..."
                  value="{{ $dados[0]->twitter }}">

              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Linkedin</label>
                <input type="text" class="form-control" name="linkedin" placeholder="Escreva..."
                  value="{{ $dados[0]->linkedin }}">

              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="nome">Web Site</label>
                <input type="text" class="form-control" name="website" placeholder="Escreva..."
                  value="{{ $dados[0]->website }}">

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="">Descricao</label>
      <textarea class="form-control" name="descricao"
        style="margin: 0px -17.6563px 0px 0px;  height: 143px;"> {{ $dados[0]->descricao }}</textarea>
    </div>
  </div>
</div>
                      
                      
           

                        @if($isCreate) 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-info mb-3">
                                        <input type="checkbox" class="custom-control-input" id="status"
                                            name="status" {{ $dados[0]->status ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="status">Ativo?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <a href="{{ url('' . Request::segment(1) . '') }}" class="btn btn-warning"
                            type="submit">Cancelar</a>
                    </form>

                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection