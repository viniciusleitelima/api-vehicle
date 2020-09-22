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

POST:

http://127.0.0.1:8000/vehicle/?car_license_plate=XYZ-4333&model=Ka Hatch&year=2010&brand=Ford&chassi=9BWSU19F08B302189

PATCH

http://127.0.0.1:8000/vehicle/3/?car_license_plate=XYZ-4333&model=Ka Hatch&year=2010&brand=Ford&chassi=9BWSU19F08B302189

GET all:

http://127.0.0.1:8000/vehicle

GET by Id:

http://127.0.0.1:8000/vehicle/3

DELETE

http://127.0.0.1:8000/vehicle/3

Qualquer dúvida só entrar em contato pelo email:
viniciusleite.desenvolvedor@gmail.com
