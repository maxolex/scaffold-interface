@extends('layouts.app')

@section('title','ADMIN GEORISQUES')

@section('stylesheet')
    <style type="text/css">
        body {
            background-image: radial-gradient(circle, #ffffff, #f6f6f8, #edeef0, #e4e5e9, #dadde2);
        }

        body > .grid {
            height: 100%;
        }

        .column {
            max-width: 450px;
        }
    </style>
@endsection

@section('container')
    <div class="ui middle aligned center aligned grid">
        <div class="wide column">
            <div class="ui piled raised grey segment">

                <div class="ui massive floating stacked message">
                    <div class="header">
                        ADMIN GEORISQUES
                    </div>
                </div>

                <form action="{{ Route('admin.login.action') }}" method="post" class="ui large form">

                    {{ csrf_field() }}

                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="email" placeholder="Votre Adresse email">
                                <div class="ui error">
                                    @if($errors->has('email'))
                                        <p>{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="Mot de passe">
                                <div class="ui error">
                                    @if($errors->has('password'))
                                        <p>{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="ui fluid large blue submit button">Valider</div>
                    </div>

                    <div class="ui error message">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document)
            .ready(function () {
                $('.ui.form')
                    .form({
                        fields: {
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Veuillez entrer une adresse e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Veuillez entrer une adresse e-mail valide'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Veuillez entrer un mot de passe'
                                    },
                                    {
                                        type: 'length[6]',
                                        prompt: 'Votre mot de passe doit avoir au moins 6 caractères'
                                    }
                                ]
                            }
                        }
                    })
                ;
            })
        ;
    </script>
@endsection
