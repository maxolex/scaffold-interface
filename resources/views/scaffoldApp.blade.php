<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('css/scaffold-interface-css/main.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/animatecss/3.5.1/animate.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>The scaffold interface French version</title>
    </head>
    <body>
        <div id = "el1" class = 'container'>
            <h3 class = "thin">A Smart CRUD Generator For <i>Laravel</i> (FRENCH)</h3>
            <div style = 'margin-top: 2cm;'></div>
            <button v-if = '!show' transition = "fade" class = 'btn animated' @click = 'show = ! show'><i class = 'material-icons left'>add</i>Nouvelle Table</button>
            <a href = '#modal1' transition = "fade" class = 'create btn red modal-trigger' data-link = "/scaffold/manyToManyForm"><i class = 'material-icons left'>device_hub</i>Many To Many</a>
            <a href="{{url('/scaffold/graph')}}" class="btn orange"><i class="material-icons left">share</i>Graph</a>
            <br>
            <div class="row">
                <div transition = "fade" class="col s5 animated" v-if = 'show'>
                    <p transition = "fade" class = 'animated red-text flow-text' v-if = 'error'>@{{errorMsg}}</p>
                    <form id = 'form' method = 'post' action = '{{URL::to("/scaffold/guipost")}}' autocomplete="off">
                        {{csrf_field()}}
                        <table class = 'ta'>
                            <tr>
                                <td>
                                    <div class = 'input-field'>
                                        <input id = 'TableName' name='TableName' required='' aria-required='true' type='text'>
                                        <label for='TableName'>NomTable</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="template" type="radio" value = "semantic-ui" checked id="semantic-ui" />
                                    <label for="semantic-ui">Semantic-UI</label>
                                </td>
                                <td>
                                    <input name="template" type="radio" value = "bootstrap" id="bootstrap" />
                                    <label for="bootstrap">Bootstrap</label>
                                </td>
                                <td>
                                    <input name="template" type="radio" value = "materialize" id="materialize" />
                                    <label for="materialize">Materialize</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        <input type="checkbox" name = "timestamps" id="timestamps" />
                                        <label for="timestamps">Times Tamps</label>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <input type="checkbox" name = "softdeletes" id="softdeletes" />
                                        <label for="softdeletes">Soft Deletes</label>
                                    </p>
                                </td>
                            </tr>
                            <tr transition = "fade" class = 'animated' v-for = "el in rows">
                                <td>
                                    <div class="input-field col s12">
                                        <select class = 'browser-default' id = "opt@{{el}}" name = "opt@{{el}}" data-id = "@{{el}}">
                                            <option v-for = "element in select" value = "@{{element}}">@{{element}}</option>
                                            <label for = "opt@{{el}}">Choisir Type</label>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class = 'input-field'>
                                        <input id = 'atr@{{el}}' name = 'atr@{{el}}' required='' aria-required='true' type='text'>
                                        <label for = 'atr@{{el}}'>Attribut</label>
                                    </div>
                                </td>
                            </tr>
                            <!-- One To Many Relationship-->
                            <tr transition = "fade" class = 'animated' v-for = "final in OneToManyData">
                                <td>
                                    <input  name = "tbl@{{final.id}}" type = "hidden" required='' aria-required='true' value = "@{{final.table}}">
                                    <h5 class = 'thin'>@{{final.table}}</h5>
                                </td>
                                <td>
                                    <input  name = "on@{{final.id}}" type = "hidden" required='' aria-required='true' value = "@{{final.onData}}">
                                    <h5 class = 'thin'>@{{final.onData}}</h5>
                                </td>
                                <td>
                                    <a class = 'btn-floating red' @click = 'removeRelation(final)'><i class = 'material-icons'>delete</i></a>
                                </td>
                            </tr>
                            <tr transition = "fade" class = 'animated' v-if = "OneToManyBool">
                                <td>
                                    <select @change = 'getAttr($index)' class = 'browser-default' id = "tbl" name = "tbl@{{el}}" data-id = "@{{el}}">
                                        <option value="scfld#01" disabled selected>Choisir votre table</option>
                                        <option v-for = "element in OneToMany" value = "@{{element}}">@{{element}}</option>
                                    </select>
                                </td>
                                <td>
                                    <select class = 'browser-default' id = "on" name = "on" data-id = "on">
                                        <option value="scfld#01" disabled selected>Choisir votre option</option>
                                        <option v-for = "attribute in attributes" value = "@{{attribute}}">@{{attribute}}</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div transition = 'fade' class = "row animated" v-if = 'submit'>
                            <button type = 'submit' class = 'val btn green col s12 animated'>
                            <i class = 'material-icons left'>done</i>
                            Valider
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col s7">
                    <div v-if = 'show'  transition = "actions" class = 'animated'>
                        <div class='card-panel #fafafa grey lighten-5'>
                            <h4 class = 'center thin'>Actions</h4>
                            <div class = 'row center actionRow' >
                                <div transition = "actions" class = "animated" v-if = '!more'>
                                    <a class = 'btn blue'  @click = "increment"><i class = 'material-icons left'>add</i>nouveau</a>
                                    <a class = 'btn red'   @click = 'decrement'><i class = 'material-icons left'>delete</i>supprimer</a>
                                    <a class = 'btn green' @click = 'more = true'><i class = 'material-icons left'>arrow_forward</i>plus</a>
                                </div>
                                <div v-show = 'more' transition = "actions" class = "animated">
                                    <a class = 'btn purple' @click = 'lastStep'><i class = 'material-icons left'>arrow_back</i>retour</a>
                                    <a v-if = '!submit' @click = 'addOneToMany' class = 'btn #0d47a1 blue darken-4'><i class = 'material-icons left'>device_hub</i>One To Many</a>
                                    <a v-if = '!submit' @click = 'lastOne' class = 'btn orange'><i class = 'material-icons left'>layers</i>prêt</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Interface Core-->
                    <div>
                        <div class = 'center'>
                            <h5 class = "black-text thin">Vous travaillez dans <i>{{config('maxolex.config.package')}}</i></h5>
                        </div>
                        <table class = 'centered highlight'>
                            <thead>
                                <th>Nom</th>
                                <th>Package</th>
                                <th>Created at</th>
                                <th>Etat</th>
                                <th>Lien</th>
                                <th>Supprimer</th>
                            </thead>
                            <tbody>
                                @foreach($scaffold as $value)
                                <tr>
                                    <td>{{$value->tablename}}</td>
                                    <td>{{$value->package}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td><span class = "scaffoldv {{$toto = Schema::hasTable($value->tablename) ? 'green' : 'red'}} white-text">{{$toto = Schema::hasTable($value->tablename) ? 'Migrated' : 'Not migrated'}}</span></td>
                                    <td><a target="_blank" href="{{URL::to('/')}}/{{lcfirst(\Illuminate\Support\Str::singular($value->tablename))}}" class = 'btn-floating blue white-text'><i class = 'material-icons'>send</i></a></td>
                                    <td><a href = '#modal1' class = 'delete btn-floating pink modal-trigger' data-link = '/scaffold/guidelete/{{$value->id}}'><i class = 'material-icons'>delete</i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $scaffold->render() !!}
                        <div class="pushDown"></div>
                        <span>Scaffold-interface <span class = 'scaffoldv orange white-text'>dev-master</span></span><br><br>
                        <iframe src="https://ghbtns.com/github-btn.html?user=maxolex&repo=scaffold-interface&type=star&count=true" frameborder="0" scrolling="0" width="90px" height="20px"></iframe>
                        <iframe src="https://ghbtns.com/github-btn.html?user=maxolex&repo=scaffold-interface&type=fork&count=true" frameborder="0" scrolling="0" width="90px" height="20px"></iframe>
                        <iframe src="https://ghbtns.com/github-btn.html?user=maxolex&type=follow&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>
                        <a class="twitter-follow-button"
                            href="https://twitter.com/maxolex09" data-show-count = "false">
                        Follow @maxolex09</a>
                        <p class = 'light'>Created with love and <i class = 'material-icons'>free_breakfast</i> by Maxolex Togolais {{date("Y")}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
                <i class="large mdi-navigation-menu"></i>
            </a>
            <ul>
                <li><a href = "{{url('/scaffold-dashboard')}}" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Tableau de bord"><i class="material-icons">view_list</i></a></li>
                <li><a href = "{{url('/scaffold/rollback')}}" class="btn-floating pink tooltipped" data-position="left" data-delay="50" data-tooltip="RollBack the Schema"><i class="material-icons">repeat</i></a></li>
                <li><a href = "{{url('/scaffold/migrate')}}" class="btn-floating orange tooltipped" data-position="left" data-delay="50" data-tooltip="Migrate the Schema"><i class="material-icons">input</i></a></li>
            </ul>
        </div>
        <div id="modal1" class="modal">
            <div class = "row AjaxisModal">
            </div>
        </div>
    </body>
    <script>
    var baseURL = "{{url('/')}}";
    var scaffoldList = {!! $scaffoldList !!};
    </script>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script src = "https://cdn.jsdelivr.net/vue/1.0.26/vue.min.js"></script>
    <script src = "{{URL::asset('js/AjaxisMaterialize.js')}}"></script>
    <script src = "{{URL::asset('js/scaffold-interface-js/main.js')}}"></script>
    <script src = "{{URL::asset('js/scaffold-interface-js/social.js')}}"></script>
    <script>
    @if(Session::has('status'))
    Materialize.toast("{{ Session::get('status')}}", 4000)
    @endif
    </script>
</html>
