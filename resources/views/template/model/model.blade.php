namespace {{config('maxolex.config.modelNameSpace')}};

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class {{ucfirst($parser->singular())}}.
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/maxolex/scaffold-interface
 */
class {{ucfirst($parser->singular())}} extends Model
{
	const RULES = [

	];
	
	@if($dataSystem->isSoftdeletes())

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    @endif

	@if(!$dataSystem->isTimestamps())

    public $timestamps = false;
    @endif

    protected $table = '{{$parser->plural()}}';

	@foreach($dataSystem->getForeignKeys() as $key)

	public function {{lcfirst(str_singular($key))}}()
	{
		return $this->belongsTo('{{config('maxolex.config.modelNameSpace')}}\{{ucfirst(str_singular($key))}}','{{lcfirst(str_singular($key))}}_id');
	}

	@endforeach

}
