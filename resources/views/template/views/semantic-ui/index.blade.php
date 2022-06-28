@@extends('scaffold-interface.layouts.semantic-ui.layouts.app')
@@section('title','Liste des {{ucfirst($parser->real_plural())}}')
@@section('content')
<h1>{{ucfirst($parser->real_plural())}}</h1>
    <div class="header">La liste des {{ucfirst($parser->real_plural())}}</div>
    <br>
    <a style="margin-bottom: 10px;" class="ui primary button" href="@{!!url("{{$parser->singular()}}")!!}/create'" }}>
        <i class="icon add"></i>
        Ajouter
    </a>
    <br>

    <table id="dossiers" class="ui celled table" width="100%" cellspacing="0">
        <thead>
        <tr>
            @if($dataSystem->getRelationAttributes() != null)
            @foreach($dataSystem->getRelationAttributes() as $key => $value)
            @foreach($value as $key1 => $value1)
            @if($loop->first)
            <th>{{\Illuminate\Support\Str::singular($key)}}</th>
            @endif
            @endforeach
            @endforeach
            @endif
            @foreach($dataSystem->dataScaffold('v') as $value)
            <th>{{$value}}</th>
            @endforeach
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        	@@foreach(${{$parser->plural()}} as ${{lcfirst($parser->singular())}})
            <tr>
                @if($dataSystem->getRelationAttributes() != null)
                @foreach($dataSystem->getRelationAttributes() as $key=>$value)
                @foreach($value as $key1 => $value1)
                @if($loop->first)
                <td>@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular($key)}}->{{$value1}}!!}</td>
                @endif
                @endforeach
                @endforeach
                @endif
                @foreach($dataSystem->dataScaffold('v') as $value)
                <td>@{!!${{lcfirst($parser->singular())}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}</td>
                @endforeach
                <td>

                    <!-- delete the item (uses the destroy method DESTROY /item/{id} -->
                    <a class="ui red button pull-right" data-token="{{ csrf_token() }}" href="#"
                       onclick="DeleteElement('@{!!${{lcfirst($parser->singular())}}->nom!!}', '@{!!${{lcfirst($parser->singular())}}->id!!}'); event.preventDefault();">
                        <i class="trash icon"></i>Supprimé</a>

                    <!-- show the item (uses the show method found at GET /item/{id} -->
                <a class="ui primary icon button" href="/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}"><i class="info circle icon"></i> </a>

                <!-- edit this item (uses the edit method found at GET /item/{id}/edit -->
                    <a class="ui yellow icon button "
                       href="/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/edit"><i
                                class="edit icon"></i> Modifier</a>

                </td>
            </tr>
            @@endforeach
        </tbody>
    </table>
@@endsection

@@section('scripts')
    <script>
        $(document).ready(function () {
            $('#dossiers').DataTable();
        });
    </script>
    <script type="text/javascript">
        function DeleteElement(itemname, id) {

            var token = $(this).data('token');
            swal({
                title: "Suppression de l'élément: " + itemname,
                text: "Etes-vous sur de vouloir supprimer cet élément?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                cancelButtonText: "Annulé",
                confirmButtonText: "Oui, supprimé!",
                confirmButtonColor: "#ec6c62"
            }, function () {
                $.ajax(
                    {
                        type: "POST",
                        url: '/{{$parser->singular()}}/' + id + '/deleteMsg',
                        data: {'_method': 'delete', '_token': '{{ csrf_token() }}'}
                    }
                )
                    .done(function (data) {
                        swal("Succès!", "l'élément a été supprimé!", "success");
                        window.location.href = document.URL;
                    })
                    .error(function (data) {
                        swal("Erreur", "l'élément n'a pas été supprimé!", "error");
                    });
            });
        }
    </script>
@@endsection
