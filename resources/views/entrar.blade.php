@extends('layouts.app')

@section('title')
   - Entrar
@endsection

@section('content')
    @if(isset($usuarioCriado))
        {{-- Alterar ou criar senha --}}
        <div class="d-flex justify-content-center my-5">
            <div class="col-12 col-lg-6 p-3 my-5 border rounded">
                <div class="row">
                    <div class="col-12 mb-3 text-center">
                        <p class="fs-3">Enviamos uma mensagem para o Whatsapp <span id="userNum">{{$usuarioCriado->whats}}</span></p>
                        <p class="fs-5">Siga os passos no seu Whatsapp para criar sua senha.</p>
                        <p class="fs-5">Voce já pode fechar essa página</p>
                        <button class="btn btn-secondary" onclick="window.location.href='/entrar'">Voltar</button>
                    </div>
                </div>
            </div>
        </div>
    @elseif (isset($usuario))
        {{-- login com senha --}}
        <form action="{{route('entrar.show', $usuario->id)}}" class="needs-validation" novalidate>
            @csrf
            <div class="d-flex justify-content-center my-5">
                <div class="col-12 col-lg-6 p-3 my-5 border rounded">
                    <div class="row">
                        <label for="pass" class="form-label">Digite sua senha</label>
                        <input type="password"  class="form-control @error('pass') is-invalid @enderror " id="pass" name="pass" required>
                        @error('pass')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @else
                            <div class="invalid-feedback">
                                Digite sua senha.</s>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                    <p class="btn btn-sm btn-secondary my-3" onclick="window.location.href='{{route('entrar.edit', $usuario->id)}}'">Esqueci minha senha</p>
                </div>
            </div>
        </form>
    @elseif (isset($whats))
        {{-- Novos usuarios --}}
        <form method="post" class="needs-validation" novalidate>
            @csrf
            @method('post')
            <input type="text" class="d-none" name="whats" value="{{$whats}}">
            <div class="d-flex justify-content-center my-5">
                <div class="col-12 col-lg-6 p-3 my-5 border rounded">
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                        <p class="fs-2">É novo por aqui?</p>
                        <p class="fs-3 text-success">Seu primeiro corte tem 10% de desconto!</p>
                        </div>
                        <div class="col-12 col-sm-2">
                            <label for="whats" class="form-label d-flex justify-content-end"><img width="30" class="d-none d-sm-block" src="{{url('/')}}/storage/whatsapp_logo.png" alt=""></label>
                        </div>
                        <div class="col-12 col-sm-10 fs-3 mb-3">
                            <span id="whatsNum">{{$whats}}</span><br>
                            <span class="text-secondary fs-5" role="button" onclick="window.location.href='/entrar'">Este não é meu número.</span>
                        </div>
                        <div class="col-12">
                            <label for="whats" class="form-label">Seu nome</label>
                            <input type="text" placeholder="Digite seu nome ou apelido." class="form-control @error('nome') is-invalid @enderror " id="nome" name="nome" value="{{old('nome')}}" required>
                            @error('nome')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    É necessário informar seu nome.</s>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        {{-- Login com telefone --}}
        <form class="needs-validation" novalidate>
            @csrf
            <div class="d-flex justify-content-center my-5">
                <div class="col-12 col-lg-6 p-3 my-5 border rounded">
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                            Entrar com seu número de whatsapp
                        </div>
                        <div class="col-12 col-sm-2">
                            <label for="whats" class="form-label d-flex justify-content-end"><img width="30" class="d-none d-sm-block" src="{{url('/')}}/storage/whatsapp_logo.png" alt=""></label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <input type="text" inputmode="numeric" maxlength="11" placeholder="Digite seu número de whatsapp com ddd." class="form-control @error('whats') is-invalid @enderror " id="whats" name="whats" value="{{old('whats')}}" required>
                            @error('whats')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    É necessário informar seu número de Whatsapp.</s>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection

@section('scriptEnd')
    <script>
        $(document).ready(() => {
            $('#whats').mask('(00) 9 0000-0000');
            $('#whatsNum').mask('(00) 9 0000-0000');
            $('#userNum').mask('(00) 9 0000-0000');
            //$('#rg').mask('00.000.000-00', {reverse: true});
        });
    </script>
@endsection
