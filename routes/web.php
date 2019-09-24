<?php
use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;

//use Symfony\Component\Routing\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $totalCart=0;
    if(\Auth::user()){
        $user_id=\Auth::user()->id;
        $totalCart=\Cart::session($user_id)->getContent()->count();
    }

    $barang=\App\Barang::all();
    $barang = Barang::inRandomOrder()->take(3)->get();
    return view('pembeli.welcome',['barang'=>$barang,'total'=>$totalCart])->with('barang', $barang);
});
/*
Route::get('/login', function (Request $request) {
    $user=\App\User::findOrFail($request->id);
    if($user->role === 'pembeli'){
        $user->save();
        return 'Akun berhasil diaktifkan';
    }else{
        return view('welcome');
    }
})->name('autentikasi.admin');
*/
Route::post('/auth','authcontroller@login')->name('auth');
Auth::routes();
Route::post('/cart-add','CartController@add')->name('add.cart');
Route::get('/transaksi','CartController@transaksi')->name('transaksi');
Route::post('/cart-min','CartController@min')->name('min.cart');
Route::post('/cart-plus','CartController@plus')->name('plus.cart');
Route::get('/cart','CartController@index')->name('index.cart');
Route::get('/province','RajaOngkirController@province');
//admin

Route::resource('barang','BarangController');
//customer
//Route::get('/pembeli','HomeController@index_pembeli')->name('home');
//Auth
Route::get('/admin','HomeController@index')->name('home');
Route::get('/s_admin','HomeController@index_s_admin')->name('home');
Route::get('/pembeli','HomeController@index_pembeli')->name('home');

Route::get('shop/{id}/kategori', 'ShopController@index_kategori')->name('kategori.barang');
Route::resource('profile','ProfilController');
Route::resource('kategori','KategoriController');
Route::resource('s_adminBarang','S_AdminBarangController');
Route::resource('user','UserController');
Route::resource('shop','ShopController');

Route::get('/info_barang/{id}', function($id){
    $barang=Barang::findOrFail($id);
    return view ('single',['barang'=>$barang]);
});







