<?php

use App\Models\Kerjasama;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjasamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasamas', function (Blueprint $table) {
            $table->id();
            $table->string('name_img');
            $table->string("image")->image; // Nama file logo
            $table->timestamps();
        });
    }
    public function destroy($id)
    {
        $kerjasama = Kerjasama::findOrFail($id);

        // Delete the logo image file
        $imagePath = public_path('uploads/kerjasama/' . $kerjasama->logo);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the record from the database
        $kerjasama->delete();

        return redirect()->route('Kerjasama.index')->with('success', 'Logo deleted successfully.');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Kerjasama');
    }
}
