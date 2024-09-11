<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   <link rel="shortcut icon" href="verifica.ico" type="image/x-icon">
</head>

<body>
     <nav class="bg-indigo-600 p-1 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex space-x-7">
            <div class="w-20">
            <a href="/" class="text-white text-2xl font-bold"><img src="{{asset('img/vix.png')}}" alt="algo"></a>
            </div>
            <!-- Links -->
            
                <div class="m-5 space-x-2 px-2 text-lg">
                    @auth
                    <a href="/dashboard" class="text-white font-semibold hover:text-blue-200 transition duration-300">Home</a>
                    @endauth
                    <a href="/criarProjeto" class="text-white font-semibold hover:text-blue-200 transition duration-300">Cria Projeto</a>
                
                    <a href="#" class="text-white font-semibold hover:text-blue-200 transition duration-300">sobre</a>
                
                    <a href="#" class="text-white font-semibold hover:text-blue-200 transition duration-300">Contact</a>
                    @auth
                    <a href="/projetosGet" class="text-white font-semibold hover:text-blue-200 transition duration-300">Meus Projetos</a>
                    @endauth
                </div>
               
           </div >

            <!-- Botão de login -->
            <div class="mb-1">
                @guest
                    <a href="/login" class="bg-white text-blue-600 py-2 px-6 rounded hover:bg-blue-500 hover:text-white transition duration-300">Login</a>
                <a href="/register" class="bg-white text-blue-600 py-2 px-4 rounded hover:bg-blue-500 hover:text-white transition duration-300">Register</a>
                @endguest
                
                @auth
                
                
                <a href="/users" class="bg-white text-blue-600 py-2 px-4 rounded hover:bg-blue-500 hover:text-white transition duration-300">Meu perfil</a>
                <a href="#" class="bg-white text-blue-600 py-2 px-4 rounded hover:bg-red-600 hover:text-white transition duration-300">Logout</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="h-screen">@yield('content')</div>


    <footer class="bg-indigo-600 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Coluna 1 -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Sobre Nós</h3>
                <p class="text-gray-400 text-sm">
                    Somos uma empresa dedicada a fornecer as melhores soluções tecnológicas para nossos clientes.
                </p>
            </div>
            <!-- Coluna 2 -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Links Rápidos</h3>
                <ul class="text-gray-400 text-sm">
                    <li><a href="#" class="hover:text-white">Início</a></li>
                    <li><a href="#" class="hover:text-white">Serviços</a></li>
                    <li><a href="#" class="hover:text-white">Sobre</a></li>
                    <li><a href="#" class="hover:text-white">Contato</a></li>
                </ul>
            </div>
            <!-- Coluna 3 -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Contato</h3>
                <p class="text-gray-400 text-sm">
                    Email: contato@empresa.com<br>
                    Telefone: (11) 1234-5678<br>
                    Endereço: Rua Exemplo, 123, São Paulo - SP
                </p>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-4">
            <p class="text-center text-gray-500 text-xs">
                &copy; {{ date('Y') }} Empresa. Todos os direitos reservados.
            </p>
        </div>
    </div>
</footer>
</body>
</html>