use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class {{ucfirst($parser->plural())}}.
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/maxolex/scaffold-interface
 */
class {{\Illuminate\Support\Str::studly(ucfirst($parser->plural()))}} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{$parser->plural()}}',function (Blueprint $table){

        $table->increments('id');<?php $i = 0;?>

        @foreach($dataSystem->dataScaffold('v') as $attr)

        @if($dataSystem->dataScaffold('migration')[$i] == "String(select)")

        $table->String('{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($attr,"_"))}}')->nullable();<?php $i = $i + 1;?>

        @else

        $table->{{$dataSystem->dataScaffold('migration')[$i]}}('{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($attr,"_"))}}')->nullable();<?php $i = $i + 1;?>

        @endif

        @endforeach

        /**
         * Foreignkeys section
         */
        @foreach($dataSystem->getForeignKeys() as $key)

        $table->integer('{{lcfirst(\Illuminate\Support\Str::singular($key))}}_id')->unsigned()->nullable();
        $table->foreign('{{lcfirst(\Illuminate\Support\Str::singular($key))}}_id')->references('id')->on('{{$key}}')->onDelete('cascade');
        @endforeach

        @if($dataSystem->isTimestamps())

        $table->timestamps();
        @endif

        @if($dataSystem->isSoftdeletes())

        $table->softDeletes();
        @endif

        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{$parser->plural()}}');
    }
}
