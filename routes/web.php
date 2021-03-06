<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TiposdepagoController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CargoempleadosController;
use App\Http\Controllers\EstadoenviosController;
use App\Http\Controllers\TipodocumentosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\InventariosJoinController;
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\DetallePedidosController;
use App\Http\Controllers\PrecioHisInventarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\IsvController;
use App\Http\Controllers\cargoempleadohistoricoController;
use App\Http\Controllers\PrecioHisMenuController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ParametrizacionFacturaController;
use App\Http\Controllers\ComprasController;

use App\Http\Controllers\SalarioshistoricosController;

Route::get('/', function () {
    return view('index');
});

Route::get('/product', function () {
    return view('productos.productosindex');
});

Route::get('/admi', function () {
    return view('indexadmi');
});

Route::get('/admi2', function () {
    return view('layouts.admin');
});

Route::get('/AcercaDeNosotros', function () {
    return view('AcercaDeNosotros');
});

Route::get('/Productos', function () {
    return view('Productos');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/ingresar', function () {
    return view('Usuarios.ingresar');
});
Route::get('/usuariosc', function () {
    return view('Usuarios.modals.create');
});

/* Route::get('/usuario', function () {
    return view('Usuarios.usuariosindex');
}); 

Route::get('/usuarios/create',[UsuariosController::class,'create']);*/


Route::get('/empleados', function () {
    return view('empleados.empleadosindex');
});


Route::get('/Registro', function () {
    return view('Registro');
});

//Hal?? 7w7
//hal?? x2
Route::get('/Registro', function () {
    return view('Registro');
});

Route::get('/RecuperarPassword', function () {
    return view('RecuperarPassword');
});

Route::get('/Contacto', function () {
    return view('Contacto');
});

Route::get('/empleadosindex', function () {
    return view('empleados.empleadosindex');
});

Route::get('/usuariosindex', function () {
    return view('Usuarios.usuariosindex');
});

Route::get('/roleuser', function () {
    return view('Roleuser.roleuserindex');
});




Route::get('/BebidasHeladas', function () {
    return view('BebidasHeladas');
});

Route::get('/BebidasCalientes', function () {
    return view('BebidasCalientes');
});

Route::get('/Postres', function () {
    return view('Postres');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('factura/pdf',[App\Http\Controllers\FacturaController::class, 'pdf'])->name('factura.pdf');
Route::get('empleado/indexjoin', [App\Http\Controllers\EmpleadoController::class, 'indexjoin'])->name('empleado.indexjoin');
Route::get('productos/indexjoin', [App\Http\Controllers\ProductosController::class, 'indexjoin'])->name('productos.indexjoin');


//


Route::resource('historicopreciomenu', PrecioHisMenuController::class);
Route::resource('usuarios', UserController::class);
Route::resource('cargoempleados',CargoempleadosController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('pagos', TiposdepagoController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('documentos', TipodocumentosController::class);
Route::resource('turnos', TurnosController::class);
Route::resource('estadoenvios', EstadoenviosController::class);
//Route::resource('empleado', EmpleadoController::class);
Route::resource('proveedores', ProveedoresController::class);
Route::resource('empleado',EmpleadoController::class);
Route::resource('descuentos',DescuentosController::class);
Route::resource('inventarios',InventariosController::class);
Route::resource('mostrarinventario', InventariosJoinController::class);       
Route::resource('pedidos',PedidosController::class);
Route::resource('precioinventario',PrecioHisInventarioController::class);
Route::resource('productos',ProductosController::class);
Route::resource('isv',IsvController::class);
Route::resource('cargoempleadohistorico',cargoempleadohistoricoController::class);
Route::resource('factura',FacturaController::class);
Route::resource('parametrizacionfactura',ParametrizacionFacturaController::class);
Route::resource('compras',ComprasController::class);

//Route::delete('empleado/{id}/delete', 'App\EmpleadoController@destroy');
//Route::put('empleado/{id}', 'EmpleadoController@update')->name('updateempleado');
Route::resource('salario',SalarioshistoricosController::class);

/**Route::get('errors', function(){ 
    abort(500);
});
**/


//Rutas Creadas por Andres

Route::get('/login', function () {
    return view('auth.login');
});
/*
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
   
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});


Auth::routes();
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pedidos/{pedidos}', [App\Http\Controllers\PedidosController::class, 'show'])->name('pedidos.show');
Route::get('/factura/{pedidos}', [App\Http\Controllers\FacturaController::class, 'show'])->name('factura.show');
