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
//route halaman utama
Route::get('/', function () {
    //route session cart
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
//middleware
Route::post('/auth','authcontroller@login')->name('auth');
Auth::routes();

//route cart
Route::get('/cart','CartController@index')->name('index.cart');
//isi barang ke cart
Route::post('/cart-add','CartController@add')->name('add.cart');
//kurang jumlah barang di cart
Route::post('/cart-min','CartController@min')->name('min.cart');
//tambah jumlah barang di cart
Route::post('/cart-plus','CartController@plus')->name('plus.cart');

//route chechout
Route::get('/checkout','CartController@index_checkout')->name('index.checkout');
//route di halaman checkout untuk menyimpan data transaksi
Route::get('/transaksi','CartController@transaksi')->name('transaksi');
//route halaman payment
Route::get('/payment','CartController@payment')->name('payment');
//route buat meriksa ongkir *error
Route::get('/province','RajaOngkirController@province');

//admin
//route barang admin
Route::resource('barang','BarangController');

//super admin
//route tambah kurang admin 
Route::resource('user','UserController');
//route barang super admin
Route::resource('s_adminBarang','S_AdminBarangController');
//route kategori
Route::resource('kategori','KategoriController');

//Auth
Route::get('/admin','HomeController@index')->name('home');
Route::get('/s_admin','HomeController@index_s_admin')->name('home');
Route::get('/pembeli','HomeController@index_pembeli')->name('home');


//route shop
Route::resource('shop','ShopController');
//route shop lihat berdasar kategori
Route::get('shop/{id}/kategori', 'ShopController@index_kategori')->name('kategori.barang');
//route lihat detail barang
Route::get('/info_barang/{id}', function($id){
    $barang=Barang::findOrFail($id);
    return view ('single',['barang'=>$barang]);
});

//route lihat dan ubah profil
Route::resource('profil','ProfilController');









