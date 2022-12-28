use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{ucfirst($first)}}{{ucfirst($second)}} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{\Illuminate\Support\Str::singular($first)}}_{{\Illuminate\Support\Str::singular($second)}}',function (Blueprint $table){
			$table->increments('id')->unique()->index()->unsigned();
			$table->integer('{{\Illuminate\Support\Str::singular($first)}}_id')->unsigned()->index();
			$table->foreign('{{\Illuminate\Support\Str::singular($first)}}_id')->references('id')->on('{{$first}}')->onDelete('cascade');
			$table->integer('{{\Illuminate\Support\Str::singular($second)}}_id')->unsigned()->index();
			$table->foreign('{{\Illuminate\Support\Str::singular($second)}}_id')->references('id')->on('{{$second}}')->onDelete('cascade');
			/**
			 * Type your addition here
			 *
			 */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{\Illuminate\Support\Str::singular($first)}}_{{\Illuminate\Support\Str::singular($second)}}');
    }
}
