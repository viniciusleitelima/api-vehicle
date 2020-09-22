# api-vehicle
Api para cadastro de veiculos

Vou assumir que já tenha instalado o laravel, o composer, o php e o mysql;

1°) Clone o repositório com: git clone https://github.com/viniciusleitelima/api-vehicle
2°) Crie o banco de dados db_api no mysql
3°) Configure o arquivo .env, inserindo o host, o usuário e a senha desse banco criado
4°) Execute o comando php artisan migrate para rodar os migrations pendentes
5°) Execute o comando php artisan serve para iniciar o servidor, ele está configurado para http://localhost:8000
6°) Use o postman, insomnia ou outro programa similar para usar a api

Mapeamento das rotas:
+--------+-----------+------------------------+-----------------+------------------------------------------------+------------+
| Domain | Method    | URI                    | Name            | Action                                         | Middleware |
+--------+-----------+------------------------+-----------------+------------------------------------------------+------------+
|        | GET|HEAD  | /                      |                 | Closure                                        | web        |
|        | GET|HEAD  | api/user               |                 | Closure                                        | api        |
|        |           |                        |                 |                                                | auth:api   |
|        | GET|HEAD  | vehicle                | vehicle.index   | App\Http\Controllers\VehicleController@index   | web        |
|        | POST      | vehicle                | vehicle.store   | App\Http\Controllers\VehicleController@store   | web        |
|        | GET|HEAD  | vehicle/create         | vehicle.create  | App\Http\Controllers\VehicleController@create  | web        |
|        | GET|HEAD  | vehicle/{id}           | vehicle.show    | App\Http\Controllers\VehicleController@show    | web        |
|        | PUT|PATCH | vehicle/{id}           | vehicle.update  | App\Http\Controllers\VehicleController@update  | web        |
|        | DELETE    | vehicle/{id}           | vehicle.destroy | App\Http\Controllers\VehicleController@destroy | web        |
|        | GET|HEAD  | vehicle/{id}/edit      | vehicle.edit    | App\Http\Controllers\VehicleController@edit    | web        |
+--------+-----------+------------------------+-----------------+------------------------------------------------+------------+

Exemplo de POST:
http://127.0.0.1:8000/vehicle/?car_license_plate=XYZ-4333&model=Ka Hatch&year=2010&brand=Ford&chassi=9BWSU19F08B302189

Exemplo de PATCH
http://127.0.0.1:8000/vehicle/3/?car_license_plate=XYZ-4333&model=Ka Hatch&year=2010&brand=Ford&chassi=9BWSU19F08B302189

Exemplo de GET all:
http://127.0.0.1:8000/vehicle

Exemplo de GET by Id:
http://127.0.0.1:8000/vehicle/3

Exemplo de DELETE
http://127.0.0.1:8000/vehicle/3

Qualquer dúvida só entrar em contato pelo email:
viniciusleite.desenvolvedor@gmail.com




